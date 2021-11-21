<?php

    namespace app\utils;


    class SingletonConfigReader {

        private $settings = [];

        /** @var SingletonConfigReader */
        private static $instance;


        /**
         * Constructor of the class which instanciates the settings propertie using the config.ini file
         */
        private function __construct () {

            $this->settings = parse_ini_file("../config.ini");

        }
        


        /**
         * Function which instanciates the instance propertie
         */
        public static function getInstance() {

            if (is_null(self::$instance)) {

                self::$instance = new SingletonConfigReader();
    
            }
    
            return self::$instance;

        }



        /**
         * Function which get the value of the key
         * 
         * @param string $key
         * 
         * @return string $this->settings[$key]
         */
        public function getValue($key) {

            return $this->settings[$key];

        }

    }

?>