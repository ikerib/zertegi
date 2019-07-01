<?php

namespace App\Form;

use App\Entity\Liburuxka;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LiburuxkaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deskribapena')
            ->add('data')
            ->add('azalpenak')
            ->add('signatura')
            ->add('numdoc')
            ->add('knosysid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Liburuxka::class,
        ]);
    }
}
