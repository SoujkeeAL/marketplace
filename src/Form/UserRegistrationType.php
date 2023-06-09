<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Ваш email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите email'
                    ])
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Пароль',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите пароль'
                    ])
                ]
            ])
            ->add('userName', null,[
                'label' => 'Имя пользователя',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите имя пользователя'
                    ])
                ]
            ])
            ->add('telephone', TelType::class,[
                'label' => 'Номер телефона',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Введите номер телефона'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
