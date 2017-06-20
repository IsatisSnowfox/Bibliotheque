<?php $book = $datas['book'] ?>
<article class="single-book">
    <form action="index.php" method="post">
        <h2>Modifier <span><?= $datas['book']['title'] ?></span></h2>

        <label for="bookTitle">Titre du livre</label>
        <input type="text" name="bookTitle" id="bookTitle" value="<?= $book['title']?>" required="required">
        <?php if(isset($_SESSION['errors']['updateBook']['title'])):
                foreach ($_SESSION['errors']['updateBook']['title'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookAuthor">Auteur</label>
        <select name="bookAuthor" id="bookAuthor" required="required">
            <?php foreach ($datas['authors'] as $author):?>
            <option value="<?= $author['id'];?>" <?php if($author['id'] === $book['author_id']) echo 'selected="selected"'; ?>><?= ucfirst($author['name']) ;?></option>
            <?php endforeach; ?>
        </select>
        <?php if(isset($_SESSION['errors']['updateBook']['author'])):
                foreach ($_SESSION['errors']['updateBook']['author'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookImg">Couverture</label>
        <input type="file" name="bookImg" id="bookImg">
        <?php if(isset($_SESSION['errors']['updateBook']['cover'])):
                foreach ($_SESSION['errors']['updateBook']['cover'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookGenre">Genre</label>
        <select name="bookGenre" id="bookGenre" required="required">
            <?php foreach ($datas['genres'] as $genre):?>
            <option value="<?= $genre['id'];?>" <?php if($genre['id'] === $book['genre_id']) echo 'selected="selected"'; ?>><?= ucfirst($genre['name']) ;?></option>
            <?php endforeach; ?>
        </select>
        <?php if(isset($_SESSION['errors']['updateBook']['genre'])):
                foreach ($_SESSION['errors']['updateBook']['genre'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookISBN">ISBN</label>
        <input type="text" name="bookISBN" id="bookISBN" required="required" value="<?= $book['isbn']?>">
        <?php if(isset($_SESSION['errors']['updateBook']['isbn'])):
                foreach ($_SESSION['errors']['updateBook']['isbn'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookPages">Nombre de pages</label>
        <input type="number" name="bookPages" id="bookPages" value="<?= $book['npages']?>">
        <?php if(isset($_SESSION['errors']['updateBook']['pages'])):
                foreach ($_SESSION['errors']['updateBook']['pages'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookDate">Date de publication (JJ-MM-AAAA)</label>
        <input type="text" name="bookDate" id="bookDate" value="<?= $book['datepub']?>">
        <?php if(isset($_SESSION['errors']['updateBook']['date'])):
                foreach ($_SESSION['errors']['updateBook']['date'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookLanguage">Langue</label>
        <select name="bookLanguage" id="bookLanguage" required="required">
            <?php foreach ($datas['languages'] as $language):?>
            <option value="<?= $language['id'];?>" <?php if($language['id'] === $book['language_id']) echo 'selected="selected"'; ?>><?= ucfirst($language['name']) ;?></option>
            <?php endforeach; ?>
        </select>
        <?php if(isset($_SESSION['errors']['updateBook']['language'])):
                foreach ($_SESSION['errors']['updateBook']['language'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <label for="bookSummary">Synopsis</label>
        <textarea name="bookSummary" id="bookSummary" cols="30" rows="10"><?= $book['summary']?></textarea>
        <?php if(isset($_SESSION['errors']['updateBook']['summary'])):
                foreach ($_SESSION['errors']['updateBook']['summary'] as $errorName => $errorText):?>
        <span class="error <?= $errorName;?>"><?= $errorText;?></span>
        <?php endforeach; endif; ?>

        <input type="hidden" name="resource" value="Book">
        <input type="hidden" name="action" value="update">
        <input type="hidden" name="bookId" value="<?= $book['id']?>">
        <input type="hidden" name="authorBookId" value="<?= $book['author_book_id']?>">

        <button type="submit" name="button">Modifier le livre</button>
    </form>

    <a href="index.php?id=<?= $book['id']?>&resource=Book&action=getSingle">Revenir à la page du livre</a>

</article>
