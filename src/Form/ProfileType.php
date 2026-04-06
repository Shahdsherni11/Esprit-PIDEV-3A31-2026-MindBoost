<?php

namespace App\Form;

use App\Entity\Profile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr'  => ['placeholder' => 'Votre prénom', 'class' => 'form-control'],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr'  => ['placeholder' => 'Votre nom', 'class' => 'form-control'],
            ])
            ->add('phone', TelType::class, [
                'label'    => 'Téléphone',
                'required' => false,
                'attr'     => ['placeholder' => '+216 XX XXX XXX', 'class' => 'form-control'],
            ])
            ->add('bio', TextareaType::class, [
                'label'    => 'Bio',
                'required' => false,
                'attr'     => ['rows' => 4, 'placeholder' => 'Parlez de vous...', 'class' => 'form-control'],
            ])
            ->add('personalityType', ChoiceType::class, [
                'label'    => 'Type de personnalité',
                'required' => false,
                'choices'  => [
                    '-- Sélectionner --' => null,
                    'INTJ' => 'INTJ', 'INTP' => 'INTP', 'ENTJ' => 'ENTJ', 'ENTP' => 'ENTP',
                    'INFJ' => 'INFJ', 'INFP' => 'INFP', 'ENFJ' => 'ENFJ', 'ENFP' => 'ENFP',
                    'ISTJ' => 'ISTJ', 'ISFJ' => 'ISFJ', 'ESTJ' => 'ESTJ', 'ESFJ' => 'ESFJ',
                    'ISTP' => 'ISTP', 'ISFP' => 'ISFP', 'ESTP' => 'ESTP', 'ESFP' => 'ESFP',
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('avatarUrl', TextType::class, [
                'label'    => 'URL de l\'avatar',
                'required' => false,
                'attr'     => ['placeholder' => 'https://...', 'class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Profile::class]);
    }
}
