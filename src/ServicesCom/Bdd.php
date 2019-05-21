<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 15:27
 */
namespace App\ServicesCom;
use PDO,PDOException ;
class Bdd
{
    private static $connect = false;
    private static $bddInstance = null;

    public $error = false;
    public $errorMessage = '';
    public $connection = null;


    const DB_NAME = 'mydb';
    const PW = '';
    const HOST = 'localhost';
    const USER = 'root';

    /**
     * @return Bdd
     * get A uniqueue Bdd Instance
     */
    public static function getInstance()
    {
        if (empty(self::$bddInstance)) self::$bddInstance = new Bdd();

        if (self::$bddInstance->error)
            echo Bdd::getInstance()->errorMessage.'<hr>';

        return self::$bddInstance;
    }

    function __construct()
    {
        if (!self::$connect) $this->doConnection();
    }

    /**
     * connect to database using PDO (only for mysql driver ...)
     */
    private function doConnection()
    {

        try {

            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME , self::USER, self::PW);
            self::$connect = true;
        } catch (PDOException $e) {
            $this->error = true;
            $this->errorMessage = $e->getMessage();
        }

    }
}

