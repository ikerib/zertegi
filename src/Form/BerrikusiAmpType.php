<?php

namespace App\Form;

use App\Entity\Amp;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BerrikusiAmpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clasificacion',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('berrikusiClasificacion',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('expediente',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('berrikusiExpediente',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('observaciones',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
            ->add('berrikusiObservaciones',CKEditorType::class, array(
                    'config' => array(
                        'uiColor' => '#ffffff',
                    ),
                )
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Amp::class,
        ]);
    }
}
