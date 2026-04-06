<?php

namespace App\Form;

use App\Entity\SousTache;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;

class SousTacheFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr'  => ['rows' => 2, 'placeholder' => 'Décrivez cette sous-tâche...'],
                'constraints' => [new NotBlank(['message' => 'La description est obligatoire.'])],
            ])
            ->add('dureeRecommandee', IntegerType::class, [
                'label'    => 'Durée recommandée (minutes)',
                'required' => false,
                'attr'     => ['placeholder' => 'Ex: 30', 'min' => 1],
                'constraints' => [new Positive(['message' => 'La durée doit être positive.'])],
            ])
            ->add('etat', ChoiceType::class, [
                'label'   => 'État',
                'choices' => array_combine(SousTache::ETATS, SousTache::ETATS),
            ])
            ->add('priorite', ChoiceType::class, [
                'label'   => 'Priorité',
                'choices' => ['🔴 Haute (1)' => 1, '🟠 Moyenne (2)' => 2, '🟡 Normale (3)' => 3, '🟢 Basse (4)' => 4],
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(['data_class' => SousTache::class]);
    }
}
