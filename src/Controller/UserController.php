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

}