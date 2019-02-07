<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'Catégorie'
            ])
            // ->add('author', null, [
            //     'label' => 'Auteur'
            // ])
            // ->add('datePublication', null, [
            //     'label' => 'Date de publication'
            // ])
            // ->add('title', null, [
            //     'label' => 'Titre'
            // ])
        ;
    }

    public function buildFormAll(FormBuilderInterface $builder, array $opytions) {
        $builder
            ->add('author', null, [
                'label' => 'Auteur'
            ])
            ->add('datePublication', null, [
                'label' => 'Date de publication'
            ])
            ->add('title', null, [
                'label' => 'Titre'
            ])
          ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }

}
