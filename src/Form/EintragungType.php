<?php

namespace App\Form;

use App\Entity\Eintragsbereich;
use App\Entity\Teilnehmer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Eintragung;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EintragungType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datum', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('text', TextareaType::class)
            ->add('bereich', EntityType::class, [
                'class' => Eintragsbereich::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eintragung::class,
        ]);
    }
}
