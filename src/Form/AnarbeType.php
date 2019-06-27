<?php

namespace App\Form;

use App\Entity\Anarbe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnarbeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('expediente')
            ->add('fecha')
            ->add('clasificacion')
            ->add('signatura')
            ->add('observaciones')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Anarbe::class,
        ]);
    }
}
