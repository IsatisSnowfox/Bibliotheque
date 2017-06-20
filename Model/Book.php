<?php
    namespace Model;

    class Book extends Model {
        public function getResults($title = null, $author = null, $genre = null, $language = null) {

            $bindValues = [];
            $requestParts = ['books.title LIKE :title', 'authors.name LIKE :author', 'genres.id = :genre_id', 'languages.id = :language_id'];
            $possibleBindValues = [[':title' => "%$title%"], [':author' => "%$author%"], [':genre_id' => $genre], [':language_id' => $language]];
            $request = 'SELECT books.title AS title, authors.name as author, books.id AS id FROM books JOIN author_book ON books.id = author_book.book_id JOIN authors ON authors.id = author_book.author_id JOIN genres ON genres.id = books.genre_id JOIN languages ON languages.id = books.language_id';

            $hasArgs = false;

            foreach(func_get_args() as $argument) {
                if($argument) {
                    $hasArgs = true;
                    break;
                }
            }

            if($hasArgs) {
                $request .= ' WHERE';
            }

            $pdo = $this->connectDB();
            if($pdo) {
                foreach(func_get_args() as $index => $argument) {
                    if($argument) {
                        $request .= ' ' . $requestParts[$index] . ' AND';
                        $bindValues[array_keys($possibleBindValues[$index])[0]] = $possibleBindValues[$index][array_keys($possibleBindValues[$index])[0]];
                    }
                }

                if($hasArgs) {
                    $request = substr($request, 0, -4);
                }

                try {
                    $request = $pdo->prepare($request);
                    $request->execute($bindValues);
                } catch(\PDOException $error) {
                    var_dump($error); die;
                }
                return $request->fetchAll();
            }


        }

        public function checkBook($isbn) {

            try {
                $pdo = $this->connectDB();
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $pdoSt = $pdo->prepare('SELECT * FROM books WHERE isbn = :isbn');
                $pdoSt->bindValue(':isbn', $isbn);
                $pdoSt->execute();
                return $pdoSt->fetch();
            } catch(\PDOException $error) {
                echo $error; die;
            }
        }

        public function getBook($id) {
            $request = 'SELECT books.*, author_book.id AS author_book_id, authors.name AS author, authors.id AS author_id, genres.name AS genre, languages.name AS language FROM books JOIN author_book ON books.id = author_book.book_id JOIN authors ON authors.id = author_book.author_id JOIN genres ON genres.id = books.genre_id JOIN languages ON languages.id = books.language_id WHERE books.id = :id';

            $pdo = $this->connectDB();
            if($pdo) {
                try {
                    $request = $pdo->prepare($request);
                    $request->execute(['id' => $id]);
                } catch(\PDOException $error) {
                    var_dump($error); die;
                }
                return $request->fetch();
            }
        }

        public function addBook($title, $isbn, $author, $genre, $language, $pages, $date, $summary, $cover) {
            $pdo = $this->connectDB();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdoSt = $pdo->prepare('INSERT INTO books (title, front_cover, summary, isbn, npages, datepub, language_id, genre_id) VALUES (:title, :front_cover, :summary, :isbn, :npages, :datepub, :language_id, :genre_id)');
            $pdoSt->bindValue(':title', $title);
            $pdoSt->bindValue(':isbn', $isbn);
            $pdoSt->bindValue(':genre_id', $genre);
            $pdoSt->bindValue(':language_id', $language);
            $pdoSt->bindValue(':front_cover', $cover);
            $pdoSt->bindValue(':npages', $pages);
            $pdoSt->bindValue(':datepub', $date);
            $pdoSt->bindValue(':summary', $summary);

            try {
                $pdoSt->execute();
            } catch(\PDOException $error) {
                die($error->getMessage());
            }

            $pdoSt = $pdo->prepare('INSERT INTO author_book (book_id, author_id) VALUES (:book_id, :author_id)');
            $pdoSt->bindValue(':book_id', $pdo->lastInsertId());
            $pdoSt->bindValue(':author_id', $author);

            try {
                $pdoSt->execute();
            } catch(\PDOException $error) {
                die($error);
            }

             return $pdo->lastInsertId();
        }

        public function updateBook($title, $isbn, $author, $genre, $language, $pages, $date, $summary, $cover, $book_id, $author_book_id) {
            $pdo = $this->connectDB();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdoSt = $pdo->prepare('UPDATE books SET title = :title, front_cover = :front_cover, summary = :summary, isbn = :isbn, npages = :npages, datepub = :datepub, language_id = :language_id, genre_id = :genre_id WHERE id = :book_id;');
            $pdoSt->bindValue(':title', $title);
            $pdoSt->bindValue(':isbn', $isbn);
            $pdoSt->bindValue(':genre_id', $genre);
            $pdoSt->bindValue(':language_id', $language);
            $pdoSt->bindValue(':front_cover', $cover);
            $pdoSt->bindValue(':npages', $pages);
            $pdoSt->bindValue(':datepub', $date);
            $pdoSt->bindValue(':summary', $summary);
            $pdoSt->bindValue(':book_id', $book_id);

            try {
                $pdoSt->execute();
            } catch(\PDOException $error) {
                die($error->getMessage());
            }

            $pdoSt = $pdo->prepare('UPDATE author_book SET book_id = :book_id, author_id = :author_id WHERE author_book.id = :author_book_id;');
            $pdoSt->bindValue(':book_id', $book_id);
            $pdoSt->bindValue(':author_id', $author);
            $pdoSt->bindValue(':author_book_id', $author_book_id);

            try {
                $pdoSt->execute();
            } catch(\PDOException $error) {
                die($error);
            }

             return $pdo->lastInsertId();
        }

        public function formatISBN($isbn) {
            return preg_replace('/[^0-9]/', '',$isbn);
        }

        public function checkISBN($isbn) {
            return preg_match('/^(97(8|9))?\d{9}(\d|X)$/', $isbn);
        }

        public function checkTitleLength($title) {
            return strlen($title) <= 255;
        }

        public function authorExists($author_id) {
            $pdo = $this->connectDB();
            $pdoSt = $pdo->prepare('SELECT * FROM authors WHERE id = :id;');
            $pdoSt->bindValue(':id', $author_id);
            try {
                $pdoSt->execute();
            } catch(\PDOException $error) {
                die($error);
            }
            return !!$pdoSt->fetch();
        }

        public function genreExists($genre_id) {
            $pdo = $this->connectDB();
            $pdoSt = $pdo->prepare('SELECT * FROM genres WHERE id = :id;');
            $pdoSt->bindValue(':id', $genre_id);
            try {
                $pdoSt->execute();
            } catch(\PDOException $error) {
                die($error);
            }
            return !!$pdoSt->fetch();
        }

        public function languageExists($language_id) {
            $pdo = $this->connectDB();
            $pdoSt = $pdo->prepare('SELECT * FROM languages WHERE id = :id;');
            $pdoSt->bindValue(':id', $language_id);
            try {
                $pdoSt->execute();
            } catch(\PDOException $error) {
                die($error);
            }
            return !!$pdoSt->fetch();
        }

        public function delete($book_id) {
            $request = 'DELETE FROM author_book WHERE book_id = :book_id';

            $pdo = $this->connectDB();
            if($pdo) {
                try {
                    $request = $pdo->prepare($request);
                    $request->execute(['book_id' => $book_id]);
                } catch(\PDOException $error) {
                    var_dump($error); die;
                }

                $request = 'DELETE FROM books WHERE id = :book_id';
                try {
                    $request = $pdo->prepare($request);
                    $request->execute([':book_id' => $book_id]);
                } catch(\PDOException $error) {
                    var_dump($error); die;
                }
            }
        }
    }
