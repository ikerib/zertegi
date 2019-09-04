<?php


namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\RouterInterface;

class DbHelperService
{

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

    public function __construct(EntityManagerInterface $em, FormFactoryInterface $formFactory, RouterInterface $router)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->router = $router;
    }

    public function getAllEntityFields($table): array
    {
        $class = $this->em->getClassMetadata($table);
        $fields = [];
        if (!empty($class->discriminatorColumn)) {
            $fields[] = $class->discriminatorColumn['name'];
        }
        $fields = array_merge($class->getColumnNames(), $fields);
        foreach ($fields as $index => $field) {
            if ($class->isInheritedField($field)) {
                unset($fields[$index]);
            }
        }
        foreach ($class->getAssociationMappings() as $name => $relation) {
            if (!$class->isInheritedAssociation($name)){
                foreach ($relation['joinColumns'] as $joinColumn) {
                    $fields[] = $joinColumn['name'];
                }
            }
        }
        $fields = array_diff($fields, ['id', 'numdoc', 'knosysid']);


        return $fields;
    }

    public function mySearch($table, $fields) {
        $form = $this->formFactory->createBuilder()
                                  ->setAction($this->router->generate((string)$table.'_index'));
        foreach ($fields as $field) {
            $form->add($field, null, [
                'required' => false
            ]);
        }

        return $form->getForm()->createView();
    }
}
