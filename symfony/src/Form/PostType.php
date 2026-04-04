<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Post title'],
                'label' => 'Title',
            ])
            ->add('content', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'rows' => 6, 'placeholder' => 'Write your post content here...'],
                'label' => 'Content',
            ])
            ->add('tag', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'placeholder' => 'e.g. mental-health, anxiety'],
                'label' => 'Tag',
            ])
            ->add('imageUrl', TextType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control', 'placeholder' => 'https://...'],
                'label' => 'Image URL',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
