<?php

namespace App\Controller\Admin;

use App\Entity\CarteGraphique;
use App\Entity\Categories;
use App\Entity\DisqueDur;
use App\Entity\Marques;
use App\Entity\Memoires;
use App\Entity\Processeur;
use App\Entity\Produits;
use App\Entity\SousCategories;
use App\Entity\SystemeExploitation;
use App\Entity\Users;
use App\Repository\ProduitsRepository;
use App\Repository\UsersRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{

    private $users;
    private $produits;

    public function __construct(UsersRepository $users, ProduitsRepository $produits)
    {
        $this -> users = $users;
        $this -> produits = $produits;
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('bundles\EasyAdminBundle\welcome.html.twig', [
            'allUsers' => $this->users ->allUsers(),
            'produits' => $this -> produits -> allProduits()

        ]);
    }
    // public function adminDashboard()
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     // or add an optional message - seen by developers
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
    // }

    // public function configureAssets(): Assets
    // {
    //     return Assets::new()
    //             ->addCssFile('bundles/easyadmin/css/style.css');
    // }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            // use the given $user object to get the user name
            ->setName($user->getNom())
            ->setAvatarUrl('http://www.nretnil.com/avatar/LawrenceEzekielAmos.png');
            // ->setMenuItems([
            //                MenuItem::linkToRoute('My Profile', 'fa fa-id-card'),
            //                MenuItem::linkToRoute('Settings', 'fa fa-user-cog'),
            //                MenuItem::section(),
            //                MenuItem::linkToLogout('Logout', 'fa fa-sign-out'), ]);
            // ->setGravatarEmail($user->getEmail());
    }
    // return UserMenu::new()
    //         ->displayUserName()
    //         ->displayUserAvatar()
    //         ->setName(method_exists($user, '__toString') ? (string) $user : $user->getUsername())
    //         ->setAvatarUrl(null)
    //         ->setMenuItems();
    
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ElectroShop')
            ->setFaviconPath('images/unnamed.png');
            // ->renderSidebarMinimized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Categories', 'fa fa-address-card', Categories::class);
        yield MenuItem::linkToCrud('Sous Categories', 'fa fa-tags', SousCategories::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Produits::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        
        yield MenuItem::subMenu('Caracteristique', 'fa fa-list-alt')->setSubItems([
            MenuItem::linkToCrud('Carte Graphique', 'fa fa-tags', CarteGraphique::class),
            MenuItem::linkToCrud('Disque Dur', 'fa fa-file-text', DisqueDur::class),
            MenuItem::linkToCrud('Marques', 'fa fa-file-text', Marques::class),
            MenuItem::linkToCrud('Memoires', 'fa fa-sd-card', Memoires::class),
            MenuItem::linkToCrud('Processeur', 'fa fa-microchip', Processeur::class),
            MenuItem::linkToCrud('Systeme Exploitation', 'fa fa-file-text', SystemeExploitation::class),
        ]);
        yield MenuItem::section('Users');
        yield MenuItem::subMenu('Gestion du utilisateurs', 'fa fa-users')->setSubItems([
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-tags', Users::class),
        ]);
        // yield MenuItem::linkToLogout('Logout', 'fa fa-portal-exit');
    }
}
