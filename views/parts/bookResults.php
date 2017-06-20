<ul>
    <?php if($_SESSION['bookResults']): foreach ($_SESSION['bookResults'] as $book):?>
    <li>
        <ul>
            <li> <a href="index.php?id=<?= $book['id']?>&resource=Book&action=getSingle"><?= $book['title'] ?></a></li>
            <li><?= $book['author'] ?></li>
        </ul>
    </li>
    <?php endforeach;
    else:?>
    <span>Aucun livre ne correspond à votre recherche</span>
    <?php endif; ?>
</ul>
