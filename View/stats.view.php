<?php

use Cleme\CdaStockLien\Model\Manager\LinkManager;

if ($_SESSION['user']) {
    $linkNumber = (new LinkManager())->getLinksByUser($_SESSION['user']->getId());
    $linkclick = (new LinkManager())->getNumberClick($_SESSION['user']->getId());

    $tabHref = [];

    foreach ($linkNumber as $link) {
        $tabHref[] = $link->getHref();
    }

    $result = [];

    foreach ($tabHref as $qqch) {
        $result += (new LinkManager())->getUserFkByHref($qqch);
    }
}


echo "

    <div id='statContainer'>
        <div id='navbarStat'>
            <a href='index.php?controller=UserApp'>Accueil</a>
        </div>
    
        <div>
            <p>
                Nombre de liens présents : ". count($linkNumber) ."
            </p>
            <p>
                Nombre de click tout liens confondus : ".array_sum($linkclick)."
            </p>
            <p>
                Nombre d'utilisateurs avec qui vous avez un/des lien(s) en communs : ".(count($result) - 1)."
            </p>
        </div>
        <div>
            <canvas id='myChart' width='400' height='400'></canvas>
        </div>
    </div>

     ";
?>