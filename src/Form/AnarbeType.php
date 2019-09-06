<?php

namespace App\Form;

use App\Entity\Anarbe;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnarbeType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'expediente',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('fecha')
            ->add('clasificacion')
            ->add('signatura')
            ->add(
                'observaciones',
                CKEditorType::class,
                array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Anarbe::class,
            ]
        );
    }
}
