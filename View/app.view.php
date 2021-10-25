<div id="appContainer">

    <div id="navbar">
        <div>
            <i class="fas fa-plus-square"></i>
            <a href="?controller=addLink">Ajouter un lien</a>
        </div>
        <i class="fas fa-user-circle"></i>
    </div>

    <div id="linksContainer">
        <?php
            use Cleme\CdaStockLien\Model\Manager\LinkManager;
            $linkTab = (new LinkManager())->getLinks();

            foreach ($linkTab as $link) {
                echo "<div class='square'>
                        <div class='linkImg'>
                        
                        </div>
                        
                        <div class='linkname'>
                            <a href='".$link->getHref()."' target='".$link->getTarget()."'>".$link->getName()."</a>
                            <a href='?controller=delLink&idLink=".$link->getId()."'><i class='far fa-trash-alt'></i></a>
                        </div>
                    </div>";
            }
        ?>
    </div>



</div>


