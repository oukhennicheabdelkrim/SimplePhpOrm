<?php
/**
 * Created by PhpStorm.
 * User: Kikim
 * Date: 21/05/2019
 * Time: 15:27
 */
namespace oukhennicheAbdelkrim\SimplePhpOrm\ServicesCom;
use PDO,PDOException ;
class Bdd
{
    private static $connect = false;
    private static $bddInstance = null;
    private static $config =[];

    public $error = false;
    public $errorMessage = '';
    public $connection = null;

    CONST CONFIG_PATH = 'Config/database.php';



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
        self::$config= require_once (self::CONFIG_PATH);
        if (!self::$connect) $this->doConnection();
    }

    /**
     * connect to database using PDO (for the moment only for mysql driver ...)
     */
    private function doConnection()
    {

        try {

            $this->connection = new PDO('mysql:host='.self::$config['DB_HOST'].';dbname='.self::$config['DB_NAME'] , self::$config['DB_USER'], self::$config['DB_PW']);
            self::$connect = true;
        } catch (PDOException $e) {
            $this->error = true;
            $this->errorMessage = $e->getMessage();
        }

    }
}

