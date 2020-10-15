<?php

namespace App\Controller\Admin;

use App\Entity\Prospect;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ProspectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Prospect::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('lastName'),
            TextField::new('firstName'),
            DateField::new('birthdate'),
            EmailField::new('email'),
            AssociationField::new('cars'),
            AssociationField::new('city'),
        ];
    }
}
