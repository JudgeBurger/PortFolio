<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => ['class' => 'form-control',],
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Nom'
            ])
            ->add('phoneNumber', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Numéro de Téléphone'
            ])
            ->add('email', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Votre Email'
            ])
            ->add('company', TextType::class, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Votre Entreprise'
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 6
                ],
                'label' => 'Votre Message'

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
