<?php

namespace App\Form;

use App\Entity\Praktika;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PraktikaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('inhalt')
            ->add('beginn')
            ->add('ende')
            ->add('firma')
            ->add('teilnehmer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Praktika::class,
        ]);
    }
}
