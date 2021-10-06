<?php


    namespace app\controllers;

    use app\models\DAOFireman;
    use app\utils\SingletonDBMaria;
    use app\utils\Renderer;


    
    class FiremanController extends BaseController {

        private DAOFireman $daoPompier;


        /**
         * Constructor of the class which initialiaze the DAO object.
         * 
         */
        public function __construct() {

            $this->daoPompier = new DAOFireman(SingletonDBMaria::getInstance()->getConnection());

        }



        /**
         * Function which shows the firemen corresponding to a specific page.
         * 
         * @param int $pageNumber
         */
        public function show($fragments = null) {
            var_dump($fragments);

            if (isset($fragments)) {

                $firemen = $this->daoPompier->findAllFiremen((intval($fragments)*10)-10,10);
                $pageFireman = Renderer::render('listFiremen.php', compact('firemen'));
                echo($pageFireman);

            } else {

                $firemen = $this->daoPompier->findAll();
                $pageFireman = Renderer::render('listFiremen.php', compact('firemen'));
                echo $pageFireman;

            }
            

        }



        public function insert() : void {
            //Filtrer les données et vérifier la validité
            //Se protéger contre les failles CSRF
            //Penser à la sécurité
            //Gérer PDO et erreurs
        }




        public function update() : void{
            //Récupérer les données
            //Filtrer les données et vérifier les données
            //Se protéger des failles CSRF
            //Penser à la sécurité
            //Gestion des erreurs PDO ou autre
        
        }

        public function delete() : void{
            //Filtrer les données et vérifier la validité
            //Message flash en cas d'erreur
            //Gestion des erreurs PDO
        }


        public function showDetail(string $id) {
            //Montrer des informations supplémentaires.
            
        }


    }




?>