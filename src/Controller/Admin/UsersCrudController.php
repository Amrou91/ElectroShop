<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }


    public function configureActions(Actions $actions): Actions
    {
        $detailUser=Action::new('detailUser','Detail', 'fa fa-user') 
                    ->linkToCrudAction(Crud::PAGE_DETAIL)
                    ->addCssClass('btn btn-info');
        // $editUser=Action::new('editUser','Edit', 'fa fa-edit') 
        //             ->linkToCrudAction(Crud::PAGE_EDIT)
        //             ->addCssClass('btn btn-primary');
        return $actions
                // ->setPermission(Action::DELETE, 'ROLE_SUPER_ADMIN')
                ->add(Crud::PAGE_INDEX, $detailUser);
                // ->add(Crud::PAGE_INDEX, $editUser);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnIndex(),
            TextField::new('nom'),
            TextField::new('prenom'),
            EmailField::new('email'),
            TextField::new('password')->hideOnIndex(),            
            ArrayField::new('roles'),
            BooleanField::new('is_verified')->onlyOnIndex(),
        ];
    }

}
