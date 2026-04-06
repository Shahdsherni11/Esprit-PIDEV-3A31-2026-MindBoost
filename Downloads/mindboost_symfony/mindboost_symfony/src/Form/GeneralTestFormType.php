<?php

namespace App\Form;

use App\Entity\GeneralTest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class GeneralTestFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du test',
                'attr'  => ['placeholder' => 'Ex: Test de bien-être général'],
                'constraints' => [
                    new NotBlank(['message' => 'Le titre est obligatoire.']),
                    new Length(['min' => 3, 'max' => 255]),
                ],
            ])
            ->add('description', TextareaType::class, [
                'label'    => 'Description',
                'required' => false,
                'attr'     => ['rows' => 4, 'placeholder' => 'Décrivez l\'objectif de ce test...'],
            ])
            ->add('status', ChoiceType::class, [
                'label'   => 'Statut',
                'choices' => [
                    '📝 Brouillon' => 'DRAFT',
                    '✅ Actif'     => 'ACTIVE',
                    '🚫 Inactif'   => 'INACTIVE',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => GeneralTest::class]);
    }
}
