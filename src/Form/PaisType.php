<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pais', TextType::class,['label'=>'Pais','attr'=>['class'=>'form-control']])
            ->add('continente', ChoiceType::class,['label'=>'Continente','choices'=>['América'=>'america','Europa'=>'europa','África'=>'africa'],'expanded'=>true,'multiple'=>true])
            ->add('descripcion',TextareaType::class,['label'=>'Descripción', 'attr'=>['class'=>'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
