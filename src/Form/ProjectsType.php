<?php

namespace App\Form;

use App\Entity\Projects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectsType extends AbstractType
{

    const LANGUAGES = [
        'PHP' => 'PHP',
        'Javascript' => 'Javascript',
        'SASS' => 'SASS',
        'HTML' => 'HTML',
        'CSS' => 'CSS',
        'Symfony' => 'Symfony',
        'Twig' => 'Twig',
        'MVC' => 'MVC',
        'Méthode Agile' => 'Méthode Agile',
    ];

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => ['class' => 'form-control'],
            ])
            ->add('language', ChoiceType::class, [
                'choices' => [
                    'Langages' => self::LANGUAGES
                ],
                'attr' => ['class' => 'form-control'],
                'expanded' => 'true',
            ])
            ->add('conditions', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
                'required' => false,



            ])
            ->add('Description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 6
                ],

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
