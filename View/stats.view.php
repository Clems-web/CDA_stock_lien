<?php

use Cleme\CdaStockLien\Model\Manager\LinkManager;

if ($_SESSION['user']) {
    $linkNumber = (new LinkManager())->getLinksByUser($_SESSION['user']->getId());
    $linkclick = (new LinkManager())->getNumberClick($_SESSION['user']->getId());
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
        </div>
    </div>

     ";
?>