<?php

namespace App\Controller\Admin;

use App\Entity\DisqueDur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DisqueDurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DisqueDur::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
