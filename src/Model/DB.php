<?php

namespace Cleme\CdaStockLien\Model;

use PDO;
use PDOException;

class DB {

    private static $dbInstance = null;

    /**
     * DB constructor.
     */
    public function __construct(){
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'links';

        try {
            self::$dbInstance = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $user, $password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch(PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    /**
     * Return only one PDO instance through the whole project.
     * @return PDO|null (instance) PDO|null
     */
    public static function getInstance(): ?PDO {
        if(null === self::$dbInstance) {
            new self();
        }
        return self::$dbInstance;
    }

    /**
     * Protection against code injection
     * @param $string
     * @return string
     */
    public function cleanInput($string) {
        $string = strip_tags($string);
        $string = addslashes($string);
        return trim($string);
    }

    /**
     * Prevent other developers to clone object
     */
    public function __clone(){}

}
