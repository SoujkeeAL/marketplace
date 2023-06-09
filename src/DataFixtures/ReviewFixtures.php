<?php

namespace App\DataFixtures;

use App\Entity\Reviews;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ReviewFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('ru_RU');

        for ($i = 1; $i <= 400; $i++) {
            $review = new Reviews();
            $review
                ->setUserId(rand(1,20))
                ->setGoodId(rand(1,350))
                ->setText('lorem ipsum это отызв ' . $i)
                ->setIsActive(1)
                ->setCreatedAt($this->faker->dateTimeBetween('-3 years','now'));
            // $product = new Product();
            // $manager->persist($product);
            $manager->persist($review);
            $manager->flush();
        }
    }
}
