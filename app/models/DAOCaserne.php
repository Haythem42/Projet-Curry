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

        try{
        $SQL = 'SELECT * FROM barrack WHERE NumBarrack = :numBarrack;';
        
        $prepareStatement = $this->connection->prepare($SQL);
        $prepareStatement->bindParam("numBarrack", $numBarrack);
        $prepareStatement->execute();

        $barrack = $prepareStatement->fetchObject("Barrack", $ctor_args);
        return $barrack;

        } catch (Exception $e){ // Deux exceptions à mettre dans le controller
            echo "<pre>".print_r($e, true)."</pre>";
        }
    }

    public function save(Barrack $barrack): void
    {
        try {
            
        $SQL = 'INSERT INTO  barrack VALUES ()'; 
        
        $prepareStatement = $this->connection->prepare($SQL);
        
        } catch (Exception $e){ // Deux exceptions à mettre dans le controller
            echo "<pre>".print_r($e, true)."</pre>";
        }
    }

    /**
     * Update a data into barrack
    */
    public function update(Barrack $barrack): void
    {
        try {
            
        $SQL = 'UPDATE barrack SET '; 
        
        $prepareStatement = $this->connection->prepare($SQL);
        

        } catch (Exception $e){ // Deux exceptions à mettre dans le controller
            echo "<pre>".print_r($e, true)."</pre>";
        }
    }

    public function remove(Barrack $barrack): void
    {
        try {
            
            $SQL = 'DELETE FROM barrack WHERE'; 
            
            $prepareStatement = $this->connection->prepare($SQL);
            
            } catch (Exception $e){ // Deux exceptions à mettre dans le controller
                echo "<pre>".print_r($e, true)."</pre>";
            }
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return array<Barrack>
     */
    public function findAll($offset = 0, $limit = 10): array
    {
        try{
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
        } catch (Exception $e){ // Deux exceptions à mettre dans le controller
            echo "<pre>".print_r($e, true)."</pre>";
        }
    }

    /**
     * Retrieve number of Barrack in DB
     * @return int
     */
    public function count(): int
    {
        try {
            
            $SQL = 'SELECT * FROM barracks;'; 
            
            $prepareStatement = $this->connection->prepare($SQL);

            $countBarrack = 0;

            while($data = $prepareStatement->fetch()){
                $countBarrack = $countBarrack + 1;
            }
            return $countBarrack;

            } catch (Exception $e){ // Deux exceptions à mettre dans le controller
                echo "<pre>".print_r($e, true)."</pre>";
            }
    }

    public function findFireMenFromBarrack(Barrack $barrack): ?Barrack
    {
    }
}
