<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $defaults = [
            'dateAdded' => new \DateTime('tomorrow'),
            'category' => 'oferujacy',
            'title' => 'Wpisz swoj tytul'
        ];

        $builder
            ->add('title', TextType::class, ['data' => $defaults['title']])
            ->add('content', TextareaType::class)
            ->add('category', TextType::class)
            ->add('dateAdded', DateType::class, array(
                'input' => 'datetime_immutable',
            ))
            ->add('save',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
