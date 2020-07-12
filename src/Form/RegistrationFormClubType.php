<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;


class RegistrationFormClubType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Debes aceptar los términos.',
                    ]),
                ],
            ])
            ->add('nomres', TextType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca el nombre del responsable',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Tu nombre debe tener {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 10,
                    ]),
                ],
            ])
            ->add('nomclub', TextType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca el nombre del club',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'El nombre debe tener {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('web', TextType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca la dirección web del club',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'La dirección web debe tener {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('direccion', TextType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca la dirección del club',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'La dirección debe tener {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('provincia', TextType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca la provincia del club',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'La provincia debe tener {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('poblacion', TextType::class, [
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca la poblacion del club',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'La población debe tener {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('telefono', TelType::class, [
                'mapped' => false,
                //'attr' => ['style' => 'background: red'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca el teléfono del club',
                    ]),
                    new Length([
                        'min' => 9,
                        'minMessage' => 'El teléfono debe tener un mínimo de {{ limit }} números',
                        // max length allowed by Symfony for security reasons
                        'max' => 12,
                        'maxMessage' => 'El teléfono debe tener un máximo de {{ limit }} números',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Por favor introduzca un password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Tu password debe tener mínimo {{ limit }} caracteres',
                        // max length allowed by Symfony for security reasons
                        'max' => 10,
                        'maxMessage' => 'Tu password debe tener máximo {{ limit }} caracteres',
                    ]),
                ],
                'type' => PasswordType::class,
                'invalid_message' => 'El campo password deben ser igual.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Repite Password'],

            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
