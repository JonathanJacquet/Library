<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\Loader\CallbackChoiceLoader;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', EntityType::class, [
                'class' => Category::class,
                'label' => 'Catégorie',
                'choice_value' => function (Category $category = null) {
                    return $category ? $category->getId() : '';
            }])
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
        ]);
    }

}
