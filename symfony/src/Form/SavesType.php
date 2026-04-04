<?php

namespace App\Form;

use App\Entity\Saves;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SavesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('postId', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Post ID'],
                'label' => 'Post ID',
            ])
            ->add('userId', IntegerType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'User ID'],
                'label' => 'User ID',
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Optional description...'],
                'label' => 'Description',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Saves::class,
        ]);
    }
}
