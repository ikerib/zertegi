<?php

namespace App\Form;

use App\Entity\Kirola;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class KirolaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('espedientea')
            ->add('data')
            ->add('sailkapena')
            ->add('signatura')
            ->add('oharrak')
            ->add('numdoc')
            ->add('knosysid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kirola::class,
        ]);
    }
}
