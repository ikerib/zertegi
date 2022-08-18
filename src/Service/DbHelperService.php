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
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormView;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;
use Doctrine\DBAL\Query\QueryBuilder;

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

    private $connection;
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function __construct(
        EntityManagerInterface $em,
        FormFactoryInterface $formFactory,
        RouterInterface $router,
        Connection $connection,
        UrlGeneratorInterface $urlGenerator)
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

        return $this->connection->fetchAssociative($sql);
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

    public function performSearch($entityName, $query, $fields, $uri, $fetxaBetween = false)
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
//                            $searchQuery = $this->getQb($filter);
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

                    switch ($entityName) {
                        case 'amp':
                            $searchQuery = $this->getQb(Amp::class, $query);
                            break;
                        case 'anarbe':
                            $searchQuery = $this->getQb(Anarbe::class, $query);
                            break;
                        case 'argazki':
                            $searchQuery = $this->getQb(Argazki::class, $query);
                            break;
                        case 'ciriza':
                            $searchQuery = $this->getQb(Ciriza::class, $query);
                            break;
                        case 'consultas':
                            $searchQuery = $this->getQb(Consultas::class, $query);
                            break;
                        case 'entradas':
                            $searchQuery = $this->getQb(Entradas::class, $query);
                            break;
                        case 'euskera':
                            $searchQuery = $this->getQb(Euskera::class, $query);
                            break;
                        case 'gazteria':
                            $searchQuery = $this->getQb(Gazteria::class, $query);
                            break;
                        case 'hutsak':
                            $searchQuery = $this->getQb(Hutsak::class, $query);
                            break;
                        case 'kirola':
                            $searchQuery = $this->getQb(Kirola::class, $query);
                            break;
                        case 'kontratazioa':
                            $searchQuery = $this->getQb(Kontratazioa::class, $query);
                            break;
                        case 'kultura':
                            $searchQuery = $this->getQb(Kultura::class, $query);
                            break;
                        case 'liburuxka':
                            $searchQuery = $this->getQb(Liburuxka::class, $query);
                            break;
                        case 'obratxikiak':
                            $searchQuery = $this->getQb(Obratxikiak::class, $query);
                            break;
                        case 'pendientes':
                            $searchQuery = $this->getQb(Pendientes::class, $query);
                            break;
                        case 'protokoloak':
                            $searchQuery = $this->getQb(Protokoloak::class, $query);
                            break;
                        case 'salidas':
                            $searchQuery = $this->getQb(Salidas::class, $query);
                            break;
                        case 'tablas':
                            $searchQuery = $this->getQb(Tablas::class, $query);
                            break;
                    }

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
//        $stmt->execute();
        $resultSet = $stmt->executeQuery();

        return $resultSet->fetchAllAssociative();
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

    public function getQb($alias,$query): \Doctrine\ORM\Query
    {
        $qb = $this->em->createQueryBuilder()->select('a')->from($alias,'a',null);
        $andStatements = $qb->expr()->andX();
        foreach ($query as $key=>$value) {
            // begiratu espazioak dituen
            foreach ($value as $i => $iValue) {
                $searchTerms = explode('+', $iValue );
                foreach ($searchTerms as $k => $val) {
                    if (strpos($val,"\"") !== false ){
                        $val = str_replace(array('"', "'", ".", ","), '', $val);
                        /**********************************************************************************************/
                        /**********************************************************************************************/
                        /**********************************************************************************************/
                        // % % kendu bilaketa zehatza egin dezan. Clarak eskatuta.
                        // $andStatements->add($qb->expr()->like("REPLACE(a.$key,',','')", $qb->expr()->literal('%' . trim($val) . '%')));
                        $andStatements->add(
                            $qb->expr()->orX(
                                $qb->expr()->like("REPLACE(REPLACE(a.$key,',',''),'.','')", $qb->expr()->literal(trim($val))),
                                $qb->expr()->like("REPLACE(REPLACE(a.$key,',',''),'.','')", $qb->expr()->literal('%' . trim(htmlentities($val). '%')))
                            )
                        );
                        /**********************************************************************************************/
                        /**********************************************************************************************/
                        /**********************************************************************************************/
                    } else {
                        $andStatements->add(
                            $qb->expr()->orX(
                                $qb->expr()->like("a.$key", $qb->expr()->literal('%' . trim($val) . '%')),
                                $qb->expr()->like("a.$key", $qb->expr()->literal('%' . trim(htmlentities($val)) . '%'))
                            )
                        );
                    }
                }
            }
        }
        $qb->andWhere($andStatements);


        return $qb->getQuery();
    }
}
