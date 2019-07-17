<?php

namespace App\Form;

use App\Entity\Protokoloak;
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
            ->add('oharrak')
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
