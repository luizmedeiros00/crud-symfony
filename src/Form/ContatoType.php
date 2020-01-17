<?php

namespace App\Form;

use App\Entity\Contato;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('tipo',null, [
            //     'attr' => [
            //         'class' => 'form-group col-md-6'
            //     ]
            // ])
            // ->add('contato',null, [
            //     'attr' => [
            //         'class' => 'form-group col-md-6'
            //     ]
            // ])
            ->add('tipo')
            ->add('contato')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contato::class,
        ]);
    }

}
