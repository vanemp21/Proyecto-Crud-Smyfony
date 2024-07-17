<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', TextType::class,['label'=>'Tu nombre', 'attr' => ['class' => 'form-control']])
            ->add('apellido_paterno',TextType::class,['label'=>'Primer apellido', 'attr' => ['class' => 'form-control']])
            ->add('apellido_materno',TextType::class,['label'=>'Segundo apellido', 'attr' => ['class' => 'form-control']])
            ->add('edad', IntegerType::class,['label'=>'Edad','attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
            'csrf_protection'=> true,
            'csrf_field_name'=> '_token',
            'csrf_token_id' => 'usuario_create',
        ]);
    }
}
