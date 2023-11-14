<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;

use App\Form\Type\AnnonceImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AnnonceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonce::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        
        return $crud
            ->setEntityLabelInSingular('Annonce')
            ->setEntityLabelInPlural('Annonces')

            ->setPageTitle('index', "Administration des voitures d'occasions")

            /*->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')*/
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title'),
            NumberField::new('price'),
            TextField::new('dateTime'),
            NumberField::new('km'),
            TextField::new('carburant'),
            TextareaField::new('description')
                ->setFormType(CKEditorType::class),
            TextareaField::new('option')
                ->setFormType(CKEditorType::class),
            TextareaField::new('equipement')
                ->setFormType(CKEditorType::class),
           TextField::new('imageFile')
                ->setFormType(VichImageType::class),
                //->onlyWhenCreating(),
            ImageField::new('imageName')
                ->setBasePath('/images/annonces')
                ->onlyOnIndex(),
            /*CollectionField::new('images')
                ->setEntryType(AnnonceImageType::class),*/
            SlugField::new('slug')
                ->setTargetFieldName('title')
                ->hideOnIndex(),  
        ];
    } 
    
   
}
