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
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class TacheFocusFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre de la tâche',
                'attr'  => ['placeholder' => 'Ex: Révision mathématiques'],
                'constraints' => [new NotBlank(['message' => 'Le titre est obligatoire.'])],
            ])
            ->add('objectifPrincipal', TextareaType::class, [
                'label'    => 'Objectif principal',
                'required' => false,
                'attr'     => ['rows' => 3, 'placeholder' => 'Décrivez ce que vous voulez accomplir...'],
            ])
            ->add('niveauDifficulte', ChoiceType::class, [
                'label'   => 'Niveau de difficulté',
                'choices' => [
                    '⭐ Très facile' => 1,
                    '⭐⭐ Facile'    => 2,
                    '⭐⭐⭐ Moyen'  => 3,
                    '⭐⭐⭐⭐ Difficile' => 4,
                    '⭐⭐⭐⭐⭐ Très difficile' => 5,
                ],
            ])
            ->add('statut', ChoiceType::class, [
                'label'   => 'Statut',
                'choices' => array_combine(TacheFocus::STATUTS, TacheFocus::STATUTS),
            ])
            ->add('priorite', ChoiceType::class, [
                'label'   => 'Priorité',
                'choices' => ['🔴 Haute (1)' => 1, '🟠 Moyenne (2)' => 2, '🟡 Normale (3)' => 3, '🟢 Basse (4)' => 4, '⚪ Très basse (5)' => 5],
            ])
            ->add('heureDebut', TimeType::class, [
                'label'    => 'Heure de début',
                'required' => false,
                'widget'   => 'single_text',
            ])
            ->add('heureFin', TimeType::class, [
                'label'    => 'Heure de fin',
                'required' => false,
                'widget'   => 'single_text',
            ])
            ->add('scoreProductivite', IntegerType::class, [
                'label'    => 'Score de productivité (0-100)',
                'required' => false,
                'attr'     => ['min' => 0, 'max' => 100, 'placeholder' => '0'],
                'constraints' => [new Range(['min' => 0, 'max' => 100])],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => TacheFocus::class]);
    }
}
