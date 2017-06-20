<form action="index.php" method="GET">
    <h2>Rechercher un livre</h2>

    <label for="title">Titre</label>
    <input type="text" name="title" id="title">
    <label for="author">Auteur</label>
    <input type="text" name="author" id="author">
    <label for="genre">Genre</label>
    <select name="genre" id="genre">
        <option value=""></option>
        <?php foreach ($datas['genres'] as $genre):?>
        <option value="<?= $genre['id'];?>"><?= ucfirst($genre['name']) ;?></option>
        <?php endforeach; ?>
    </select>
    <label for="language">Langue</label>
    <select name="language" id="language">
        <option value=""></option>
        <?php foreach ($datas['languages'] as $language):?>
        <option value="<?= $language['id'];?>"><?= ucfirst($language['name']) ;?></option>
        <?php endforeach; ?>
    </select>

    <input type="hidden" name="action" value="advancedSearch">
    <input type="hidden" name="resource" value="Book">
    <button type="submit">Rechercher</button>
</form>
