<?php

/**
 * Description of Role
 *
 * @author Haythem
 */

namespace app\models;

class DAORole
{
    private $connexion;

    /**
     * Constructor of DAORole
     */
    public function __construct($connexion)
    {

        $this->connexion = $connexion;
        
    }

    /**
     * Retrieve a role by id
     * 
     * @param string $roleId
     * @return id
    */
    //? veut dire qu'il ne peut rien retourner (NULL)
    public function find($roleId): ?Role
    {
        
        $SQL = 'SELECT * FROM role WHERE id = :id;';
        
        $prepareStatement = $this->connexion->prepare($SQL);
        $prepareStatement->bindParam("id", $roleId);
        $prepareStatement->execute();

        $data = $prepareStatement->fetch(\PDO::FETCH_OBJ);

        $id = new Role($data->id, $data->libelle);
        
        return $id;

    }

    /**
     * Save/insert a new role into Role DB
     * 
     * @param Role $role
     * @return int $linesAdded
    */
    // Real function : public function save(Role $role): void
    public function save(Role $role): int
    {

        $SQL = 'INSERT INTO role VALUES (:id, :libelle, :permissions)';
        
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(':id', $role->getId());
        $prepareStatement->bindValue(':libelle', $role->getLibelle());
        $prepareStatement->bindValue(':permissions', $role->getPermissions());

        $prepareStatement->execute();

        $linesAdded = $prepareStatement->rowCount();

        return $linesAdded;

    }

    /**
     * Update data into role
     * 
     * @param Role $role
     * @return int $linesUpd
    */
    // Real function : public function update(Role $role): void
    public function update(Role $role): int
    {

        $SQL = 'UPDATE role SET id = :id, libelle = :libelle, permissions = :permissions'; 
        
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(':id', $role->getId(), \PDO::PARAM_STR);
        $prepareStatement->bindValue(':libelle', $role->getLibelle(), \PDO::PARAM_STR);
        $prepareStatement->bindValue(':permissions', $role->getPermissions(), \PDO::PARAM_INT);


        $prepareStatement->execute();

        $lignesUpd = $prepareStatement->rowCount();

        return $lignesUpd;

    }

    /**
     * Remove a role from role
     * 
     * @param Role $role
     * @return int $lignesRmv
    */
    // Real function : public function remove(Role $role): void
    public function remove($roleId): int
    {
        $SQL = 'DELETE FROM role WHERE id = :id'; 
            
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(':id', $roleId, \PDO::PARAM_STR);

        $prepareStatement->execute();

        $lignesRmv = $prepareStatement->rowCount();

        return $lignesRmv;
    }


    /**
     * Find all roles
     * 
     * @return array<Role>
    */
    public function findAll() : Array {

        $requestSQL = "SELECT * FROM role";

        $preparedStatement = $this->connexion->prepare($requestSQL);

        $preparedStatement->execute();

        $role = array();

        while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

            $temp = new Role($data->id, $data->name, $data->permissions);
            array_push($role, $temp);

        }

        return $role;
}



    
}
