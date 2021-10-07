<?php


    namespace app\utils;


    class SingletonDBMaria {

        public $cnx;

        /** @var SingletonDBMaria */
        private static $instance;

        private string $dsn;
        private string $username;
        private string $password;


        /**
         * Constructor of the class which instanciate the cnx propertie of the singleton
         */
        private function __construct() {

            $this->cnx = new \PDO(SingletonConfigReader::getInstance()->getValue('dsn'), SingletonConfigReader::getInstance()->getValue('user'), SingletonConfigReader::getInstance()->getValue('password'));
            $this->cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        }



        /**
         * Function which instanciate the instance propertie
         */
        public static function getInstance() : SingletonDBMaria {

            if (is_null(self::$instance)) {

                self::$instance = new SingletonDBMaria();

            }

            return self::$instance;

        }

        
        
        /**
         * Function which get the cnx properti of the singleton
         */
        public function getConnection() {

            return $this->cnx;

        }

    }

?>