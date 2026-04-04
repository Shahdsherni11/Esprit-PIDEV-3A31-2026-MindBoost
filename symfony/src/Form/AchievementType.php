<?php

namespace App\Form;

use App\Entity\Achievement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AchievementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('achievementName', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Achievement name'],
                'label' => 'Achievement Name',
            ])
            ->add('achievementScore', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => '0'],
                'label' => 'Score',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Achievement::class,
        ]);
    }
}
