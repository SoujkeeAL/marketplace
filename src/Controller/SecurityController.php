<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\UserRegistrationType;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(
        AuthenticationUtils $authenticationUtils,
        CategoryRepository $categoryRepository
    ): Response
    {
        $menu = $categoryRepository->selectAllByName();
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig',
            ['last_username' => $lastUsername,
                'error' => $error,
                'menu'=> $menu]);
    }

    #[Route(path: '/register', name: 'app_register')]
    public function register(Request $request, CategoryRepository $categoryRepository, EntityManagerInterface $em, UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator): Response
    {

        $user = new User();
        $form = $this->createForm(UserRegistrationType::class,$user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword(password_hash($form->get('password')->getData(), PASSWORD_DEFAULT));
            $user->setPicture('assets/img/icons/user.jpg');

            $em->persist($user);
            $em->flush();

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        $menu = $categoryRepository->selectAllByName();

        return $this->render('pages/register.html.twig',[
            'menu' => $menu,
            'registrationForm' => $form->createView()
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
