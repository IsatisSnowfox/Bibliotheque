<?php
    namespace Model;

    class Author extends Model {
        public function addAuthor($name, $birthDate, $photo = null, $deathDate = null, $biography = null) {

            try {
                $pdo = $this->connectDB();
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $pdoSt = $pdo->prepare('INSERT INTO authors(name, photo, datebirth, datedeath, bio) VALUES (:name, :photo, :birthDate, :deathDate, :biography);');
                $pdoSt->bindValue(':name', $name);
                $pdoSt->bindValue(':photo', $photo);
                $pdoSt->bindValue(':birthDate', $birthDate);
                $pdoSt->bindValue(':deathDate', $deathDate);
                $pdoSt->bindValue(':biography', $biography);
                $pdoSt->execute();
            } catch(\PDOException $error) {
                echo $error; die;
            }

            return $pdo->lastInsertId();
        }

        public function getAuthor($name, $birthDate) {

            try {
                $pdo = $this->connectDB();
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                $pdoSt = $pdo->prepare("SELECT * FROM authors WHERE name LIKE :name AND datebirth = :birthDate");
                $pdoSt->bindValue(':name', "%$name%");
                $pdoSt->bindValue(':birthDate', $birthDate);
                $pdoSt->execute();
                return $pdoSt->fetch();
            } catch(\PDOException $error) {
                echo $error; die;
            }
        }

        public function checkNameLength($name) {
            return strlen($name) <= 255;
        }

        
    }
