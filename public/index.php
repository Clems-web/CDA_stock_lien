<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

use Cleme\CdaStockLien\Controller\HomeController;
use Cleme\CdaStockLien\Controller\UserController;
use Cleme\CdaStockLien\Controller\LinkController;






session_start();

if (isset($_GET['controller'])) {

    switch ($_GET['controller']) {

        case 'userConnect' :
            (new UserController())->userConnect();
            break;

        case 'userConnection' :
            (new UserController())->userConnexion();
            break;

        case 'userDisconnect' :
            (new UserController())->userDisconnect();
            break;

        case 'userRegister' :
            (new UserController())->userRegister();
            break;

        case 'userRegistration' :
            (new UserController())->userRegistration();
            break;

        case 'UserApp' :
            (new UserController())->UserApp();
            break;

        case 'userSupport' :
            (new UserController())->userSupport();
            break;

        case 'userSendSupport' :
            (new UserController())->userSendSupportMessage();
            break;

        case 'userStats' :
            (new UserController())->userStat();
            break;

        case 'addLink' :
            (new LinkController())->formAddLink();
            break;

        case 'userAddLink' :
            (new LinkController())->userAddLink();
            break;

        case 'updateLink' :
            (new LinkController())->userEditLink();
            break;

        case 'linkUpdate' :
            (new LinkController())->linkUpdate();
            break;

        case 'incrementeLink' :
            (new LinkController())->linkIncrement();
            break;

        case 'delLink' :
            (new LinkController())->userDelLink();
            break;
    }
}
else {
    (new HomeController())->homePage();
}


