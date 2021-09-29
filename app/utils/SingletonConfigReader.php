<?php


    namespace app\utils;


    class SingletonConfigReader {

        private $settings = [];

        /** @var SingletonConfigReader */
        private static $instance;


        public function __construct () {

            $this->settings = require dirname(__FILE__).'../../../config.php';

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