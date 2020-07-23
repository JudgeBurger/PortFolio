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
            ->add('nom')
            ->add('language', ChoiceType::class, [
                'choices' => [
                    'Langages' => self::LANGUAGES
                ],
                'attr' => ['class' => 'd-flex flex-column my-3 col-12 p-0']
            ])
            ->add('conditions', TextType::class)
            ->add('Description', TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
