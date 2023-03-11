<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['test'];
    }

    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setName('Headphones');
        $product->setPrice(100);
        $manager->persist($product);

        $product = new Product();
        $product->setName('Phone case');
        $product->setPrice(20);
        $manager->persist($product);

        $manager->flush();
    }
}
