<?php
namespace Model;

class Navigation extends Model {
    public function getNavItems($navItems, $loginSlugs, $logoutSlugs) {
        $navigation = [];
        if($this->isUserConnected()) {
            foreach($loginSlugs as $slug) {
                $navigation[] = $navItems[$slug];
            }
        } else {
            foreach($logoutSlugs as $slug) {
                $navigation[] = $navItems[$slug];
            }
        }
        return $navigation;
    }
}