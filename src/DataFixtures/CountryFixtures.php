<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['test'];
    }
    
    public function load(ObjectManager $manager): void
    {
        $country = new Country();
        $country->setName('Germany');
        $country->setCode('DE');
        $country->setTinPattern('[0-9]{9}');
        $country->setTax(19);
        $manager->persist($country);

        $country = new Country();
        $country->setName('Italy');
        $country->setCode('IT');
        $country->setTinPattern('[0-9]{11}');
        $country->setTax(22);
        $manager->persist($country);

        $country = new Country();
        $country->setName('Greece');
        $country->setCode('GR');
        $country->setTinPattern('[0-9]{9}');
        $country->setTax(24);
        $manager->persist($country);

        $manager->flush();
    }
}
