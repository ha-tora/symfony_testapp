<?php

namespace App\Request;

use Symfony\Component\Validator\Constraints as Assert;

class GetProductRequest
{
    #[Assert\NotBlank]
    public $product;

    #[Assert\NotBlank]
    public $tin;
}