<?php

namespace App\Form;

use App\Entity\Route;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RouteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Наименование'

                ],
                'label' => false,
            ])
            ->add('url', null, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Путь'

                ],
                'label' => false
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Route::class,
        ]);
    }
}
