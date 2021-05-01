<?php


namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root', ['childrenAttributes' => ['class' => 'main-nav nav navbar-nav']]);

        $menu->addChild('Home', ['route' => 'home']);
        $menu->addChild('Produits', ['route' => 'produits']);
        $menu->addChild('Contacts', ['route' => 'contact']);
        // $menu->addChild('Produits', ['route' => 'produits']);
        // ... add more children

        return $menu;
    }
}
