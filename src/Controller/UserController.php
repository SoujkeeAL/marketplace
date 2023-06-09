<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    #[Route('/user', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    #[Route('/account', name: 'app_account')]
    public function account(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        $user = $this->security->getUser();

        return $this->render('user/account.html.twig', [
            'menu' => $menu,
            'user' => $user
        ]);
    }

    #[Route('/profile', name: 'app_profile')]
    public function profile(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        $user = $this->security->getUser();

        return $this->render('user/profile.html.twig', [
            'menu' => $menu,
            'user' => $user
        ]);
    }

    #[Route('/history_order', name: 'app_history_order')]
    public function historyOrder(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        $user = $this->security->getUser();

        return $this->render('user/historyorder.html.twig', [
            'menu' => $menu,
            'user' => $user
        ]);
    }

    #[Route('/history_view', name: 'app_history_view')]
    public function historyView(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        $user = $this->security->getUser();

        return $this->render('user/historyview.html.twig', [
            'menu' => $menu,
            'user' => $user
        ]);
    }

    #[Route('/one_order', name: 'app_one_order')]
    public function oneOrder(CategoryRepository $categoryRepository): Response
    {
        $menu = $categoryRepository->selectAllByName();
        $user = $this->security->getUser();

        return $this->render('user/oneorder.html.twig', [
            'menu' => $menu,
            'user' => $user
        ]);
    }

}
