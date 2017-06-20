<form action="index.php" method="post">
    <h3>Ajout d'un livre</h3>

    <?php if(isset($_SESSION['errors']['addBook']['general'])):
            foreach ($_SESSION['errors']['addBook']['general'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= str_replace(':title', $_SESSION['populate']['addBook']['bookTitle'], $errorText);?></span>
    <?php endforeach; endif; ?>

    <?php if(isset($_SESSION['message']['addBook']['added']) && $_SESSION['message']['addBook']['added']):?>
    <span class="added"><?= str_replace(':title', $_SESSION['populate']['addBook']['bookTitle'], $_SESSION['message']['addBook']['added']); ?></span>
    <?php endif; $_SESSION['populate']['addBook'] = [];?>

    <label for="bookTitle">Titre du livre</label>
    <input type="text" name="bookTitle" id="bookTitle" value="<?php if(isset($_SESSION['populate']['addBook']['bookTitle'])) echo $_SESSION['populate']['addBook']['bookTitle']?>" required="required">
    <?php if(isset($_SESSION['errors']['addBook']['title'])):
            foreach ($_SESSION['errors']['addBook']['title'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <label for="bookAuthor">Auteur</label>
    <select name="bookAuthor" id="bookAuthor" required="required">
        <?php foreach ($datas['authors'] as $author):?>
        <option value="<?= $author['id'];?>" <?php if(isset($_SESSION['populate']['addBook']['bookAuthor'])){if($author['id'] === $_SESSION['populate']['addBook']['bookAuthor']) echo 'selected="selected"';} ?>><?= ucfirst($author['name']) ;?></option>
        <?php endforeach; ?>
    </select>
    <?php if(isset($_SESSION['errors']['addBook']['author'])):
            foreach ($_SESSION['errors']['addBook']['author'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <label for="bookGenre">Genre</label>
    <select name="bookGenre" id="bookGenre" required="required">
        <?php foreach ($datas['genres'] as $genre):?>
        <option value="<?= $genre['id'];?>" <?php if(isset($_SESSION['populate']['addBook']['bookGenre'])){if($genre['id'] === $_SESSION['populate']['addBook']['bookGenre']) echo 'selected="selected"';} ?>><?= ucfirst($genre['name']) ;?></option>
        <?php endforeach; ?>
    </select>
    <?php if(isset($_SESSION['errors']['addBook']['genre'])):
            foreach ($_SESSION['errors']['addBook']['genre'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <label for="bookISBN">ISBN</label>
    <input type="text" name="bookISBN" id="bookISBN" required="required" value="<?php if(isset($_SESSION['populate']['addBook']['bookISBN'])) echo $_SESSION['populate']['addBook']['bookISBN']?>">
    <?php if(isset($_SESSION['errors']['addBook']['isbn'])):
            foreach ($_SESSION['errors']['addBook']['isbn'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <label for="bookPages">Nombre de pages</label>
    <input type="number" name="bookPages" id="bookPages" value="<?php if(isset($_SESSION['populate']['addBook']['bookPages'])) echo $_SESSION['populate']['addBook']['bookPages']?>">
    <?php if(isset($_SESSION['errors']['addBook']['pages'])):
            foreach ($_SESSION['errors']['addBook']['pages'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <label for="bookDate">Date de publication (JJ-MM-AAAA)</label>
    <input type="text" name="bookDate" id="bookDate" value="<?php if(isset($_SESSION['populate']['addBook']['bookDate'])) echo $_SESSION['populate']['addBook']['bookDate']?>">
    <?php if(isset($_SESSION['errors']['addBook']['date'])):
            foreach ($_SESSION['errors']['addBook']['date'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <label for="bookLanguage">Langue</label>
    <select name="bookLanguage" id="bookLanguage" required="required">
        <?php foreach ($datas['languages'] as $language):?>
        <option value="<?= $language['id'];?>" <?php if(isset($_SESSION['populate']['addBook']['bookLanguage'])){if($language['id'] === $_SESSION['populate']['addBook']['bookLanguage']) echo 'selected="selected"';} ?>><?= ucfirst($language['name']) ;?></option>
        <?php endforeach; ?>
    </select>
    <?php if(isset($_SESSION['errors']['addBook']['language'])):
            foreach ($_SESSION['errors']['addBook']['language'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <label for="bookSummary">Synopsis</label>
    <textarea name="bookSummary" id="bookSummary" cols="30" rows="10"><?php if(isset($_SESSION['populate']['addBook']['bookSummary'])) echo $_SESSION['populate']['addBook']['bookSummary']?></textarea>
    <?php if(isset($_SESSION['errors']['addBook']['summary'])):
            foreach ($_SESSION['errors']['addBook']['summary'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= $errorText;?></span>
    <?php endforeach; endif; ?>

    <input type="hidden" name="resource" value="Book">
    <input type="hidden" name="action" value="add">

    <button type="submit">Ajouter le livre</button>
</form>

<?php $_SESSION['errors']['addBook'] = []; $_SESSION['message']['addBook'] = []; $_SESSION['populate']['addBook'] = [];?>
