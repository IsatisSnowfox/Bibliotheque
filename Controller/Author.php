<?php
    namespace Controller;

    class Author {
        public function add() {
            $authorModel = new \Model\Author();

            $_SESSION['errors']['addAuthor'] = [];
            $_SESSION['populate']['addAuthor'] = $_POST;

            if(!(isset($_POST['authorName']) && isset($_POST['authorBirthdate']) && isset($_POST['authorBiography']) && isset($_POST['authorDeathdate']))) {
                $_SESSION['errors']['addAuthor']['general']['not-set'] = 'Vous avez chipoté à n\'importe quoi.';
            }

            if(!$authorModel->checkNameLength($_POST['authorName'])) {
                $_SESSION['errors']['addAuthor']['name']['too-big'] = 'Le nom de l\'auteur est trop grand.';
            }

            if(!strlen($_POST['authorName'])) {
                $_SESSION['errors']['addAuthor']['name']['empty'] = 'Le nom de l\'auteur est vide.';
            }

            if($_POST['authorBirthdate'] && !$authorModel->validateDate($_POST['authorBirthdate'])) {
                $_SESSION['errors']['addAuthor']['birthdate']['invalid'] = 'La date de naissance entrée est invalide.';
            } else if($_POST['authorBirthdate']) {
                $birthdate = explode('-', $_POST['authorBirthdate']);
                $birthdate = implode('-', [$birthdate[2], $birthdate[1], $birthdate[0]]);
            }

            if($_POST['authorDeathdate'] && !$authorModel->validateDate($_POST['authorDeathdate'])) {
                $_SESSION['errors']['addAuthor']['deathdate']['invalid'] = 'La date de mort entrée est invalide.';
            } else if($_POST['authorDeathdate']) {
                $deathdate = explode('-', $_POST['authorDeathdate']);
                $deathdate = implode('-', [$deathdate[2], $deathdate[1], $deathdate[0]]);
            }

            if(count($_SESSION['errors']['addAuthor'])) {
                header('Location: index.php?resource=Page&action=getAdmin');
                exit;
            }


            if($authorModel->getAuthor($_POST['authorName'], $birthdate)) {
                $_SESSION['errors']['addAuthor']['general']['exists'] = 'L\'auteur :name existe déjà dans la base de données';
            } else {
                $fields = $authorModel->checkFields([$_POST['authorName'], $birthdate, null, $deathdate, $_POST['authorBiography']]);
                $authorModel->addAuthor($fields[0], $fields[1], $fields[2], $fields[3], $fields[4]);
                $_SESSION['message']['addAuthor']['added'] = 'L\'auteur :name a bien été ajouté.';
            }

            header('Location: index.php?resource=Page&action=getAdmin');
            exit;
        }
    }
