<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'attr'  => ['placeholder' => 'votre@email.com', 'class' => 'form-control'],
            ])
            ->add('role', ChoiceType::class, [
                'label'   => 'Rôle',
                'choices' => [
                    'Utilisateur'   => 'user',
                    'Psychologue'   => 'psychologist',
                ],
                'attr' => ['class' => 'form-select'],
                'mapped' => true,
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type'          => PasswordType::class,
                'mapped'        => false,
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr'  => ['placeholder' => 'Min. 8 caractères', 'class' => 'form-control'],
                    'constraints' => [
                        // Contrôle de saisie : le mot de passe ne peut pas être vide
                        new NotBlank(['message' => 'Le mot de passe est obligatoire.']),
                        // Contrôle de saisie : le mot de passe doit contenir au moins 8 caractères
                        new Length([
                            'min'        => 8,
                            'minMessage' => 'Le mot de passe doit avoir au moins {{ limit }} caractères.',
                        ]),
                        // Contrôle de saisie : le mot de passe doit contenir au moins 1 majuscule et 1 chiffre
                        new Regex([
                            'pattern' => '/^(?=.*[A-Z])(?=.*\d).+$/',
                            'message' => 'Le mot de passe doit contenir au moins 1 majuscule et 1 chiffre.',
                        ]),
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'attr'  => ['placeholder' => 'Répéter le mot de passe', 'class' => 'form-control'],
                ],
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped'      => false,
                'label'       => "J'accepte les conditions d'utilisation",
                'constraints' => [
                    // Contrôle de saisise : l'utilisateur doit accepter les conditions
                    new IsTrue(['message' => 'Vous devez accepter les conditions d\'utilisation.']),
                ],
                'attr' => ['class' => 'form-check-input'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => User::class]);
    }
}
