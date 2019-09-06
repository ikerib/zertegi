<?php

namespace App\Form;

use App\Entity\Protokoloak;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProtokoloakType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('artxiboa')
            ->add('saila')
            ->add('signatura')
            ->add('eskribaua')
            ->add('data')
            ->add('laburpena')
            ->add('datuak')
            ->add('oharrak',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('bilatzaileak')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Protokoloak::class,
        ]);
    }
}
