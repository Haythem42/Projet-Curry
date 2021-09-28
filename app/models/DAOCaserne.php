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

        
        $SQL = 'SELECT * FROM barrack WHERE NumBarrack = :numBarrack;';
        
        $prepareStatement = $this->connection->prepare($SQL);
        $prepareStatement->bindParam("numBarrack", $numBarrack);
        $prepareStatement->execute();

        $barrack = $prepareStatement->fetchObject("Barrack", $ctor_args);
        return $barrack;

    }

    public function save(Barrack $barrack): void
    {
        $SQL = 'INSERT INTO  barrack VALUES ()'; 
        
        $prepareStatement = $this->connection->prepare($SQL);
    }

    /**
     * Update a data into barrack
    */
    public function update(Barrack $barrack): void
    {
        $SQL = 'UPDATE barrack SET '; 
        
        $prepareStatement = $this->connection->prepare($SQL);
        
    }

    public function remove(Barrack $barrack): void
    {
            $SQL = 'DELETE FROM barrack WHERE'; 
            
            $prepareStatement = $this->connection->prepare($SQL);
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array<Barrack>
     */
    public function findAll($offset = 0, $limit = 10): array
    {
            $SQL = 'SELECT * FROM barrack LIMIT ' .$limit. ';';

            $prepareStatement = $this->connection->prepare($SQL);
            $barracks = array();

            while($data = $prepareStatement->fetchObject("Barrack")){
                array_push($barracks, $data);
            }
            return $barracks;

            //autre méthode:
            // $barracks = [];
            // while($data = $prepareStatement->fetch(PDO::FETCH_ASSOC)){
            //     $barracks[] = $data;
            // }
            // return $barracks;
    }

    /**
     * Retrieve number of Barrack in DB
     * @return int
     */
    public function count(): int
    {
            $SQL = 'SELECT * FROM barracks;'; 
            
            $prepareStatement = $this->connection->prepare($SQL);

            $countBarrack = 0;

            while($data = $prepareStatement->fetch()){
                $countBarrack = $countBarrack + 1;
            }
            return $countBarrack;
    }

    public function findFireMenFromBarrack(Barrack $barrack): ?Barrack
    {
    }
}
