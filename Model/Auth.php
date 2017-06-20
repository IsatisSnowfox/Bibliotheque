<?php
namespace Model;

class Auth extends Model {
    private function getUser($email, $password)
    {
        $pdo = $this->connectDB();
        $pdoSt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
        $pdoSt->bindValue(':email', $email);
        $pdoSt->execute();
        return $pdoSt->fetch();
    }

    private function checkUsername($user)
    {
        return !!$user;
    }

    private function checkPassword($db_password, $password) {
        return $password == $db_password;
    }

    public function connectUser($email, $password)
    {
        $password = hash('sha256', $password);
        $user = $this->getUser($email, $password);

        if(!$this->checkUsername($user)) {
            return ['error' => ['email' => 'Votre email est incorrecte.']];
        }

        if(!$this->checkPassword($user['password'], $password)) {
            return ['error' => ['password' => 'Votre mot de passe est incorrect.']];
        }

        return $user;
    }
}
