<?php

namespace App\Form;

use App\Entity\Pessoa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\Type\TipoPessoaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PessoaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', TipoPessoaType::class)
            ->add('identificador', TextType::class,[
                'attr' => [
                    'autocomplete' => 'off',
                ]
            ])
            ->add('nome', TextType::class,[
                'attr' => [
                    'autocomplete' => 'off',
                ]
            ])
            ->add('contatos', CollectionType::class, [
                'entry_type' => ContatoType::class,
                'entry_options' => ['label' => false],
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'attr' => array(
                    'class' => 'my-selector',
                ),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pessoa::class,
        ]);
    }

}
