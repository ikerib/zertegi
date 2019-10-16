<?php


namespace App\Service;


use App\Entity\Log;
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

    public function performSearch($entityName, $query, $fields, $uri): array
    {
        /* if no $query params do basic select */
        $SQL = 'SELECT * FROM '.$entityName;

        if ( [] !== $query) { // has params
            $SQL = 'SELECT * FROM '.$entityName.' WHERE ';
            if ( array_key_exists('Kontsulta', $query) )// if konsulta, find all in every field, ignore other fields
            {
                $sqlText = '';
                $queryParamsArray = $query[ 'Kontsulta' ];
                $lehena = true;
                foreach ($queryParamsArray as $param) {
                    $sublehena = true;
                    $subSQL='';
                    foreach ($fields as $field) {
                        $param = str_replace('"','', $param);
                        $sqlText = 'replace('.$field.", ',','') like '%".$param."%'";
                        if ($sublehena) {
                            $sublehena=false;
                            $subSQL .= '('.$sqlText.')';
                        } else {
                            $subSQL .= ' or ('.$sqlText.')';
                        }
                    }

                    if ($lehena) {
                        $lehena = false;
                        $SQL .= '('.$subSQL.')';
                    } else {
                        $SQL .= ' and ('.$subSQL.')';
                    }
                }
            } else {
                $andLehena = true;
                foreach ($query as $key=>$value) {
                    $orText = '';
                    $orFirst=true;
                    foreach ($value as $i => $iValue) {
                        $iValue = str_replace('"','', $iValue);
                        $toFind = [' ',',','?'];

                        $orText = 'replace('.$key.", ',','') like '%".$iValue."%'";

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

        if ( $query) {
            /** @var Log $log */
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
