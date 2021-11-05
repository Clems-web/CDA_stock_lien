<?php

namespace Cleme\CdaStockLien\Controller;

use Cleme\CdaStockLien\Model\DB;
use Cleme\CdaStockLien\Model\Manager\LinkManager;

class LinkController {

    use RenderView;

    public function formAddLink() {
        $this->render('addLink', 'Ajouter un lien');
    }

    public function userAddLink() {
        if (isset($_POST['link-href'], $_POST['link-title'], $_POST['link-target'], $_POST['link-name'])) {

            $href = (new DB())->cleanInput($_POST['link-href']);
            $title = (new DB())->cleanInput($_POST['link-title']);
            $target = (new DB())->cleanInput($_POST['link-target']);
            $name = (new DB())->cleanInput($_POST['link-name']);
            $user_fk = $_SESSION['user']->getId();

            (new LinkManager())->addLink($href, $title, $target, $name, $user_fk);

            header('Location: ../index.php?controller=UserApp');
        }
    }

    public function userDelLink() {
        if (isset($_GET['idLink'])) {

            $id = (new DB())->cleanInput($_GET['idLink']);

            (new LinkManager())->delLink($id);

            header('Location: ../index.php?controller=UserApp');
        }
    }

    public function userEditLink() {
        $this->render('editLink', 'Editer votre lien');
    }

    public function linkUpdate() {
        if (isset($_POST['link-id'],$_POST['link-href'], $_POST['link-title'], $_POST['link-target'], $_POST['link-name'], $_SESSION['user'])) {

            $id = (new DB())->cleanInput($_POST['link-id']);
            $href = (new DB())->cleanInput($_POST['link-href']);
            $title = (new DB())->cleanInput($_POST['link-title']);
            $target = (new DB())->cleanInput($_POST['link-target']);
            $name = (new DB())->cleanInput($_POST['link-name']);

            $link = (new LinkManager())->getLinkById($id)->getUserFk();

            if ($link == $_SESSION['user']->getId()) {
                (new LinkManager())->updateLink($id, $href, $title, $target, $name);
                header('Location: ../index.php?controller=UserApp');
            }
            

        }
    }

}