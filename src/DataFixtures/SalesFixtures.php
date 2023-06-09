<?php

namespace App\DataFixtures;

use App\Entity\Sales;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SalesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('ru_RU');
        for ($i = 0; $i <= 350; $i++) {
            $sales = new Sales();
            $sales
                ->setUid($i)
                ->setPrevPrice($this->faker->randomNumber(5))
                ->setFinalPrice($this->faker->randomNumber(4));

            $manager->persist($sales);
            $manager->flush();
        }
    }
}
