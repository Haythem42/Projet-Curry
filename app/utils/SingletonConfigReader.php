<?php


    namespace app\utils;


    class SingletonConfigReader {

        private $settings = [];

        /** @var SingletonConfigReader */
        private static $instance;


        private function __construct () {

            $this->settings = parse_ini_file("../config.ini");

        }
        

        public static function getInstance() {

            if (is_null(self::$instance)) {

                self::$instance = new SingletonConfigReader();
    
            }
    
            return self::$instance;

        }


        public function getValue($key) {

            return $this->settings[$key];

        }

    }


?>