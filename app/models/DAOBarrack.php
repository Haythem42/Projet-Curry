<?php

namespace app\models;

/**
 * Description of barrack
 *
 * @author Haythem
 */
class DAOBarrack {

    private $connexion;

    /**
     * Constructor of DAOBarrack
     */
    public function __construct($connexion) {

        $this->connexion = $connexion;
        
    }

    /**
     * Retrieve a barrack by id
     * 
     * @param int $numBarrack
     * @return Barrack
    */
    //? veut dire qu'il ne peut rien retourner (NULL)
    public function find($numBarrack): ?Barrack {
        
        $SQL = 'SELECT * FROM casernes WHERE NumCaserne = :numBarrack;';
        
        $prepareStatement = $this->connexion->prepare($SQL);
        $prepareStatement->bindParam("numBarrack", $numBarrack);
        $prepareStatement->execute();

        $data = $prepareStatement->fetch(\PDO::FETCH_OBJ);

        $barrack = new Barrack($data->NumCaserne, $data->Adresse, $data->CP, $data->Ville, $data->CodeTypeC);
        
        return $barrack;

    }

    /**
     * Save/insert a new barrack into Barrack DB
     * 
     * @param Barrack $barrack
     * @return int $linesAdded
    */
    public function save(Barrack $barrack): int {

        $SQL = 'INSERT INTO casernes VALUES (?, ?, ?, ?, ?)';
        
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(1,$barrack->getNumCaserne());
        $prepareStatement->bindValue(2,$barrack->getAdresse());
        $prepareStatement->bindValue(3,$barrack->getCP());
        $prepareStatement->bindValue(4,$barrack->getVille());
        $prepareStatement->bindValue(5,$barrack->getCodeTypeC());

        $prepareStatement->execute();

        $linesAdded = $prepareStatement->rowCount();

        return $linesAdded;

    }

    /**
     * Update data into barrack
     * 
     * @param Barrack $barrack
     * @return int $linesUpd
    */
    // Real function : public function update(Barrack $barrack): void
    public function update(Barrack $barrack): int {

        $SQL = 'UPDATE casernes SET Adresse = :adresse, CP = :cp, Ville = :ville, CodeTypeC = :codeTypeC WHERE NumCaserne = :num'; 
        
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(':adresse', $barrack->getAdresse(), \PDO::PARAM_STR);
        $prepareStatement->bindValue(':cp', $barrack->getCP(), \PDO::PARAM_STR);
        $prepareStatement->bindValue(':ville', $barrack->getVille(), \PDO::PARAM_STR);
        $prepareStatement->bindValue(':codeTypeC', $barrack->getCodeTypeC(), \PDO::PARAM_STR);
        $prepareStatement->bindValue(':num', $barrack->getNumCaserne(), \PDO::PARAM_INT);


        $prepareStatement->execute();

        $lignesUpd = $prepareStatement->rowCount();

        return $lignesUpd;

    }

    /**
     * Remove a barrack from barrack
     * 
     * @param Barrack $barrack
     * @return int $lignesRmv
    */
    public function remove($numCaserne): int {

        $SQL = 'DELETE FROM casernes WHERE NumCaserne = :numCaserne'; 
            
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(':numCaserne', $numCaserne, \PDO::PARAM_INT);

        $prepareStatement->execute();

        $lignesRmv = $prepareStatement->rowCount();

        return $lignesRmv;
    }

    /**
     * Find all barracks between $offset and $limit
     * 
     * @param int $offset
     * @param int $limit
     * @return array<Barrack>
     */
    public function findAllBarracks($limit, $offset): Array {

        $SQL = 'SELECT * FROM casernes LIMIT ' . $limit . ' OFFSET ' . $offset . ';';

        $prepareStatement = $this->connexion->prepare($SQL);
        $prepareStatement->execute();

        $barracks = array();

        while($data = $prepareStatement->fetch(\PDO::FETCH_OBJ)){
            
            $temp = new Barrack($data->NumCaserne,$data->Adresse, $data->CP, $data->Ville, $data->CodeTypeC);
            array_push($barracks, $temp);

        }
        
        return $barracks;

    }

    /**
     * Find all barracks
     * 
     * @return array<Barrack>
    */
    public function findAll() : Array {

        $requestSQL = "SELECT * FROM casernes";

        $preparedStatement = $this->connexion->prepare($requestSQL);

        $preparedStatement->execute();

        $barracks = array();

        while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

            $temp = new Barrack($data->NumCaserne, $data->Adresse, $data->CP, $data->Ville, $data->CodeTypeC);
            array_push($barracks, $temp);

        }

        return $barracks;

    }

    /**
     * Retrieve number of Barrack in DB
     * 
     * @return int $countBarrack
     */
    public function count(): int {

        $SQL = 'SELECT NumCaserne FROM casernes;'; 
            
        $prepareStatement = $this->connexion->prepare($SQL);
        $prepareStatement->execute();
        
        $countBarrack = 0;

        while($data = $prepareStatement->fetch()){
            
            $countBarrack = $countBarrack + 1;

        }

        return $countBarrack;

    }

    /**
     * Retrieve a fireman by the id the barrack
     * 
     * @return array $firemen
    */
    public function findFireMenFromBarrack(Barrack $barrack): array {
        
        $SQL = 'SELECT * FROM pompiers WHERE NumCaserne = :numCaserne';

        $prepareStatement = $this->connexion->prepare($SQL);
        $prepareStatement->bindValue("numCaserne", $barrack->getNumCaserne());
        $prepareStatement->execute();
        
        $firemen = array();

        while($data = $prepareStatement->fetch(\PDO::FETCH_OBJ)){
            
            $temp = new Fireman($data->Matricule, $data->Prenom, $data->Nom, $data->ChefAgret, $data->DateNaissance, $data->NumCaserne, $data->CodeGrade, $data->MatriculeResponsable);
            array_push($firemen, $temp);

        }

        return $firemen;

    }
    
}
