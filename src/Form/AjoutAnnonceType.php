<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Post;
use DateTime;
use Faker\Core\Number;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class AjoutAnnonceType extends AbstractType
{

    /**
     * Summary of buildForm
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     * @return void
     */

    public function buildForm(FormBuilderInterface $builder, array $options) :void
    {
        $builder
            ->add("title", TextType::class, [
                "label" => "Titre",
                "required" => false,
                "constraints" => [new Length(["min" => 0, "max" => 150, "minMessage" => "Le titre ne doit pas faire plus de 150 caractères", 
                "maxMessage" => "Le titre ne doit pas faire plus de 150 caractères"]),]
            ])
            ->add("price", Number::class, [
                "label" => "prix",
                "required" => true,
                "constraints" => [
                    new NotBlank(["message" => 'Le contenu ne doit pas être vide !'])
                ]
            ])
            ->add("dateTime", DateTime::class, [
                "label" => "année",
                "required" => true,
                "constraints" => [
                    new NotBlank(["message" => 'Le contenu ne doit pas être vide !'])
                ]
            ])
            ->add("km", Number::class, [
                "label" => "km",
                "required" => true,
                "constraints" => [
                    new NotBlank(["message" => 'Le contenu ne doit pas être vide !'])
                ]
            ])
            ->add("carburant", TextareaType::class, [
                "label" => "Contenu",
                "required" => true,
                "constraints" => [
                    new Length(["min" =>1, "max" => 5, "minMessage" => "Le contenu doit faire entre 1 et 320 caractères", 
                    "maxMessage" => "La description doit faire entre 1 et 320 caractères"]),
                    new NotBlank(["message" => 'La description ne doit pas être vide !'])
                ]
            ])

            ->add("description", TextareaType::class, [
                "label" => "Contenu",
                "required" => true,
                "constraints" => [
                    new Length(["min" => 5, "max" => 320, "minMessage" => "La description doit faire entre 5 et 320 caractères", 
                    "maxMessage" => "La description doit faire entre 5 et 320 caractères"]),
                    new NotBlank(["message" => 'La description ne doit pas être vide !'])
                ]
            ])
            ->add("options", TextareaType::class, [
                "label" => "Contenu",
                "required" => true,
                "constraints" => [
                    new Length(["min" => 1, "max" => 10, "minMessage" => "Les options doit faire entre 5 et 320 caractères", 
                    "maxMessage" => "Les options doit faire entre 5 et 320 caractères"]),
                    new NotBlank(["message" => 'Les options ne doit pas être vide !'])
                ]
            ])
            ->add("equipements", TextareaType::class, [
                "label" => "Contenu",
                "required" => true,
                "constraints" => [
                    new Length(["min" => 1, "max" => 10, "minMessage" => "Les équipements doit faire entre 5 et 320 caractères", 
                    "maxMessage" => "Les équipements doit faire entre 5 et 320 caractères"]),
                    new NotBlank(["message" => 'Les équipements ne doit pas être vide !'])
                ]
            ])
            ->add("image", FileType::class, [
                "label" => "L'image",
                'mapped' => false,
                "required" => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            "image/gif",
                            "image/png",
                            "image/svg+xml",
                            "image/jpg",
                            "image/webp"
                        ],
                        'mimeTypesMessage' => 'Veuillez proposer une image valide.',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) : void
    {
        $resolver->setDefaults([
            "data_class" => Annonce::class,
            'csrf_protection' => true,
        ]);
    }
}