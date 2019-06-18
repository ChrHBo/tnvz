<?php

namespace App\Form;

use App\Entity\Massnahmeart;
use App\Entity\Teilnehmer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Massnahme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MassnahmeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $teilnehmer = $options['teilnehmer_obj'];

        $builder
            ->add('beginn', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('ende', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('massnahmeart', EntityType::class, [
                'class' => Massnahmeart::class,
                'choice_label' => 'name',
            ])
           ;
        //  dump($teilnehmer);die;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Massnahme::class,
        ]);
        // $resolver->setRequired('teilnehmer_obj');
    }
}
