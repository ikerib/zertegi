<?php

namespace App\Form;

use App\Entity\Kultura;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiKulturaType extends AbstractType
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
            ->add('created')
            ->add('updated')
            ->add('berrikusi')
            ->add('berrikusiData')
            ->add('berrikusiEspedientea')
            ->add('berrikusiOharrak')
            ->add('berrikusiSailkapena')
            ->add('berrikusiSignatura')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Kultura::class,
        ]);
    }
}
