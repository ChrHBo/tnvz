<?php

namespace App\Form;

use App\Entity\Firma;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FirmaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('ansprechpartner')
            ->add('strasse')
            ->add('hausnummer')
            ->add('plz')
            ->add('ort')
            ->add('fon')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Firma::class,
        ]);
    }
}
