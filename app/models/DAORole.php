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
     * Save/insert a new role into Role DB
     * 
     * @param Role $role
     * @return int $linesAdded
    */
    // Real function : public function save(Role $role): void
    public function save(Role $role): int {

        $SQL = 'INSERT INTO role (name, permissions)
                VALUES (?, ?)';
        
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(1, $role->getName());
        $prepareStatement->bindValue(2, $role->getPermissions());

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

        $SQL = 'UPDATE role 
                SET name = ?, 
                    permissions = ?
                WHERE id = ?'; 
        
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(1, $role->getName());
        $prepareStatement->bindValue(2, $role->getPermissions());
        $prepareStatement->bindValue(3, $role->getId());


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
        $SQL = 'DELETE FROM role 
                WHERE id = ?'; 
            
        $prepareStatement = $this->connexion->prepare($SQL);

        $prepareStatement->bindValue(1, $roleId);

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

        $roles = array();

        while ($data = $preparedStatement->fetch(\PDO::FETCH_OBJ)) {

            $temp = new Role(
                                $data->id, 
                                $data->name, 
                                $data->permissions
                            );
            array_push($roles, $temp);

        }

        return $roles;



}



    
}
