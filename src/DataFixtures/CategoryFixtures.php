<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
    $this->categoryRepository = $categoryRepository;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $category = new Category();
        $category
            ->setId(1)
            ->setName('Accessories')
            ->setCategPicture('1.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(2)
            ->setName('Bags')
            ->setCategPicture('2.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(3)
            ->setName('Cameras')
            ->setCategPicture('3.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(4)
            ->setName('Accessories')
            ->setCategPicture('1.svg')
            ->setParentId(3)
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(5)
            ->setName('Bags')
            ->setCategPicture('2.svg')
            ->setParentId(3)
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(6)
            ->setName('Clothings')
            ->setCategPicture('4.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(7)
            ->setName('Electronics')
            ->setCategPicture('5.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(8)
            ->setName('Fashion')
            ->setCategPicture('6.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(9)
            ->setName('Furniture')
            ->setCategPicture('7.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(10)
            ->setName('Accessories')
            ->setCategPicture('1.svg')
            ->setParentId(9)
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(11)
            ->setName('Bags')
            ->setCategPicture('2.svg')
            ->setParentId(9)
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(12)
            ->setName('Lightings')
            ->setCategPicture('8.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(13)
            ->setName('Mobiles')
            ->setCategPicture('9.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(14)
            ->setName('Trends')
            ->setCategPicture('10.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(15)
            ->setName('More')
            ->setCategPicture('11.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(16)
            ->setName('Accessories')
            ->setCategPicture('1.svg')
            ->setParentId(15)
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(17)
            ->setName('Bags')
            ->setCategPicture('2.svg')
            ->setParentId(15)
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();

        $category = new Category();
        $category
            ->setId(18)
            ->setName('Lightings')
            ->setCategPicture('12.svg')
            ->setIsActive(1);
        $manager->persist($category);
        $manager->flush();
    }
}
