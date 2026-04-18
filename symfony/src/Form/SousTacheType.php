<?php

namespace App\Form;

use App\Entity\SousTache;
use App\Entity\TacheFocus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class SousTacheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'La description est obligatoire']),
                    new Length([
                        'min' => 3,
                        'max' => 255,
                        'minMessage' => 'La description doit avoir au moins 3 caractères',
                        'maxMessage' => 'La description ne peut pas dépasser 255 caractères',
                    ]),
                ],
            ])
            ->add('dureeRecommandee', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    new Range([
                        'min' => 1,
                        'max' => 480,
                        'notInRangeMessage' => 'La durée doit être entre 1 et 480 minutes',
                    ]),
                ],
            ])
            ->add('etat', ChoiceType::class, [
    'choices' => [
        'À faire' => 'À faire',
        'En cours' => 'En cours',
        'Terminée' => 'Terminée',
        'Bloquée' => 'Bloquée',
    ],
    'constraints' => [
        new NotBlank(['message' => 'L\'état est obligatoire']),
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
            ->add('priorite', IntegerType::class, [
                'required' => false,
                'constraints' => [
                    new Range([
                        'min' => 1,
                        'max' => 5,
                        'notInRangeMessage' => 'La priorité doit être entre 1 et 5',
                    ]),
                ],
            ])
            ->add('tacheFocus', EntityType::class, [
                'class' => TacheFocus::class,
                'choice_label' => 'titre',  //affiche le titre dans la liste
                'placeholder' => 'Sélectionner une tâche...',
                'constraints' => [
                    new NotBlank(['message' => 'La tâche parente est obligatoire']),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SousTache::class,  //lie le formulaire à l’entité SousTache 
        ]);
    }
}