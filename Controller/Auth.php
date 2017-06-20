<?php
namespace Controller;

use \Model\Auth as modelAuth;
class Auth {
    public function postLogin() {
        $login = new modelAuth;
        $datas = ['views' => ['parts/basicSearch.php']];
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $datas['error'] = ['email' => 'Vous avez entré un email invalide.'];
            return $datas;
        }

        $user = $login->connectUser($_POST['email'], $_POST['password']);
        if(isset($user['error'])) {
            $datas['error'] = $user['error'];
            return $datas;
        }

        $_SESSION['user'] = $user;
        $datas['views'] = ['parts/basicSearch.php'];
        return $datas;
    }
    public function getLogout()
    {
       if(ini_get(‘session.use_cookies’)) {
           $params = session_get_cookie_params();
           setcookie(session_name(), ‘’, 1,
               $params[‘path’], $params[‘domain’],
               $params[‘secure’], $params[‘httponly’]
           );
       }
       session_destroy();
       header('Location: ' . './');
       exit;
    }

}
