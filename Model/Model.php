<?php
namespace Model;

class Model {
    protected function connectDB ()
    {
        $dsn = '';
        $db_config = ['username' => '', 'password' => ''];

        if(file_exists(INI_FILE)){
            $db_config = parse_ini_file(INI_FILE);
            $dsn = sprintf('%s:dbname=%s;host=%s', $db_config['driver'], $db_config['dbname'], $db_config['host']);
        }
        try {
            return new \PDO(
                $dsn,
                $db_config['username'],
                $db_config['password']
            );
        } catch(\PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function isUserConnected()
    {
        return isset($_SESSION['user']);
    }

    public function getAuthors() {
        try {
            $pdo = $this->connectDB();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdoSt = $pdo->prepare("SELECT id, name FROM authors");
            $pdoSt->execute();
            return $pdoSt->fetchAll();
        } catch(\PDOException $error) {
            echo $error; die;
        }
    }

    public function getGenres() {
        try {
            $pdo = $this->connectDB();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdoSt = $pdo->prepare("SELECT id, name FROM genres");
            $pdoSt->execute();
            return $pdoSt->fetchAll();
        } catch(\PDOException $error) {
            echo $error; die;
        }
    }

    public function getLanguages() {
        try {
            $pdo = $this->connectDB();
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $pdoSt = $pdo->prepare("SELECT id, name FROM languages");
            $pdoSt->execute();
            return $pdoSt->fetchAll();
        } catch(\PDOException $error) {
            echo $error; die;
        }
    }

    public function checkFields($fields) {
        foreach ($fields as $index => $field) {
            $fields[$index] = $field ? $field : null;
        }
        return $fields;
    }

    function validateDate($date, $format = 'd-m-Y') {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}
