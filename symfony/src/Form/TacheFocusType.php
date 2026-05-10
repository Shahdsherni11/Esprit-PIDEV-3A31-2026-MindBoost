<?php

namespace App\Form;

use App\Entity\TacheFocus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class TacheFocusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Le titre est obligatoire']),
                    new Length([
                        'min' => 3,
                        'max' => 255,
                        'minMessage' => 'Le titre doit avoir au moins 3 caractères',
                        'maxMessage' => 'Le titre ne peut pas dépasser 255 caractères',
                    ]),
                ],
            ])
            ->add('objectifPrincipal', TextareaType::class, [
                'required' => false,
                'constraints' => [
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'L\'objectif ne peut pas dépasser 255 caractères',
                    ]),
                ],
            ])
            ->add('niveauDifficulte', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    new Range([
                        'min' => 1,
                        'max' => 5,
                        'notInRangeMessage' => 'La difficulté doit être entre 1 et 5',
                    ]),
                ],
            ])
            ->add('statut', ChoiceType::class, [
                'choices' => [
                    'En cours' => 'En cours',
                    'Terminée' => 'Terminée',
                    'Non commencée' => 'Non commencée',
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le statut est obligatoire']),
                ],
            ])
            ->add('scoreProductivite', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    new Range([
                        'min' => 0,
                        'max' => 100,
                        'notInRangeMessage' => 'Le score doit être entre 0 et 100',
                    ]),
                ],
            ])
            ->add('heureDebut', TimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('heureFin', TimeType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TacheFocus::class,
        ]);
    }
}