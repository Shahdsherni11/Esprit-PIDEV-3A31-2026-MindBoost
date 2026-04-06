<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isEdit = $options['is_edit'];

        $builder
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'attr'  => ['placeholder' => 'email@domaine.com', 'class' => 'form-control'],
            ])
            ->add('role', ChoiceType::class, [
                'label'   => 'Rôle',
                'choices' => [
                    'Utilisateur'   => 'user',
                    'Psychologue'   => 'psychologist',
                    'Administrateur'=> 'admin',
                ],
                'attr' => ['class' => 'form-select'],
            ])
            ->add('isVerified', CheckboxType::class, [
                'label'    => 'Compte vérifié',
                'required' => false,
                'attr'     => ['class' => 'form-check-input'],
            ]);

        if (!$isEdit) {
            $builder->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'label'  => 'Mot de passe',
                'attr'   => ['placeholder' => 'Min. 8 caractères', 'class' => 'form-control'],
                'constraints' => [
                    // Contrôle de saisie : le mot de passe ne peut pas être vide
                    new NotBlank(['message' => 'Le mot de passe est obligatoire.']),
                    // Contrôle de saisie : le mot de passe doit contenir au moins 8 caractères
                    new Length(['min' => 8, 'minMessage' => 'Minimum {{ limit }} caractères.']),
                    // Contrôle de saisie : le mot de passe doit contenir au moins 1 majuscule et 1 chiffre
                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*\d).+$/',
                        'message' => 'Doit contenir au moins 1 majuscule et 1 chiffre.',
                    ]),
                ],
            ]);
        } else {
            $builder->add('plainPassword', PasswordType::class, [
                'mapped'   => false,
                'label'    => 'Nouveau mot de passe (laisser vide pour ne pas changer)',
                'required' => false,
                'attr'     => ['placeholder' => 'Laisser vide si inchangé', 'class' => 'form-control'],
                'constraints' => [
                    // Contrôle de saisie : le mot de passe doit contenir au moins 8 caractères
                    new Length(['min' => 8, 'minMessage' => 'Minimum {{ limit }} caractères.']),
                    // Contrôle de saisie : le mot de passe doit contenir au moins 1 majuscule et 1 chiffre
                    new Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*\d).+$/',
                        'message' => 'Doit contenir au moins 1 majuscule et 1 chiffre.',
                    ]),
                ],
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'is_edit'    => false,
        ]);
    }
}
