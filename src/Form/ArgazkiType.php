<?php

namespace App\Form;

use App\Entity\Argazki;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArgazkiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deskribapena')
            ->add('barrutia')
            ->add('fecha')
            ->add('gaia')
            ->add('neurria')
            ->add('kolorea')
            ->add('zenbakia')
            ->add('oharrak')
            ->add('numdoc')
            ->add('knosysid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Argazki::class,
        ]);
    }
}
