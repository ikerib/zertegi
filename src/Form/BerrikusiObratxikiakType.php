<?php

namespace App\Form;

use App\Entity\Obratxikiak;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiObratxikiakType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('espedientea')
            ->add('sailkapena')
            ->add('signatura')
            ->add('urtea')
            ->add('berrikusiEspedientea')
            ->add('berrikusiUrtea')
            ->add('berrikusiSignatura')
            ->add('berrikusiSailkapena')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Obratxikiak::class,
        ]);
    }
}
