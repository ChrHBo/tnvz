<?php

namespace App\Form;

use App\Entity\Mitarbeiter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MitarbeiterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('vorname')
            ->add('raum')
            ->add('fon')
            ->add('email')
            ->add('funktion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mitarbeiter::class,
        ]);
    }
}
