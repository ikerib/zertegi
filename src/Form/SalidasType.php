<?php

namespace App\Form;

use App\Entity\Salidas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalidasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('espedientea')
            ->add('signatura')
            ->add('eskatzailea')
            ->add('irteera')
            ->add('sarrera')
            ->add('knosysid')
            ->add('numdoc')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salidas::class,
        ]);
    }
}
