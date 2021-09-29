<?php


namespace app\utils;


class SingletonDBMaria {

    public $cnx;

    /** @var SingletonDBMaria */
    private static $instance;

    private string $dsn;
    private string $username;
    private string $password;



    private function __construct() {

        $this->cnx = new \PDO(SingletonConfigReader::getInstance()->getValue('dsn'), SingletonConfigReader::getInstance()->getValue('user'), SingletonConfigReader::getInstance()->getValue('password'));
        $this->cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

    }



    public static function getInstance() : SingletonDBMaria {

        if (is_null(self::$instance)) {

            self::$instance = new SingletonDBMaria();

        }

        return self::$instance;

    }


    
    public function getConnection() {

        return $this->cnx;
    }



}


?>