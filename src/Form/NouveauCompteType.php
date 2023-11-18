<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;



/**
 * Summary of buildForm
 * @param \Symfony\Component\Form\FormBuilderInterface $builder
 * @param array $options
 * @return void
 */

class NouveauCompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add("email", EmailType::class, [
                "label" => "Email",
                "required" => true,
                "constraints" => [
                    new Length([
                        "min" => 2, 
                        "max" => 180, 
                        "minMessage" => "L'email ne doit pas faire moins de 2 caractères", 
                        "maxMessage" => "L'email ne doit pas faire plus de 180 caractères"]),
                    new NotBlank([
                        "message" => "L'email ne doit pas être vide !"])
                ]
            ])
          
            ->add("nom", TextType::class, [
                "label" => "Nom de famille",
                "required" => true,
                "constraints" => [
                    new Length([
                        "min" => 2, 
                        "max" => 180, 
                        "minMessage" => "Le nom ne doit pas faire moins de 2 caractères", 
                        "maxMessage" => "L'email ne doit pas faire plus de 180 caractères"]),
                    new NotBlank([
                        "message" => "Le nom ne doit pas être vide !"])
                ]
            ])

            ->add("prenom", TextType::class, [
                "label" => "Prénom",
                "required" => true,
                "constraints" => [
                    new Length([
                        "min" => 2, 
                        "max" => 180, 
                        "minMessage" => "Le prénom ne doit pas faire moins de 2 caractères", 
                        "maxMessage" => "L'email ne doit pas faire plus de 180 caractères"]),
                    new NotBlank([
                        "message" => "Le prénom ne doit pas être vide !"])
                ]
            ])

            ->add("plainPassword", RepeatedType::class, [
                "type" => PasswordType::class,
                "first_options" => [
                    "attr" => [
                        "class" => "form-control"
                    ],
                    "label" => "Mot de passe",
                    "label_attr" => [
                        "class" => "form-label  mt-4"
                    ]
                ],
                "second_options" => [
                    "attr" => [
                        "class" => "form-control"
                    ],
                    "label" => "Confirmation du mot de passe",
                    "label_attr" => [
                        "class" => "form-label  mt-4"
                    ]
                ],
                "invalid_message" => "Les mots de passe ne correspondent pas.",
                "constraints" => [
                    new NotBlank([
                        "message" => "Le mot de passe ne peut pas être vide !"])
                    ],
            ])

            ->add("submit", SubmitType::class, [
                "attr" => [
                    'class' => "btn btn-primary mt-4"
                ],
                "label" => "Créer compte",
    
            ]);  
            
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            "data_class" => User::class,
            'csrf_protection' => true,
        ]);
    }
}