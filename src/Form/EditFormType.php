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
            'dateAdded' => new \DateTime('tomorrow')
        ];

        $builder
            ->add('title', TextType::class, ['attr' => [
                    'placeholder' => 'Wpisz tytuł tutaj...',
                ]])
            ->add('content', TextareaType::class, ['attr' => [
                    'placeholder' => 'Wpisz treść tutaj...',
                ]])
            ->add('category', TextType::class, ['attr' => [
                'placeholder' => 'Wpisz kategorie tutaj...',
            ]])
            ->add('dateAdded', DateType::class, array(
                'input' => 'datetime_immutable',
            ))
            ->add('save',SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            
        ]);
    }
}
