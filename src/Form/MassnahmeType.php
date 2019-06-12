<?php

namespace App\Form;

use App\Entity\Massnahme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MassnahmeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginn')
            ->add('ende')
            ->add('massnahmeart')
            ->add('teilnehmer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Massnahme::class,
        ]);
    }
}
