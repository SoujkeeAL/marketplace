<?php

namespace App\DataFixtures;

use App\Entity\Sellers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SellersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('ru_RU');

        $seller = new Sellers();
        $seller
            ->setCompany('ДНС')
            ->setTelephone('+79' . $this->faker->randomNumber(9, true))
            ->setContact($this->faker->name('male'));

        $manager->persist($seller);
        $manager->flush();


        $seller = new Sellers();
        $seller
            ->setCompany('Ситилинк')
            ->setTelephone('+79' . $this->faker->randomNumber(9, true))
            ->setContact($this->faker->name('male'));

        $manager->persist($seller);
        $manager->flush();

        $seller = new Sellers();
        $seller
            ->setCompany('Плеер.ру')
            ->setTelephone('+79' . $this->faker->randomNumber(9, true))
            ->setContact($this->faker->name('male'));

        $manager->persist($seller);
        $manager->flush();

        $seller = new Sellers();
        $seller
            ->setCompany('М.Видео')
            ->setTelephone('+79' . $this->faker->randomNumber(9, true))
            ->setContact($this->faker->name('male'));

        $manager->persist($seller);
        $manager->flush();

        $seller = new Sellers();
        $seller
            ->setCompany('Технопарк')
            ->setTelephone('+79' . $this->faker->randomNumber(9, true))
            ->setContact($this->faker->name('male'));

        $manager->persist($seller);
        $manager->flush();

        $seller = new Sellers();
        $seller
            ->setCompany('Эльдорадо')
            ->setTelephone('+79' . $this->faker->randomNumber(9, true))
            ->setContact($this->faker->name('male'));

        $manager->persist($seller);
        $manager->flush();
    }
}
