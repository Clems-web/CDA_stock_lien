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

            if (($_POST['user-mail'] !== 'mail deleted') && ($_POST['user-pass'] !== 'password deleted')) {

                $pass = $db->cleanInput($_POST['user-pass']);
                $mail = $db->cleanInput($_POST['user-mail']);

                $userConnected = $manager->connectUser($mail, $pass);
                if ($userConnected) {
                    $_SESSION['user'] = $userConnected;
                    header('Location: ../index.php?controller=UserApp');
                }
            }
        }
    }

}