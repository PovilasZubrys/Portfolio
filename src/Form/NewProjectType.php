<?php

namespace App\Form;

use App\Entity\Projects;
use Doctrine\DBAL\Types\IntegerType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ['attr' => ['class' => 'input', 'placeholder' => 'Title'], 'label' => false])
            ->add('description', TextareaType::class, ['attr' => ['class' => 'textarea', 'placeholder' => 'Description'], 'label' => false])
            ->add('url', TextType::class, ['attr' => ['class' => 'input', 'placeholder' => 'URL'], 'label' => false])
            ->add('image_path', TextType::class, ['attr' => ['class' => 'input', 'placeholder' => 'Image Path'], 'label' => false])
            ->add('position', TextType::class, ['attr' => ['class' => 'input', 'placeholder' => 'Projects position in the list'], 'label' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
