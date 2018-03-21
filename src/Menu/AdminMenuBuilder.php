<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class AdminMenuBuilder
{
    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param array $options
     *
     * @return ItemInterface
     */
    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $configuration = $menu
            ->addChild('configuration')
            ->setLabel('Configuration')
        ;

        $configuration
            ->addChild('admin_users', ['route' => 'sylius_admin_admin_user_index'])
            ->setLabel('Administrators')
            ->setLabelAttribute('icon', 'lock')
        ;

        $configuration
            ->addChild('locales', ['route' => 'sylius_admin_locale_index'])
            ->setLabel('Locales')
            ->setLabelAttribute('icon', 'translate')
        ;


        return $menu;
    }
}