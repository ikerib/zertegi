<?php

namespace App\Form;

use App\Entity\Ciriza;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CirizaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('signatura')
            ->add('data')
            ->add('deskribapena')
            ->add('sailkapena')
            ->add('oharrak')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ciriza::class,
        ]);
    }
}
