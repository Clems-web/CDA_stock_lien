<?php

namespace Cleme\CdaStockLien\Controller;

use Cleme\CdaStockLien\Model\DB;
use Cleme\CdaStockLien\Model\Entity\User;
use Cleme\CdaStockLien\Model\Manager\UserManager;

class UserController {

    use RenderView;


    public function userConnect() {
        $this->render('connexion', 'Se connecter');
    }

    public function UserApp() {
        $this->render('app', 'Accueil');
    }


    public function userConnexion() {

        if (isset($_POST['user-mail']) && isset($_POST['user-pass']))  {

            $manager = new UserManager();
            $db = new DB();

            $pass = $db->cleanInput($_POST['user-pass']);
            $mail = $db->cleanInput($_POST['user-mail']);

            $userConnected = $manager->connectUser($mail, $pass);
            if ($userConnected) {
                $_SESSION['user'] = $userConnected;
                header('Location: ../index.php?controller=UserApp');
            }

        }
    }

    public function userDisconnect() {
        session_start();
        $_SESSION = array();
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'],$params['HttpOnly']);
        session_destroy();

        header('Location: ../index.php?controller=userConnect');
    }

    public function userRegister() {
        $this->render('register', "S'inscrire");
    }

    public function userRegistration() {
        if(isset($_POST['user-name'], $_POST['user-surname'], $_POST['user-mail'], $_POST['user-pass'])) {
            $db = new DB();
            $user = new User(
                null,
                $db->cleanInput($_POST['user-name']),
                $db->cleanInput($_POST['user-surname']),
                $db->cleanInput($_POST['user-mail']),
                $db->cleanInput($_POST['user-pass']),
                3
            );

            (new UserManager())->registerUser($user);
            header('Location: ../index.php?controller=userConnect');
        }
    }

    public function userSupport() {
        $this->render('support', 'Support');
    }

    public function userSendSupportMessage() {
        if (isset($_POST['user-message'], $_SESSION['user'])) {

            $message = (new DB())->cleanInput($_POST['user-message']);

            $to = 'DumpMail@gmail.com';

            $subject = $_SESSION['user']->getPrenom()." ". $_SESSION['user']->getNom(). " 's request";

            // Set from headers
            $headers = 'From:'.$_SESSION['user']->getMail().'' . "\r\n";

            // Send our email
            mail($to, $subject, $message, $headers);
        }
        header('Location: ../index.php?controller=UserApp');
    }

    public function userStat() {
        $this->render('stats', 'Vos stats');
    }

}