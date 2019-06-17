<?php

namespace App\Form;

use App\Entity\Firma;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class FirmaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class , ['label' => 'Firmenname'])
            ->add('ansprechpartner', TextType::class, [
                'help' => 'Freitextfeld für einen direkten Ansprechpartner'
            ])
            ->add('strasse', TextType::class, ['label' => 'Straße'])
            ->add('hausnummer', TextType::class)
            ->add('plz',IntegerType::class , ['label' => 'PLZ'])
            ->add('ort', TextType::class)
            ->add('fon', TextType::class)
            ->add('email', EmailType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Firma::class,
        ]);
    }
}
