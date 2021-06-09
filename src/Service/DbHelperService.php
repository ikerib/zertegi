<?php


namespace App\Service;


use App\Entity\Amp;
use App\Entity\Anarbe;
use App\Entity\Argazki;
use App\Entity\Ciriza;
use App\Entity\Consultas;
use App\Entity\Entradas;
use App\Entity\Euskera;
use App\Entity\Gazteria;
use App\Entity\Hutsak;
use App\Entity\Kirola;
use App\Entity\Kontratazioa;
use App\Entity\Kultura;
use App\Entity\Liburuxka;
use App\Entity\Log;
use App\Entity\Obratxikiak;
use App\Entity\Pendientes;
use App\Entity\Protokoloak;
use App\Entity\Salidas;
use App\Entity\Tablas;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Ldap\Adapter\ConnectionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class DbHelperService {

    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var RouterInterface
     */
    private $router;
    /**
     * @var ConnectionInterface
     */
    private $connection;
    /**
     * @var \Symfony\Component\Routing\Generator\UrlGeneratorInterface
     */
    private $urlGenerator;

    public function __construct(EntityManagerInterface $em, FormFactoryInterface $formFactory, RouterInterface $router, Connection $connection, UrlGeneratorInterface $urlGenerator)
    {
        $this->em          = $em;
        $this->formFactory = $formFactory;
        $this->router      = $router;
        $this->connection  = $connection;
        $this->urlGenerator = $urlGenerator;
    }

    public function getAllTables()
    {
        $sql = "SELECT table_name, table_rows from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'zertegi' and table_name != 'migration_versions';";

        return $this->connection->fetchAll($sql);
    }

    public function getAllEntityFields($table): array
    {
        $class  = $this->em->getClassMetadata($table);
        $fields = [];
        if (!empty($class->discriminatorColumn))
        {
            $fields[] = $class->discriminatorColumn[ 'name' ];
        }
        $fields = array_merge($class->getColumnNames(), $fields);
        foreach ($fields as $index => $field)
        {
            if ($class->isInheritedField($field))
            {
                unset($fields[ $index ]);
            }
        }
        foreach ($class->getAssociationMappings() as $name => $relation)
        {
            if (!$class->isInheritedAssociation($name))
            {
                foreach ($relation[ 'joinColumns' ] as $joinColumn)
                {
                    $fields[] = $joinColumn[ 'name' ];
                }
            }
        }
        $fields = array_diff($fields, ['id', 'numdoc', 'knosysid']);


        return $fields;
    }

    public function mySearchForm($table, $fields, $finderdata): FormView
    {
        $form = $this->formFactory->createBuilder()
                                    ->setAction($this->router->generate((string)$table.'_index'))
                                    ->setMethod('GET');

        $form->add('Kontsulta', null, [
            'label' => '---- KONTSULTA ----',
            'help' => 'Ezarritako testua datu baseko eremu guztietan bilatuko du',
            'required' => false,
            'attr' => [
                'class' => 'inputKontsulta'
            ]
        ]);

        foreach ($fields as $field)
        {
                $form->add(
                    $field,
                null,
                [
                    'required' => false,
                    'attr' => [
                        'autocomplete' => 'off'
                    ]
                ]
            );
        }

        $form->setData($finderdata);
        return $form->getForm()->createView();
    }

    public function performSearch($entityName, $query, $fields, $uri)
    {
        /* if no $query params do basic select */
        $SQL = 'SELECT * FROM '.$entityName;

        if ( [] !== $query) { // has params
            if ( array_key_exists('Kontsulta', $query) )// if konsulta, find all in every field, ignore other fields
            {
                // FULLTEXT search
                $filter = $query[ 'Kontsulta' ];
                if ($filter) {
                    $searchQuery=null;
                    switch ($entityName)
                    {
                        case 'amp':
                            $searchQuery = $this->em->getRepository(Amp::class)->fullTextSearch($filter);
                            break;
                        case 'anarbe':
                            $searchQuery = $this->em->getRepository(Anarbe::class)->fullTextSearch($filter);
                            break;
                        case 'argazki':
                            $searchQuery = $this->em->getRepository(Argazki::class)->fullTextSearch($filter);
                            break;
                        case 'ciriza':
                            $searchQuery = $this->em->getRepository(Ciriza::class)->fullTextSearch($filter);
                            break;
                        case 'consultas':
                            $searchQuery = $this->em->getRepository(Consultas::class)->fullTextSearch($filter);
                            break;
                        case 'entradas':
                            $searchQuery = $this->em->getRepository(Entradas::class)->fullTextSearch($filter);
                            break;
                        case 'euskera':
                            $searchQuery = $this->em->getRepository(Euskera::class)->fullTextSearch($filter);
                            break;
                        case 'gazteria':
                            $searchQuery = $this->em->getRepository(Gazteria::class)->fullTextSearch($filter);
                            break;
                        case 'hutsak':
                            $searchQuery = $this->em->getRepository(Hutsak::class)->fullTextSearch($filter);
                            break;
                        case 'kirola':
                            $searchQuery = $this->em->getRepository(Kirola::class)->fullTextSearch($filter);
                            break;
                        case 'kontratazioa':
                            $searchQuery = $this->em->getRepository(Kontratazioa::class)->fullTextSearch($filter);
                            break;
                        case 'kultura':
                            $searchQuery = $this->em->getRepository(Kultura::class)->fullTextSearch($filter);
                            break;
                        case 'liburuxka':
                            $searchQuery = $this->em->getRepository(Liburuxka::class)->fullTextSearch($filter);
                            break;
                        case 'obratxikiak':
                            $searchQuery = $this->em->getRepository(Obratxikiak::class)->fullTextSearch($filter);
                            break;
                        case 'pendientes':
                            $searchQuery = $this->em->getRepository(Pendientes::class)->fullTextSearch($filter);
                            break;
                        case 'protokoloak':
                            $searchQuery = $this->em->getRepository(Protokoloak::class)->fullTextSearch($filter);
                            break;
                        case 'salidas':
                            $searchQuery = $this->em->getRepository(Salidas::class)->fullTextSearch($filter);
                            break;
                        case 'tablas':
                            $searchQuery = $this->em->getRepository(Tablas::class)->fullTextSearch($filter);
                            break;

                    }

                    if ( $query) {
                        $log = new Log();
                        $log->setTabla($entityName);
                        $log->setDescription(json_encode($query));
                        $log->setUrl($uri);
                        $this->em->persist($log);
                        $this->em->flush();
                    }
                    return $searchQuery;
                }



            } else {
                $searchQuery = null;
//                foreach ($query as $key=>$value) {
//                    foreach ($value as $i => $iValue) {
                        switch ($entityName) {
                            case 'amp':
                                $searchQuery = $this->em->getRepository(Amp::class)->fieldFullTextSearch($query);
                                break;
                            case 'anarbe':
                                $searchQuery = $this->em->getRepository(Anarbe::class)->fieldFullTextSearch($query);
                                break;
                            case 'argazki':
                                $searchQuery = $this->em->getRepository(Argazki::class)->fieldFullTextSearch($query);
                                break;
                            case 'ciriza':
                                $searchQuery = $this->em->getRepository(Ciriza::class)->fieldFullTextSearch($query);
                                break;
                            case 'consultas':
                                $searchQuery = $this->em->getRepository(Consultas::class)->fieldFullTextSearch($query);
                                break;
                            case 'entradas':
                                $searchQuery = $this->em->getRepository(Entradas::class)->fieldFullTextSearch($query);
                                break;
                            case 'euskera':
                                $searchQuery = $this->em->getRepository(Euskera::class)->fieldFullTextSearch($query);
                                break;
                            case 'gazteria':
                                $searchQuery = $this->em->getRepository(Gazteria::class)->fieldFullTextSearch($query);
                                break;
                            case 'hutsak':
                                $searchQuery = $this->em->getRepository(Hutsak::class)->fieldFullTextSearch($query);
                                break;
                            case 'kirola':
                                $searchQuery = $this->em->getRepository(Kirola::class)->fieldFullTextSearch($query);
                                break;
                            case 'kontratazioa':
                                $searchQuery = $this->em->getRepository(Kontratazioa::class)->fieldFullTextSearch($query);
                                break;
                            case 'kultura':
                                $searchQuery = $this->em->getRepository(Kultura::class)->fieldFullTextSearch($query);
                                break;
                            case 'liburuxka':
                                $searchQuery = $this->em->getRepository(Liburuxka::class)->fieldFullTextSearch($query);
                                break;
                            case 'obratxikiak':
                                $searchQuery = $this->em->getRepository(Obratxikiak::class)->fieldFullTextSearch($query);
                                break;
                            case 'pendientes':
                                $searchQuery = $this->em->getRepository(Pendientes::class)->fieldFullTextSearch($query);
                                break;
                            case 'protokoloak':
                                $searchQuery = $this->em->getRepository(Protokoloak::class)->fieldFullTextSearch($query);
                                break;
                            case 'salidas':
                                $searchQuery = $this->em->getRepository(Salidas::class)->fieldFullTextSearch($query);
                                break;
                            case 'tablas':
                                $searchQuery = $this->em->getRepository(Tablas::class)->fieldFullTextSearch($query);
                                break;
                        }
//                    }
//                }
                if ( $query) {
                    $log = new Log();
                    $log->setCreated(new \DateTime());
                    $log->setTabla($entityName);
                    $log->setDescription(json_encode($query));
                    $log->setUrl($uri);
                    $this->em->persist($log);
                    $this->em->flush();
                }

                return $searchQuery;
            }
        }

        if ( $query) {
            $log = new Log();
            $log->setTabla($entityName);
            $log->setDescription(json_encode($query));
            $log->setUrl($uri);
            $this->em->persist($log);
            $this->em->flush();
        }

        $conn = $this->em->getConnection();

        $stmt = $conn->prepare($SQL);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function performFullTextSearch ($entityName, $query, $fields, $uri)
    {
        if ( array_key_exists('Kontsulta', $query) )// if konsulta, find all in every field, ignore other fields
        {

        } else {
            $andLehena = true;
            foreach ($query as $key=>$value) {
                $orText = '';
                foreach ($value as $i => $iValue) {
                    $iValue = str_replace(array('"', '*'), array('', '%'), $iValue);
                    $orText = 'replace('.$key.", ',','') like '$iValue'";

                    if ($andLehena) {
                        $andLehena=false;
                        $SQL .= '('.$orText.')';
                    } else {
                        $SQL .= ' AND ('.$orText.')';
                    }
                }
            }
        }
    }

    public function getFinderParams($filters): array
    {
        $myFilters = [];
        if ($filters)
        {
            foreach ($filters as $key => $value)
            {
                if (($key !== '_token') && ($value !== ''))
                {
                    $aFilter           = array_map('trim', explode('&', $value));
                    $myFilters[ $key ] = $aFilter;
                }
            }
        }

        return $myFilters;
    }
}
