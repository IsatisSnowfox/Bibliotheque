<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Bibliothèque</title>
</head>
<body>
    <h1>Bibliothèque</h1>
    <header>
        <?php include 'views/parts/navigation.php';?>

        <!-- <nav>
            <ul class="navigation__list">
                <?php
                include 'Controller/Navigation.php';
                $datas['navigation'] = @\Controller\Navigation::getNav($navItems, $loginNavItems, $logoutNavItems);
                foreach($datas['navigation'] as $navItem):
                    ?>
                <li class="navigation__item">
                    <a href="<?= $navItem['url']; ?>" class="navigation__link"><?= $navItem['label']; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav> -->
        <?php //include 'views/parts/navigation.php'; ?>
    </header>
    <main>
        <?php foreach($datas['views'] as $part){
            include $part;
        }
        ?>
    </main>

 <footer>
     <p>Designed and developed by <a href="#">Félix Gason</a></p>
 </footer>
</body>
</html>
