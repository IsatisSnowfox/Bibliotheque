<?php
namespace Controller;

use \Model\Navigation as navModel;
class Navigation {
    public function getNav($navItems, $loginNavItems, $logoutNavItems) {
        $navModel = new navModel;
        $datas['navigation'] = $navModel->getNavItems($navItems, $loginNavItems, $logoutNavItems);
        return $datas['navigation'];
    }
}