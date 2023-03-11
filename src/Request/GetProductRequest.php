<?php

namespace App\Request;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class GetProductRequest
{
    #[Assert\NotBlank]
    public $product;

    #[Assert\NotBlank]
    public $tin;
}