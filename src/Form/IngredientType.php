<?php

namespace App\Form;

use App\Entity\Ingredients;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

use Webmozart\Assert\Assert as AssertAssert;
use Zenstruck\Assert as ZenstruckAssert;

class IngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [ 
                    new Assert\Length(['min' => 2 , 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('prix', MoneyType::class , [
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'label' => 'Prix',
                    'label_attr' => [
                        'class' => 'form-label mt-4'
                    ],
                    'constraints' => [ 
                        new Assert\Positive(),
                        new Assert\LessThan('200'),
                    ]
            ])
            ->add('sumbit', SubmitType::class, [
                'attr' => [
<<<<<<< HEAD
                    'class' => 'btn btn-primary'
=======
                    'class' => 'btn btn-primary mt-4'
>>>>>>> 61768707370f02b9bcd3f3d1886598b157c5cea5
                ],
                'label' => ' Creer mon ingredient',
            ])
            ;
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredients::class,
        ]);
    }
}
