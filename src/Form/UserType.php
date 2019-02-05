<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
              'label' => 'Nom'
            ])
            ->add('firstname', null, [
              'label' => 'Prénom'
            ])
            ->add('age', null, [
              'label'=> 'Age'
            ])
            ->add('cardNumber', null, [
              'label' => 'N° de carte'
            ])
            ->add('adress', null, [
              'label'=> 'Adresse'
            ])
            ->add('city', null, [
              'label' => 'Ville'
            ])
            ->add('postalCode', null, [
              'label' => 'Code postal'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
