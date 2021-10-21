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

            (new LinkManager())->addLink($href, $title, $target, $name);

            header('Location: ../index.php?controller=UserApp');
        }
    }

}