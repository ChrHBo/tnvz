<?php

namespace App\Form;

use App\Entity\Teilnehmer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TeilnehmerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('vorname')
            ->add('fon')
            ->add('email')
            ->add('geburtsdatum')
            ->add('ansprechpartner')
            ->add('berufswunsch')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teilnehmer::class,
        ]);
    }
}
