<article class="single-book">
    <h2><?= $datas['book']['title'] ?></h2>
    <dl class="">
        <dt>Auteur</dt>
        <dd><a href="index.php?author_id=<?= $datas['book']['author_id']?>"><?= $datas['book']['author'] ?></a></dd>

        <dt>Genre</dt>
        <dd><?= $datas['book']['genre'] ?></dd>

        <dt>Langue</dt>
        <dd><?= $datas['book']['language'] ?></dd>

        <dt>ISBN</dt>
        <dd><?= $datas['book']['isbn'] ?></dd>

        <?php if($datas['book']['datepub']): ?>
        <dt>Date de parution</dt>
        <dd><?= $datas['book']['datepub'] ?></dd>
        <?php endif; ?>

        <?php if($datas['book']['npages']): ?>
        <dt>Nombre de pages</dt>
        <dd><?= $datas['book']['npages'] ?></dd>
        <?php endif; ?>

        <?php if($datas['book']['summary']): ?>
        <dt>Synopsis</dt>
        <dd><?= $datas['book']['summary'] ?></dd>
        <?php endif; ?>
    </dl>

    <?php if($datas['book']['front_cover']): ?>
    <img src="<?= $datas['book']['front_cover'] ?>" alt="Couverture de <?= $datas['book']['title'] ?>">
    <?php endif; ?>

    <?php if(isset($_SESSION['user']) && $_SESSION['user']['status'] == 0): ?>
    <a href="index.php?resource=Page&action=update&id=<?= $datas['book']['id']?>">Modifier le livre</a>
    <form action="index.php" method="post">
        <input type="hidden" name="resource" value="Book">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?= $datas['book']['id']?>">
        <button type="submit" name="button">Supprimer le livre</button>
    </form>
    <?php endif; ?>
</article>
