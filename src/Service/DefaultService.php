<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\CountryRepository;
use App\Repository\ProductRepository;
use App\Request\GetProductRequest;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormInterface;

class DefaultService
{
    public function __construct(
        private ProductRepository $productRepository,
        private CountryRepository $countryRepository
    ) { }

    public function index(FormInterface $form): Product|null
    {
        $data = $form->getData();

        $country = $this->countryRepository->findByTINOrNull($data->tin);
        if(!$country) {
            $form['tin']->addError(new FormError('TIN is not valid'));
            return null;
        }

        $product = $this->productRepository->findOneBy(['id' => $data->product]);
        if(!$product) {
            $form['product']->addError(new FormError('Product not found'));
            return null;
        }

        $fullPrice = (float) $product->getPrice() * (1 + (float) $country->getTax() / 100);
        $product->setPrice((string) $fullPrice);
        
        return $product;
    }
}