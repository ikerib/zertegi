<?php


namespace App\Service;


use Doctrine\DBAL\Driver\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Ldap\Adapter\ConnectionInterface;
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

    public function __construct(EntityManagerInterface $em, FormFactoryInterface $formFactory, RouterInterface $router, Connection $connection)
    {
        $this->em          = $em;
        $this->formFactory = $formFactory;
        $this->router      = $router;
        $this->connection  = $connection;
    }

    public function getAllTables()
    {
        $sql = "SELECT table_name, table_rows from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'zertegi' and table_name != 'migration_versions';";

        /** @var []  $tables */
        $tables = $this->connection->fetchAll($sql);

        return $tables;
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

    public function mySearch($table, $fields)
    {
        $form = $this->formFactory->createBuilder()
                                  ->setAction($this->router->generate((string)$table.'_index'));
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

        return $form->getForm()->createView();
    }

    public function getFinderParams($filters)
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
