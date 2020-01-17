<?php
// src/Form/Type/TipoPessoaType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TipoPessoaType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => [
                'Selecione' => '',
                'Física' => 'fisica',
                'Jurídica' => 'juridica'
            ],
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}