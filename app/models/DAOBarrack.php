<?php

/**
 * Description of barrack
 *
 * @author Haythem
 */

namespace app\models;

class DAOBarrack
{
    /**
     * Constructor of DAOBarrack
     */
    public function __contrusct($connexion)
    {
        $this->connexion = $connexion;
    }

    /**
     * Retrieve a barrack by id
     * 
     * @param int $numBarrack
     * @return Barrack
    */
    //? veut dire qu'il ne peut rien retourner (NULL)
    public function find($numBarrack): ?Barrack
    {
        
        $SQL = 'SELECT * FROM casernes WHERE NumCaserne = :numBarrack;';
        
        $prepareStatement = $this->connection->prepare($SQL);
        $prepareStatement->bindParam("numBarrack", $numBarrack);
        $prepareStatement->execute();

        $barrack = $prepareStatement->fetchObject("Barrack", $ctor_args);
        return $barrack;

    }

    /**
     * Save/insert a new barrack into Barrack DB
     * 
     * @param Barrack $barrack
     * @return string $message
    */
    // Real function : public function save(Barrack $barrack): void
    public function save(Barrack $barrack): string
    {
        $SQL = 'INSERT INTO casernes VALUES (?, :adresse, :cp, :ville, ?)';
        
        $prepareStatement = $this->connection->prepare($SQL);

        $prepareStatement->bindValue(1, $barrack->getNumCaserne(), PDO::PARAM_INT);
        $prepareStatement->bindValue(':adresse', $barrack->getAdresse(), PDO::PARAM_STR);
        $prepareStatement->bindValue(':cp', $barrack->getCP(), PDO::PARAM_STR);
        $prepareStatement->bindValue(':ville', $barrack->getVille(), PDO::PARAM_STR);
        $prepareStatement->bindValue(5, $barrack->getCodeTypeC(), PDO::PARAM_STR);

        // $prepareStatement->execute();

        // Report if the insertion worked
        $executeIsOk = $prepareStatement->execute();
        if($executeIsOk) {
            $message = 'La DB a été ajouté';
        } else {
            $message = 'Echec de l/ajout';
        }

        return $message;
    }

    /**
     * Update data into barrack
     * 
     * @param Barrack $barrack
     * @return string $message
    */
    // Real function : public function update(Barrack $barrack): void
    public function update(Barrack $barrack): string
    {
        $SQL = 'UPDATE casernes SET NumCaserne = :numCaserne, Adresse = :adresse, CP = :cp, Ville = :ville, CodeTypeC = :codeTypeC'; 
        
        $prepareStatement = $this->connection->prepare($SQL);

        $prepareStatement->bindValue(':numCaserne', $barrack->getNumCaserne(), PDO::PARAM_INT);
        $prepareStatement->bindValue(':adresse', $barrack->getAdresse(), PDO::PARAM_STR);
        $prepareStatement->bindValue(':cp', $barrack->getCP(), PDO::PARAM_STR);
        $prepareStatement->bindValue(':ville', $barrack->getVille(), PDO::PARAM_STR);
        $prepareStatement->bindValue(':codeTypeC', $barrack->getCodeTypeC(), PDO::PARAM_STR);

        // $prepareStatement->execute();

        // Report if the insertion worked
        $executeIsOk = $prepareStatement->execute();
        if($executeIsOk) {
            $message = 'La DB a été mis à jour';
        } else {
            $message = 'Echec de la mise à jour';
        }

        return $message;
    }

    /**
     * Remove a barrack from barrack
     * 
     * @param Barrack $barrack
     * @return string $message
    */
    // Real function : public function remove(Barrack $barrack): void
    public function remove(Barrack $barrack): string
    {
        $SQL = 'DELETE FROM casernes WHERE NumCaserne = :numCaserne'; 
            
        $prepareStatement = $this->connection->prepare($SQL);

        $prepareStatement->bindValue(':numCaserne', $barrack->getNumCaserne(), PDO::PARAM_INT);

        // $prepareStatement->execute();

        // Report if the insertion worked
        $executeIsOk = $prepareStatement->execute();
        if($executeIsOk) {
            $message = 'La caserne a été supprimée';
        } else {
            $message = 'Echec de la suppression';
        }

        return $message;
    }

    /**
     * Find all barracks between $offset and $limit
     * 
     * @param int $offset
     * @param int $limit
     * @return array<Barrack>
     */
    public function findAll($offset = 0, $limit = 10): array
    {
            $SQL = 'SELECT * FROM casernes LIMIT ' . $limit . ' OFFSET ' . $offset . ';';

            $prepareStatement = $this->connection->prepare($SQL);
            $barracks = array();

            while($data = $prepareStatement->fetchObject("Barrack")){
                array_push($barracks, $data);
            }
            return $barracks;

            // Other way:
            // $barracks = [];
            // while($data = $prepareStatement->fetch(PDO::FETCH_ASSOC)){
            //     $barracks[] = $data;
            // }
            // return $barracks;
    }

    /**
     * Retrieve number of Barrack in DB
     * 
     * @return int $countBarrack
     */
    public function count(): int
    {
            $SQL = 'SELECT COUNT(NumCaserne) FROM casernes;'; 
            
            $prepareStatement = $this->connection->prepare($SQL);

            $countBarrack = 0;

            while($data = $prepareStatement->fetch()){
                $countBarrack = $countBarrack + 1;
            }
            return $countBarrack;
    }

    /**
     * Retrieve a fireman by the id the barrack
     * 
     * @return string $matricule
    */
    public function findFireMenFromBarrack(Barrack $barrack): ?Barrack
    {
        $SQL = 'SELECT Matricule FROM casernes WHERE NumCaserne = :numCaserne';

        $prepareStatement = $this->connection->prepare($SQL);
        $prepareStatement->bindParam("numCaserne", $barrack->getNumCaserne());
        $prepareStatement->execute();

        $fireman = $prepareStatement->fetchObject("Fireman", $__construct);
        return $fireman;
    }
    
}
