<?php

namespace App\Controller\Admin;

use App\Entity\Memoires;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MemoiresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Memoires::class;
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
