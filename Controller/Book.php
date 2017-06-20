<?php
    namespace Controller;

    class Book {
        public function update() {
            $bookModel = new \Model\Book();
            $errors = [];

            $_SESSION['errors']['updateBook'] = [];
            $_SESSION['populate']['updateBook'] = $_POST;



            if(!(isset($_POST['bookTitle']) && isset($_POST['bookISBN']) && isset($_POST['bookAuthor']) && isset($_POST['bookGenre']) && isset($_POST['bookLanguage']) && isset($_POST['bookPages']) && isset($_POST['bookDate']) && isset($_POST['bookSummary']))) {
                $_SESSION['errors']['updateBook']['general']['not-set'] = 'Vous avez chipoté à n\'importe quoi.';
                header('Location: index.php?resource=Page&action=getAdmin');
            }

            if(!$bookModel->checkTitleLength($_POST['bookTitle'])) {
                $_SESSION['errors']['updateBook']['title']['too-big'] = 'Le titre du livre est trop grand.';

            }

            if(!strlen($_POST['bookTitle'])) {
                $_SESSION['errors']['updateBook']['title']['empty'] = 'Le titre du livre est vide.';
            }

            if(!$bookModel->authorExists($_POST['bookAuthor'])) {
                $_SESSION['errors']['updateBook']['author']['not-exists'] = 'L\'auteur que vous avez sélectionné n\'existe pas dans la base de données';
            }

            if(!$bookModel->genreExists($_POST['bookGenre'])) {
                $_SESSION['errors']['updateBook']['genre']['not-exists'] = 'Le genre que vous avez sélectionné n\'existe pas dans la base de données';
            }

            if(!$bookModel->languageExists($_POST['bookLanguage'])) {
                $_SESSION['errors']['updateBook']['language']['not-exists'] = 'La langue que vous avez sélectionné n\'existe pas dans la base de données';
            }

            if(!isset($_FILES['bookCover'])) {
                $file = null;
            } else {
                $file = $_FILES['bookCover'];
            }

            $isbn = $bookModel->formatISBN($_POST['bookISBN']);



            if(!$bookModel->checkISBN($isbn)) {
                $_SESSION['errors']['updateBook']['isbn']['wrong-format'] = 'L\'ISBN que vous avez entré n\'est pas au bon format.';
            }

            if($_POST['bookDate'] && !$bookModel->validateDate($_POST['bookDate'], 'Y-m-d')) {
                $_SESSION['errors']['updateBook']['date']['invalid'] = 'La date entrée est invalide.';
            }

            if($_POST['bookPages'] && !ctype_digit($_POST['bookPages'])) {
                $_SESSION['errors']['updateBook']['pages']['not-int'] = 'Le nombre de page n\'est pas un entier.';
            }

            if(count($_SESSION['errors']['updateBook'])) {
                header('Location: index.php?resource=Page&action=update&id=' . $_POST['bookId']);
                exit;
            }

            $fields = $bookModel->checkFields([$_POST['bookTitle'], $isbn, $_POST['bookAuthor'], $_POST['bookGenre'], $_POST['bookLanguage'], $_POST['bookPages'], $date, $_POST['bookSummary'], $file]);
            $bookModel->updateBook($fields[0], $fields[1], $fields[2], $fields[3], $fields[4], $fields[5], $fields[6], $fields[7], $fields[8], $_POST['bookId'], $_POST['authorBookId']);

            $_SESSION['message']['updateBook']['added'] = 'Le livre :title a bien été ajouté.';
            header('Location: index.php?resource=Book&action=getSingle&id=' . $_POST['bookId']);
            exit;
        }

        public function getSingle() {
            $bookModel = new \Model\Book();
            return ['views' => ['parts/singleBook.php'], 'book' => $bookModel->getBook($_GET['id'])];
        }

        public function search() {
            $bookModel = new \Model\Book();

            $_SESSION['bookResults'] = $bookModel->getResults($_GET['title']);

            return ['views' => ['parts/bookResults.php']];
        }

        public function advancedSearch() {
            $bookModel = new \Model\Book();

            $_SESSION['bookResults'] = $bookModel->getResults($_GET['title'], $_GET['author'], $_GET['genre'], $_GET['language']);

            return ['views' => ['parts/bookResults.php']];
        }

        public function add() {
            $bookModel = new \Model\Book();
            $errors = [];

            $_SESSION['errors']['addBook'] = [];
            $_SESSION['populate']['addBook'] = $_POST;



            if(!(isset($_POST['bookTitle']) && isset($_POST['bookISBN']) && isset($_POST['bookAuthor']) && isset($_POST['bookGenre']) && isset($_POST['bookLanguage']) && isset($_POST['bookPages']) && isset($_POST['bookDate']) && isset($_POST['bookSummary']))) {
                $_SESSION['errors']['addBook']['general']['not-set'] = 'Vous avez chipoté à n\'importe quoi.';
                header('Location: index.php?resource=Page&action=getAdmin');
            }

            if(!$bookModel->checkTitleLength($_POST['bookTitle'])) {
                $_SESSION['errors']['addBook']['title']['too-big'] = 'Le titre du livre est trop grand.';
            }

            if(!strlen($_POST['bookTitle'])) {
                $_SESSION['errors']['addBook']['title']['empty'] = 'Le titre du livre est vide.';
            }

            if(!$bookModel->authorExists($_POST['bookAuthor'])) {
                $_SESSION['errors']['addBook']['author']['not-exists'] = 'L\'auteur que vous avez sélectionné n\'existe pas dans la base de données';
            }

            if(!$bookModel->genreExists($_POST['bookGenre'])) {
                $_SESSION['errors']['addBook']['genre']['not-exists'] = 'Le genre que vous avez sélectionné n\'existe pas dans la base de données';
            }

            if(!$bookModel->languageExists($_POST['bookLanguage'])) {
                $_SESSION['errors']['addBook']['language']['not-exists'] = 'La langue que vous avez sélectionné n\'existe pas dans la base de données';
            }

            if(!isset($_FILES['bookCover'])) {
                $file = null;
            } else {
                $file = $_FILES['bookCover'];
            }

            $isbn = $bookModel->formatISBN($_POST['bookISBN']);

            if(!$bookModel->checkISBN($isbn)) {
                $_SESSION['errors']['addBook']['isbn']['wrong-format'] = 'L\'ISBN que vous avez entré n\'est pas au bon format.';
            }

            if($_POST['bookDate'] && !$bookModel->validateDate($_POST['bookDate'])) {
                $_SESSION['errors']['addBook']['date']['invalid'] = 'La date entrée est invalide.';
            } else if($_POST['bookDate']) {
                $date = explode('-', $_POST['bookDate']);
                $date = implode('-', [$date[2], $date[1], $date[0]]);
            }

            if($_POST['bookPages'] && !ctype_digit($_POST['bookPages'])) {
                $_SESSION['errors']['addBook']['pages']['not-int'] = 'Le nombre de page n\'est pas un entier.';
            }

            if(count($_SESSION['errors']['addBook'])) {
                header('Location: index.php?resource=Page&action=getAdmin');
                exit;
            }

            if($bookModel->checkBook($_POST['bookISBN'])) {
                $_SESSION['errors']['addBook']['general']['exists'] = 'Le livre :title existe déjà dans la base de données';
                header('Location: index.php?resource=Page&action=getAdmin');
                exit;
            } else {
                $fields = $bookModel->checkFields([$_POST['bookTitle'], $isbn, $_POST['bookAuthor'], $_POST['bookGenre'], $_POST['bookLanguage'], $_POST['bookPages'], $date, $_POST['bookSummary'], $file]);
                $bookModel->addBook($fields[0], $fields[1], $fields[2], $fields[3], $fields[4], $fields[5], $fields[6], $fields[7], $fields[8]);

                $_SESSION['message']['addBook']['added'] = 'Le livre :title a bien été ajouté.';
                header('Location: index.php?resource=Page&action=getAdmin');
                exit;
            }

        }

        public function delete() {
            $bookModel = new \Model\Book();
            if(isset($_SESSION['user']) && $_SESSION['user']['status'] == 0) {
                $bookModel->delete($_POST['id']);
            }
            header('Location: index.php');
            exit;
        }
    }
