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
                    $links_data['name'],
                    $links_data['user_fk'],
                    $links_data['clickNumber']
                );
            }
        }
        return $links;
    }

    public function getLinkById(int $id) {
        $request = DB::getInstance()->prepare("SELECT * FROM prefix_link WHERE id = :id");

        $request->bindValue(':id', $id);
        $result = $request->execute();

        if ($result) {
            $data = $request->fetch();

            if ($data) {
                $link = new Link(
                    $data['id'],
                    $data['href'],
                    $data['title'],
                    $data['target'],
                    $data['name'],
                    $data['user_fk'],
                    $data['clickNumber']
                );
                return $link;
            }
        }
    }

    public function getLinksByUser(int $id) {
        $links = [];
        $request = DB::getInstance()->prepare("SELECT * FROM prefix_link WHERE user_fk = :user_fk");

        $request->bindValue(':user_fk', $id);
        $result = $request->execute();

        if ($result) {

            $data = $request->fetchAll();

            foreach($data as $links_data) {
                $links[] = new Link(
                    $links_data['id'],
                    $links_data['href'],
                    $links_data['title'],
                    $links_data['target'],
                    $links_data['name'],
                    $links_data['user_fk'],
                    $links_data['clickNumber']
                );
            }
        }
        return $links;
    }

    public function addLink($href, $title, $target, $name, $user_fk, $clicknumber) {
        $request = DB::getInstance()->prepare("
        INSERT INTO prefix_link(href, title, target, name, user_fk, clickNumber) VALUES (:href, :title, :target, :name, :user_fk, :clickNumber)
        ");

        $request->bindValue(':href', $href);
        $request->bindValue(':title', $title);
        $request->bindValue(':target', $target);
        $request->bindValue(':name', $name);
        $request->bindValue(':user_fk', $user_fk);
        $request->bindValue(':clickNumber', $clicknumber);

        $request->execute();
    }

    public function updateLink($id, $href, $title, $target, $name) {
        $request = DB::getInstance()->prepare("
            UPDATE prefix_link SET href = :href, title = :title, target = :target, name = :name WHERE id = :id
        ");

        $request->bindValue(':href', $href);
        $request->bindValue(':title', $title);
        $request->bindValue(':target', $target);
        $request->bindValue(':name', $name);
        $request->bindValue(':id', $id);

        $request->execute();

    }

    public function incrementeLink($id) {
        $request = DB::getInstance()->prepare("
            UPDATE prefix_link SET clickNumber = (clickNumber + 1) WHERE id = :id
        ");

        $request->bindValue(':id', $id);
        $request->execute();
    }

    public function getNumberClick($id) {
        $request = DB::getInstance()->prepare("
            SELECT clickNumber FROM prefix_link WHERE user_fk = :id
        ");

        $request->bindValue(':id', $id);
        $result = $request->execute();

        if ($result) {

            $data = $request->fetchAll();

            foreach($data as $links_data) {
                $links[] = $links_data['clickNumber'];
            }

        }
        return $links;
    }

    public function delLink($id) {
        $request = DB::getInstance()->prepare("
        DELETE FROM prefix_link WHERE id = :id
        ");

        $request->bindParam(':id', $id);

        $request->execute();
    }


}