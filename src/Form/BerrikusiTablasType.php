<?php

namespace App\Form;

use App\Entity\Tablas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiTablasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('serie')
            ->add('unidad')
            ->add('resolucion')
            ->add('observaciones')
            ->add('berrikusiObservaciones')
            ->add('berrikusiResolucion')
            ->add('berrikusiSerie')
            ->add('berrikusiUnidad')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tablas::class,
        ]);
    }
}
