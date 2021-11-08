<?php

namespace Cleme\CdaStockLien\Model\Manager;

use Cleme\CdaStockLien\Model\DB;
use Cleme\CdaStockLien\Model\Entity\User;

session_start();
class UserManager {

    // User connect
    public function connectUser(string $mail, string $password){


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
                        $password,
                        $user_data['role_fk']
                    );
                    return $user;
                }
            }
        }
    }

    public function registerUser(User $user) {
        $request = DB::getInstance()->prepare("
            INSERT INTO prefix_user(id, nom, prenom, mail, pass, role_fk) VALUES (:id, :nom, :prenom, :mail, :pass, :role_fk)
        ");
        $request->bindValue(':id', $user->getId());
        $request->bindValue(':nom', $user->getNom());
        $request->bindValue(':prenom', $user->getPrenom());
        $request->bindValue(':mail', $user->getMail());
        $request->bindValue(':pass', password_hash($user->getPass(), PASSWORD_DEFAULT));
        $request->bindValue(':role_fk', 3);

        $request->execute();
    }
}