<?php

namespace App\Form;

use App\Entity\Funktion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Mitarbeiter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class MitarbeiterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('vorname', TextType::class)
            ->add('raum', TextType::class, [
                'required'   => true,
            ])
            ->add('fon', TextType::class, [
                'required'   => false,
            ])
            ->add('email', EmailType::class, [
                'required'   => false,
            ])
            ->add('funktion', EntityType::class, [
                'class' => Funktion::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Mitarbeiter::class,
        ]);
    }
}
