<?php

namespace App\Form;

use App\Entity\Consultas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiConsultasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('izena')
            ->add('helbidea')
            ->add('gaia')
            ->add('enpresa')
            ->add('kontsulta')
            ->add('berrikusiIzena')
            ->add('berrikusiGaia')
            ->add('berrikusiKontsulta')
            ->add('berrikusiEnpresa')
            ->add('berrikusiHelbidea')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consultas::class,
        ]);
    }
}
