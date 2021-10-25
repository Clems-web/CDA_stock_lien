<?php

namespace Cleme\CdaStockLien\Model\Manager;

use Cleme\CdaStockLien\Model\DB;
use Cleme\CdaStockLien\Model\Entity\Link;

class LinkManager {

    public function getLinks() {
        $links = [];
        $request = DB::getInstance()->prepare("SELECT * FROM prefix_link");
        $result = $request->execute();

        if ($result) {

            $data = $request->fetchAll();

            foreach($data as $links_data) {
                $links[] = new Link(
                    $links_data['id'],
                    $links_data['href'],
                    $links_data['title'],
                    $links_data['target'],
                    $links_data['name']
                );
            }
        }
        return $links;
    }

    public function addLink($href, $title, $target, $name) {
        $request = DB::getInstance()->prepare("
        INSERT INTO prefix_link(href, title, target, name) VALUES (:href, :title, :target, :name)
        ");

        $request->bindValue(':href', $href);
        $request->bindValue(':title', $title);
        $request->bindValue(':target', $target);
        $request->bindValue(':name', $name);

        $request->execute();
    }

    public function delLink($id) {
        $request = DB::getInstance()->prepare("
        DELETE FROM prefix_link WHERE id = :id
        ");

        $request->bindParam(':id', $id);

        $request->execute();
    }


}