<?php

namespace App\DataFixtures;

use App\Entity\Banners;
use App\Repository\BannersRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BannerFixtures extends Fixture
{
    /**
     * @var BannersRepository
     */
    private BannersRepository $bannersRepository;

    public function __construct(BannersRepository $bannersRepository)
    {
        $this->bannersRepository = $bannersRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $banner = new Banners();
        $banner
            ->setTitle('Это лучший квадрокоптер!')
            ->setText('Новый виток развития технологий приносит нам новые возможности с коптером DJI MAVIC 25')
            ->setPicture('assets/img/content/home/slider.png');
        $manager->persist($banner);
        $manager->flush();

        $banner = new Banners();
        $banner
            ->setTitle('Этот котпер еще лучше!')
            ->setText('Самый быстрый и управляемый')
            ->setPicture('assets/img/content/home/slider.png');
        $manager->persist($banner);
        $manager->flush();

    }
}
