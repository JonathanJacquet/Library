<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Titre'
            ])
            ->add('author', null, [
                'label' => 'Auteur'
            ])
            ->add('datePublication', null, [
                'label' => 'Date de publication'
            ])
            ->add('resume', null, [
                'label' => 'Résumé'
            ])
            ->add('status', null, [
                'label' => 'Disponible'
            ])
            ->add('borrower', null, [
                'label' => 'Nom emprunteur'
            ])
            ->add('category', null, [
                'label' => 'Catégorie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
