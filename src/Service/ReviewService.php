<?php

namespace App\Service;

use App\Entity\Reviews;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;

class ReviewService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addReview(Reviews $reviews, Request $request, )
    {
        $reviews
            ->setText($request->get('text'))
            ->setUserId()
            ->setGoodId();

        $this->entityManager->persist($reviews);
        $this->entityManager->flush();
    }
}