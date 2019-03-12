<?php /** @noinspection NullPointerExceptionInspection */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Ldap\Adapter\ExtLdap\Adapter;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * LDAP TALDEEN IZENAK MINUSKULAZ IPINI!!
     */

    /** @var array maps ldap groups to roles */
    private $groupMapping = [   // Definitely requires modification for your setup
        'app-web_egutegia'             => 'ROLE_USER',
        'rol-antolakuntza_informatika' => 'ROLE_ADMIN',
    ];

    private $ldapTaldeak = [];
    private $ldapInfo = [];

    /** @var string extracts group name from dn string */
    private $groupNameRegExp = '/^CN=(?P<group>[^,]+)/i'; // You might want to change it to match your ldap server

    /** @var string extracts group name from dn string */
    private $groupTaldeaRegExp = '(^(ROL|Saila|Taldea))'; // ROL - Taldea - Saila -rekin hasten den begiratzen du

    /** @var string extracts group name from dn string */
    private $groupSarbideExp = '/Sarbide/i'; // ROL - Taldea - Saila -rekin hasten den begiratzen du


    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils): \Symfony\Component\HttpFoundation\Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render( 'security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ) );
    }

    /**
     * @Route("/userdata", name="userdata")
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function userdata( Request $request ): \Symfony\Component\HttpFoundation\RedirectResponse
    {

        $user     = $this->getUser();
        $username = $user->getUsername();

        $result = $this->getLdapInfo( $username );

        $count = count( $result );

        if ( !$count ) {
            throw new UsernameNotFoundException( sprintf( 'User "%s" not found.', $username ) );
        }

        if ( $count > 1 ) {
            throw new UsernameNotFoundException( 'More than one user found' );
        }

        $entry   = $result[ 0 ];
        $roles   = [];
        $taldeak = $entry->getAttribute( 'memberOf' );

        foreach ( $taldeak as $t ) {
            $this->ldapTaldeak[] = $t;
        }

        /**
         * ESKURATU LDAP Taldeak
         */
        foreach ( $entry->getAttribute( 'memberOf' ) as $groupLine ) { // Iterate through each group entry line
            $groupName = strtolower( $this->getGroupName( $groupLine ) ); // Extract and normalize the group name fron the line
            if ( array_key_exists( $groupName, $this->groupMapping ) ) { // Check if the group is in the mapping
                $roles[] = $this->groupMapping[ $groupName ]; // Map the group to the role the user will have
            } else {
                $roles[] = 'ROLE_USER';
            }
            $this->ldap_recursive( $this->getGroupName( $groupLine ) );
        }

        /**
         * Sesio bariable batean gorde agian erabilgarri izan daitekeen informazioa
         */
        foreach ( $this->ldapTaldeak as $talde ) {
            $this->ldapInfo[] = $this->getGroupName($talde);
        }
        sort( $this->ldapInfo );

        $matches  = preg_grep ($this->groupSarbideExp, $this->ldapInfo);
        $this->get( 'session' )->set( 'ldapInfo', $this->ldapInfo );
        $this->get( 'session' )->set('displayName', $entry->getAttribute('displayName'));
        $this->get( 'session' )->set('description', $entry->getAttribute('description'));
        $this->get( 'session' )->set( 'deparment', $entry->getAttribute( 'department' ) );
        $this->get( 'session' )->set( 'sarbideak', $matches );

        /**
         * User objectu berria sortu, rol berriekin
         */
        $token = new UsernamePasswordToken(
            $this->getUser(),
            null,
            'main',
            $roles
        );
        $this->get( 'security.token_storage' )->setToken( $token );

        /** @var Session $session */
        $session = $request->getSession();


        $redirectUrl = $session->get('_security.main.target_path');


        return $this->redirect($redirectUrl);

    }

    /**
     * Get the group name from the DN
     *
     * @param string $dn
     *
     * @return string
     */
    private function getGroupName( $dn ): string
    {
        $matches = [];

        return preg_match( $this->groupNameRegExp, $dn, $matches ) ? $matches[ 'group' ] : '';
    }

    /**
     * @Route("/logout", name="logout")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logout(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        $this->get( 'security.token_storage' )->setToken();
        $this->get( 'request_stack' )->getCurrentRequest()->getSession()->invalidate();

        return $this->redirectToRoute( 'login' );
    }


    public function getLdapInfo( $username )
    {
        /** Irakurri .env datuak  **/
        $ip       = getenv( 'LDAP_IP' );
        $searchdn = getenv( 'LDAP_SEARCH_DN' );
        $basedn   = getenv( 'LDAP_BASE_DN' );
        $passwd   = getenv( 'LDAP_PASSWD' );


        /**
         * LDAP KONTSULTA EGIN erabiltzailearen bila
         */
        $ldap = new Adapter( array( 'host' => $ip ) );
        $ldap->getConnection()->bind( $searchdn, $passwd );
        $query = $ldap->createQuery( $basedn, "(sAMAccountName=$username)", array() );

        return $query->execute();
    }

    public function ldap_recursive( $name ): void
    {
        if ( preg_match( $this->groupTaldeaRegExp, $name ) ) {
            $tal = $this->getLdapInfo( $name );

            if ( count( $tal ) ) {
                $taldek = $tal[ 0 ]->getAttribute( 'memberOf' );
                if ($taldek !== null) {
                    foreach ( $taldek as $t ) {
                        if ( !in_array($t, $this->ldapTaldeak, true)) {
                            $this->ldapTaldeak[] = $t;
                            $this->ldap_recursive( $this->getGroupName( $t ) );
                        }
                    }
                }
            }
        }
    }


    /**
     * @Route("/", name="home", methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('security/index.html.twig');
    }

}
