<div id="appContainer">

    <div id="navbar">

        <div>
            <i class="fas fa-plus-square"></i>
            <a href="?controller=addLink">Ajouter un lien</a>
        </div>

        <div>
            <a href="?controller=userDisconnect">Se déconnecter</a>
            <i class="fas fa-user-circle"></i>
        </div>

    </div>

    <div id="support">
        <a href="?controller=userSupport">Support</a>
        <a href="?controller=userStats">Stats</a>
    </div>


    <div id="linksContainer">
        <?php
            use Cleme\CdaStockLien\Model\Manager\LinkManager;
            $linkTab = (new LinkManager())->getLinksByUser($_SESSION['user']->getId());

            foreach ($linkTab as $link) {
                echo "<div class='square'>
                        <div class='linkImg'>
                        
                        </div>
                        
                        <div class='linkname'>
                            <a href='?controller=updateLink&idLink=".$link->getId()."'><i class='fas fa-pen'></i></a>
                            <a class='linkCountable' data-id='".$link->getId()."' href='".$link->getHref()."' target='".$link->getTarget()."'>".$link->getName()."</a>
                            <a href='?controller=delLink&idLink=".$link->getId()."'><i class='far fa-trash-alt'></i></a>
                        </div>
                    </div>";
            }
        ?>
    </div>



</div>


