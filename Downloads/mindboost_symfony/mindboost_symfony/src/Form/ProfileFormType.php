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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProfileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'attr'  => ['placeholder' => 'Votre prénom'],
                'constraints' => [new NotBlank(['message' => 'Le prénom est obligatoire.'])],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'attr'  => ['placeholder' => 'Votre nom de famille'],
                'constraints' => [new NotBlank(['message' => 'Le nom est obligatoire.'])],
            ])
            ->add('phone', TelType::class, [
                'label'    => 'Téléphone',
                'required' => false,
                'attr'     => ['placeholder' => '+216 XX XXX XXX'],
            ])
            ->add('personalityType', ChoiceType::class, [
                'label'       => 'Type de personnalité',
                'required'    => false,
                'placeholder' => '-- Sélectionner --',
                'choices'     => [
                    'Analytique'  => 'ANALYTIQUE',
                    'Leader'      => 'LEADER',
                    'Social'      => 'SOCIAL',
                    'Créatif'     => 'CREATIF',
                    'Empathique'  => 'EMPATHIQUE',
                ],
            ])
            ->add('avatarUrl', UrlType::class, [
                'label'    => "URL de l'avatar",
                'required' => false,
                'attr'     => ['placeholder' => 'https://...'],
            ])
            ->add('bio', TextareaType::class, [
                'label'    => 'Biographie',
                'required' => false,
                'attr'     => ['placeholder' => 'Parlez de vous en quelques mots...', 'rows' => 4],
                'constraints' => [new Length(['max' => 1000])],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => Profile::class]);
    }
}
