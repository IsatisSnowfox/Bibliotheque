<nav>
    <ul class="navigation__list">
        <?php
        $userType = 'basic';
        if(!isset($_SESSION['user'])) {
            $userType = 'loggedOut';
        } else {
            if($_SESSION['user']['status'] === '0') {
                $userType = 'admin';
            } else if($_SESSION['user']['status'] === '1') {
                $userType = 'basic';
            }
        }

        foreach($navSlugs[$userType] as $navSlug):
            ?>
        <li class="navigation__item">
            <a href="<?= $navItems[$navSlug]['url']; ?>" class="navigation__link"><?= $navItems[$navSlug]['label']; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>
