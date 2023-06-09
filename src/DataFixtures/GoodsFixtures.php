<?php

namespace App\DataFixtures;

use App\Entity\Goods;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class GoodsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('ru_RU');

        for ($i = 1; $i <= 350; $i++) {
            $good = new Goods();
            $good
                ->setSalesId(rand(1,350))
                ->setUid($i)
                ->setCategoryId(rand(1,18))
                ->setSellerId(rand(1,6))
                ->setSalesCount(rand(1,999));

            $manager->persist($good);
            $manager->flush();

        }
    }
}
