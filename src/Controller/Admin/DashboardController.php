<?php

namespace App\Controller\Admin;

use App\Entity\Agency;
use App\Entity\Prospect;
use App\Entity\User;
use App\Entity\City;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */


    public function index(): Response
    {
        return $this->render('bundle/EasyAdminBundle/welcome.html.twig');
        // return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Magnassurance');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Agences', 'icon class', Agency::class);
        yield MenuItem::linkToCrud('Prospect', 'icon class', Prospect::class);
        yield MenuItem::linkToCrud('User', 'icon class', User::class);
        yield MenuItem::linkToCrud('City', 'icon class', City::class);

    }
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        // Usually it's better to call the parent method because that gives you a
        // user menu with some menu items already created ("sign out", "exit impersonation", etc.)
        // if you prefer to create the user menu from scratch, use: return UserMenu::new()->...
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getUsername())
            // use this method if you don't want to display the name of the user
            ->displayUserName(false)

            // you can use any type of menu item, except submenus
            ->addMenuItems([
                MenuItem::section(),
                MenuItem::linkToLogout('Logout', 'fa fa-sign-out'),
            ]);
    }



}
