<?php

namespace App\Form;

use App\Entity\Kultura;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiKulturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('espedientea',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('data')
            ->add('sailkapena')
            ->add('signatura')
            ->add('oharrak',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('berrikusiData')
            ->add('berrikusiEspedientea',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('berrikusiOharrak',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
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
