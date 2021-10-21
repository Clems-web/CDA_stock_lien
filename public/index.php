<?php

use Cleme\CdaStockLien\Controller;
use Cleme\CdaStockLien\Controller\HomeController;
use Cleme\CdaStockLien\Controller\UserController;
use Cleme\CdaStockLien\Controller\LinkController;

require '..\vendor\autoload.php';




session_start();

if (isset($_GET['controller'])) {

    switch ($_GET['controller']) {

        case 'userConnect' :
            (new UserController())->userConnect();
            break;

        case 'userConnection' :
            (new UserController())->userConnexion();
            break;

        case 'UserApp' :
            (new UserController())->UserApp();
            break;

        case 'addLink' :
            (new LinkController())->formAddLink();
            break;

        case 'userAddLink' :
            (new LinkController())->userAddLink();
    }
}
else {
    (new HomeController())->homePage();
}


