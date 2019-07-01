<?php

namespace App\Form;

use App\Entity\Kontratazioa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KontratazioaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('espedientea')
            ->add('urtea')
            ->add('sailkapena')
            ->add('signatura')
            ->add('numdoc')
            ->add('knosysid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kontratazioa::class,
        ]);
    }
}
