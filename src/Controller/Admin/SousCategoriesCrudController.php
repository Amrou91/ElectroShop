<?php

namespace App\Controller\Admin;

use App\Entity\SousCategories;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SousCategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SousCategories::class;
    }


    public function configureActions(Actions $actions): Actions
    {
        $detail=Action::new('detailUser','Detail', 'fa fa-tag') 
                    ->linkToCrudAction(Crud::PAGE_DETAIL)
                    ->addCssClass('btn btn-info');
        return $actions
                    ->add(Crud::PAGE_INDEX, $detail);  
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnDetail(),
            TextField::new('libel', 'Nom des Sous-categories'),
            AssociationField::new('categories'),
        ];
    }
    
}
