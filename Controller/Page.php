<?php
namespace Controller;

class Page {
    public function update() {
        $model = new \Model\Model();
        $bookModel = new \Model\Book();
        $book = $bookModel->getBook($_GET['id']);
        if(isset($_SESSION['user']) && $_SESSION['user']['status'] == 0) {
            return ['views' => ['parts/updateSingleBook.php'], 'book' => $book, 'authors' => $model->getAuthors(), 'genres' => $model->getGenres(), 'languages' => $model->getLanguages()];
        }
        return ['views' => ['parts/singleBook.php'], 'book' => $book];
    }

    public function summary() {
        return ['views' => ['parts/basicSearch.php']];
    }

    public function getLogin() {
        return ['views' => ['parts/login.php']];
    }

    public function advancedSearch() {
        $model = new \Model\Model();
        return ['views' => ['parts/advancedSearch.php'], 'genres' => $model->getGenres(), 'languages' => $model->getLanguages()];
    }

    public function getAdmin() {
        if(!isset($_SESSION['user'])) {
            return ['error' => 'Vous n\'êtes pas connecté.'];
        }

        if(intval($_SESSION['user']['status']) !== 0) {
            return ['error' => 'Vous essayez d\'accéder à une page réservée aux administrateurs, mais vous n\'êtes pas administrateur.', 'views' => ['parts/error.php']];
        }
        $model = new \Model\Model();


        return ['views' => ['parts/admin.php', 'parts/addBook.php', 'parts/addAuthor.php'], 'authors' => $model->getAuthors(), 'genres' => $model->getGenres(), 'languages' => $model->getLanguages()];
    }
}
