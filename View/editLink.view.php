<?php
use Cleme\CdaStockLien\Model\Manager\LinkManager;
use Cleme\CdaStockLien\Model\DB;

    if (isset($_GET['idLink'], $_SESSION['user'])) {
        $id = (new DB())->cleanInput($_GET['idLink']);

        $link = (new LinkManager())->getLinkById($id);

        $href = $link->getHref();
        $title = $link->getTitle();
        $name = $link->getName();


        echo "

            <div id='formLink'>
                <form action='?controller=linkUpdate' method='POST'>
                    <div>
                        <label for='link'>Lien</label>
                        <input type='text' name='link-href' id='link' value='" .$href. "'>
                    </div>
                    <div>
                        <label for='link-titre'>Titre</label>
                        <input type='text' name='link-title' id='link-titre' value='" .$title. "'>
                    </div>
                    <div>
                        <label for='link-cible'>Target</label>
            
                        <select name='link-target' id='link-cible'>
                            <option value='_blank'>_blank</option>
                            <option value='parent'>parent</option>
                            <option value='self'>self</option>
                            <option value='top'>top</option>
                        </select>
                    </div>
                    <div>
                        <label for='link-nom'>Nom</label>
                        <input type='text' name='link-name' id='link-nom' value='" .$name. "'>
                    </div>
                    <div>
                        <input type='hidden' name='link-id' value='".$id."'>
                    </div>
                    <div>
                        <button type='submit'>éditer</button>
                    </div>
                </form>
            </div>
    ";

    }
?>