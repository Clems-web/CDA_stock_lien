<?php

namespace Cleme\CdaStockLien\Model\Manager;

use Cleme\CdaStockLien\Model\DB;
use Cleme\CdaStockLien\Model\Entity\User;


class UserManager {

    // User connect
    public function connectUser(string $mail, string $password){

        $user = "";

        $request = DB::getInstance()->prepare("SELECT * FROM prefix_user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);

        $result = $request->execute();
        if($result) {
            $user_data = $request->fetch();
            if($user_data) {
                if (password_verify($password, $user_data['pass'])) {
                    $user = new User(
                        $user_data['id'],
                        $user_data['nom'],
                        $user_data['prenom'],
                        $user_data['mail'],
                        $password
                    );
                }
            }
        }
        return $user;
    }
}