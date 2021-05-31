<?php

namespace App\Form;

use App\Entity\Argazki;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiArgazkiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deskribapena', CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('barrutia')
            ->add('fecha')
            ->add('gaia')
            ->add('neurria')
            ->add('kolorea')
            ->add('zenbakia')
            ->add('oharrak', CKEditorType::class, array(
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
            ->add('berrikusiBarrutia')
            ->add('berrikusiFecha')
            ->add('berrikusiGaia')
            ->add('berrikusiNeurria')
            ->add('berrikusiKolorea')
            ->add('berrikusiZenbakia')
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
            'data_class' => Argazki::class,
        ]);
    }
}
