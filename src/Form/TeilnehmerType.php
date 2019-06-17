<?php

namespace App\Form;

use App\Entity\Teilnehmer;
use App\Entity\Mitarbeiter;
use App\Entity\Funktion;
use App\Entity\Berufswunsch;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TeilnehmerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('vorname', TextType::class)
            ->add('fon', TextType::class, ['label' => 'Telefonnummer'])
            ->add('email', EmailType::class)
            ->add('geburtsdatum', DateType::class, [
                'widget' => 'single_text',
                // prevents rendering it as type="date", to avoid HTML5 date pickers
                'html5' => false,
                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('ansprechpartner', EntityType::class, [
                'block_name' => 'custom_name', // custom name for the form block
                'class' => Mitarbeiter::class,
                'choice_label' => function(Mitarbeiter $mitarbeiter) {
                            return sprintf('%s (%s)', $mitarbeiter->getName(), $mitarbeiter->getFunktion()->getName());
                },
                'multiple'     => true,
                'expanded'     => true,
            ])
            ->add('berufswunsch', EntityType::class, [
                'class' => Berufswunsch::class,
                'choice_label' => 'name',
            ])
            // ->add('massnahmen')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Teilnehmer::class,
        ]);
    }
}
