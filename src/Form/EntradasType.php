<?php

namespace App\Form;

use App\Entity\Entradas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntradasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('data')
            ->add('igorlea')
            ->add('deskribapena')
            ->add('signatura')
            ->add('numdoc')
            ->add('knosysid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entradas::class,
        ]);
    }
}
