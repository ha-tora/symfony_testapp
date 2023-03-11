<?php

namespace App\Form;

use App\Repository\ProductRepository;
use App\Request\GetProductRequest;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GetProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', ChoiceType::class, [
                'label' => 'Product',
                'help' => 'Choose product',
                'choices' => $options['products']
            ])
            ->add('tin', TextType::class, [
                'label' => 'TIN',
                'help' => 'Type your tax number'
            ])
            ->add('get', SubmitType::class, [
                'label' => 'Get product'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GetProductRequest::class,
            'products' => []
        ]);

        $resolver->setAllowedTypes('products', 'array');
    }
}
