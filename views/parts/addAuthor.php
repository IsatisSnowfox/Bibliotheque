<form action="index.php" method="post">
    <h3>Ajout d'un auteur</h3>

    <?php if(isset($_SESSION['errors']['addAuthor']['general'])):
            foreach ($_SESSION['errors']['addAuthor']['general'] as $errorName => $errorText):?>
    <span class="error <?= $errorName;?>"><?= str_replace(':name', $_SESSION['populate']['addAuthor']['authorName'], $errorText);?></span>
    <?php endforeach; endif; ?>

    <?php if(isset($_SESSION['message']['addAuthor']['added']) && $_SESSION['message']['addAuthor']['added']):?>
    <span class="added"><?= str_replace(':name', $_SESSION['populate']['addAuthor']['authorName'], $_SESSION['message']['addAuthor']['added']); $_SESSION['populate']['addAuthor'] = [];?></span>
    <?php endif; ?>

    <label for="authorName">Nom complet de l'auteur</label>
    <input type="text" id="authorName" name="authorName" required="required" value="<?php if(isset($_SESSION['populate']['addAuthor']['authorName'])) echo $_SESSION['populate']['addAuthor']['authorName'] ?>">
    <?php if(isset($_SESSION['errors']['addAuthor']['name'])):
            foreach($_SESSION['errors']['addAuthor']['name'] as $error):?>
    <span class="error"><?= $error ?></span>
    <?php endforeach; endif; ?>

    <label for="authorBirthdate">Date de naissance (JJ-MM-AAAA)</label>
    <input type="text" name="authorBirthdate" id="authorBirthdate" value="<?php if(isset($_SESSION['populate']['addAuthor']['authorBirthdate'])) echo $_SESSION['populate']['addAuthor']['authorBirthdate'] ?>">
    <?php if(isset($_SESSION['errors']['addAuthor']['birthdate'])):
            foreach($_SESSION['errors']['addAuthor']['birthdate'] as $error):?>
    <span class="error"><?= $error ?></span>
    <?php endforeach; endif; ?>

    <label for="authorDeathdate">Date de mort (JJ-MM-AAAA)</label>
    <input type="text" name="authorDeathdate" id="authorDeathdate" value="<?php if(isset($_SESSION['populate']['addAuthor']['authorDeathdate'])) echo $_SESSION['populate']['addAuthor']['authorDeathdate'] ?>">
    <?php if(isset($_SESSION['errors']['addAuthor']['deathdate'])):
            foreach($_SESSION['errors']['addAuthor']['deathdate'] as $error):?>
    <span class="error"><?= $error ?></span>
    <?php endforeach; endif; ?>

    <label for="authorBiography">Synopsis</label>
    <textarea name="authorBiography" id="authorBiography" cols="30" rows="10"><?php if(isset($_SESSION['populate']['addAuthor']['authorBiography'])) echo $_SESSION['populate']['addAuthor']['authorBiography'] ?></textarea>
    <?php if(isset($_SESSION['errors']['addAuthor']['biography'])):
            foreach($_SESSION['errors']['addAuthor']['biography'] as $error):?>
    <span class="error"><?= $error ?></span>
    <?php endforeach; endif; ?>

    <button type="submit">Ajouter un auteur</button>

    <input type="hidden" name="resource" value="Author">
    <input type="hidden" name="action" value="add">
</form>

<?php $_SESSION['errors']['addAuthor'] = []; $_SESSION['message']['addAuthor'] = []; $_SESSION['populate']['addAuthor'] = [];?>
