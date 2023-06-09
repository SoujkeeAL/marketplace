<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{

    /**
     * @var \Faker\Generator
     */
    protected $faker;

    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('ru_RU');

        $user = new User();
        $user
            ->setEmail('admin@megano.ru')
            ->setPassword(password_hash('123456', PASSWORD_DEFAULT))
            ->setUserName('Admin')
            ->setTelephone('+79999777303')
            ->setFirstName('Артём')
            ->setLastName('Юлин')
            ->setPicture('assets/img/icons/admin.jpg');

        $manager->persist($user);

        for ($i = 1; $i <= 20; $i++) {
            $user = new User();
            $user
                ->setEmail($this->faker->email)
                ->setUserName($this->faker->firstName)
                ->setPassword(password_hash('123456', PASSWORD_DEFAULT))
                ->setTelephone('+79' . $this->faker->randomNumber(9, true))
                ->setFirstName($this->faker->firstName)
                ->setLastName($this->faker->lastName)
                ->setPicture('assets/img/icons/user.jpg');
            $manager->persist($user);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
