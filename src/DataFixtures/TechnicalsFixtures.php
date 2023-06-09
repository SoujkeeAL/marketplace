<?php

namespace App\DataFixtures;

use App\Entity\Technicals;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TechnicalsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('ru_RU');

        for ($i = 1; $i <= 50; $i++) {
            $technicals = new Technicals();
            $technicals
                ->setUid($i)
                ->setGoodName('Iphone 13 128gb Midnight, Nano-sim + eSim')
                ->setDescription('Не существует ни одной задачи, с выполнением которой не справился бы смартфон Apple iPhone 13. Неважно, что необходимо пользователю в текущий момент – навигация между окнами, быстрая загрузка приложений или мгновенная обработка данных.')
                ->setPicture('iphone13/iphone')
                ->setSpecs('Частота обновления экрана - 60 гц , Процессор - A 15 Bionic , Операционная система - IOS , Аккумулятор 2800 mAh ');

            $manager->persist($technicals);
            $manager->flush();
        }

        for ($i = 51; $i <= 100; $i++) {

            $technicals = new Technicals();
            $technicals
                ->setUid($i)
                ->setGoodName('Ноутбук MSI Katana GF76 12UC-265XRU')
                ->setDescription('Ноутбук MSI Katana GF76 12UC-265XRU предлагает мощные характеристики, продуманную эргономику и высокую реалистичность изображения. Он разработан для поклонников компьютерных игр.')
                ->setPicture('katana/katana')
                ->setSpecs('Процессор - Ryzen 5 5600x , Тип оперативной памяти - DDR4 , Видеокарта - RTX 3070 , Блок питания - 700w');

            $manager->persist($technicals);
            $manager->flush();
        }

        for ($i = 101; $i <= 150; $i++) {

            $technicals = new Technicals();
            $technicals
                ->setUid($i)
                ->setGoodName('Телевизор LED iFFALCON IFF65U62 черный')
                ->setDescription('Яркий, динамичный, энергичный. High Dynamic Range (HDR) - это стандарт формата ультравысокой четкости Ultra HD, который обеспечит вам невероятное удовольствие благодаря необыкновенной яркости, особой детализации теней и живым цветам.')
                ->setPicture('tv/tv')
                ->setSpecs('Диагональ - 65" , Объем оперативной памяти - 2GB , Разрешение - 4K , Частота обновления экрана - 60 Гц');

            $manager->persist($technicals);
            $manager->flush();
        }

        for ($i = 151; $i <= 200; $i++) {
            $technicals = new Technicals();
            $technicals
                ->setUid($i)
                ->setGoodName('Игровая консоль PlayStation 5')
                ->setDescription('Испытайте мощь ЦП, графического процессора и SSD с особой встроенной системой ввода и вывода, которые переворачивают представления о возможностях PlayStation. ')
                ->setPicture('playstation/playstation')
                ->setSpecs('Объем оперативной памяти  - 16 GB , Версия HDMI - 2.1 , Модель процессора - AMD Ryzen Zen 2 , Объем встроенной памяти - 825 GB ');

            $manager->persist($technicals);
            $manager->flush();
        }

        for ($i = 201; $i <= 250; $i++) {
            $technicals = new Technicals();
            $technicals
                ->setUid($i)
                ->setGoodName('Электросамокат Xiaomi Mi Electric Scooter 3 Lite')
                ->setDescription('Электросамокат Xiaomi Mi Electric Scooter 3 Lite – мощная модель с солидным запасом хода 20 км, которая станет хорошей альтернативой общественному транспорту или личному автомобилю при перемещениях по городу в час пик.')
                ->setPicture('scooter/scooter')
                ->setSpecs('Максимальная мощность мотора  - 300 Вт , Максимальная нагрузка - 100 кг , Емкость аккумулятора - 5200 мА*ч , Максимальная скорость - 25 км/ч ');

            $manager->persist($technicals);
            $manager->flush();
        }

        for ($i = 301; $i <= 350; $i++) {
            $technicals = new Technicals();
            $technicals
                ->setUid($i)
                ->setGoodName('Умная колонка Яндекс Станция 2, черный')
                ->setDescription('Умная колонка Яндекс Станция 2 в черном цвете встраивается в экосистему Умного Дома благодаря протоколу ZigBee. С ее помощью вы сможете настраивать уведомления, включать любимые плейлисты или подкасты.')
                ->setPicture('station/station')
                ->setSpecs('Мощность - 30 Вт , Количество динамиков - 2 , Диаметр ВЧ-динамика - 63 мм , Голосовой помощник - Алиса');

            $manager->persist($technicals);
            $manager->flush();
        }

    }
}
