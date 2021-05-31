<?php

namespace App\Form;

use App\Entity\Ciriza;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiCirizaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('signatura')
            ->add('data', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('deskribapena', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('sailkapena')
            ->add('oharrak', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )

            ->add('berrikusiSignatura')
            ->add('berrikusiData', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('berrikusiDeskribapena', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('berrikusiSailkapena')
            ->add('berrikusiOharrak', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ciriza::class,
        ]);
    }
}
