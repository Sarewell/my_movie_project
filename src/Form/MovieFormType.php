<?php

namespace App\Form;

use App\Entity\MovieName;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MovieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('author')
            ->add('description')
            ->add('image')
            // ->add('année_de_sortie')
            ->add('categorie')
            ->add('resume')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MovieName::class,
        ]);
    }
}
