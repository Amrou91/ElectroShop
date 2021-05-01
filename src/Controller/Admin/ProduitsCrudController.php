<?php

namespace App\Controller\Admin;

use App\Entity\Produits;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;

class ProduitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produits::class;
    }


    public function configureActions(Actions $actions): Actions
    {
        $detail=Action::new('detail','Details', 'fa fa-tag') 
                    ->linkToCrudAction(Crud::PAGE_DETAIL)
                    ->addCssClass('btn btn-info');
        return $actions
                    ->add(Crud::PAGE_INDEX, $detail);  
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id', 'Identifiant')->onlyOnIndex(), 
            TextField::new('libel','Nom des Produits'),
            TextField::new('slug'),
            MoneyField::new('prix')->setCurrency('TND'),
            BooleanField::new('etat'),
            IntegerField::new('quantite'), 
            DateTimeField::new('createdAt')->onlyOnIndex(),
            DateTimeField::new('updatedAt')->onlyOnIndex(), 
            TextEditorField::new('contenu'),
            ColorField::new('couleur'),
            ImageField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->onlyOnDetail(), 
            ImageField::new('featuredImage')
                ->setBasePath('images/produits')
                ->setUploadDir('public/images/produits')
                ->setLabel('image'),
            AssociationField::new('marque'),
            AssociationField::new('processeur'),
            AssociationField::new('carteGraphique'),
            AssociationField::new('disqueDur'),
            AssociationField::new('memoire'),
            AssociationField::new('systemeExploitation'),
            AssociationField::new('sousCategorie'),

        ];
    }
    
}
