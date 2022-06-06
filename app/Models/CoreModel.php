<?php

namespace App\Models;

use App\utils\Database;
use PDO;

    class CoreModel
    {
        protected $id;
        

        public function findAll(){

            $pdo = Database::getPDO();

            $table_name = $this->getTable();


            $sql="SELECT * FROM `$table_name`";

            $pdoStatement = $pdo->query($sql);

            return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
            
        }

        public function insert(){
            $pdo = Database::getPDO();
            
            $sql="
            INSERT INTO `character` (nom, description)
            VALUES (:nom, :description)
            ";

            $query = $pdo->prepare($sql);

            $success = $query->execute([
                ':nom' => $this->nom,
                ':description' => $this->description,
            ]);

            if($success){
                $this->id = $pdo->lastInsertId();

                return true;
            }
        }

        /**
         * Get the value of id
         */
        public function getId()
        {
                return $this->id;
        }

    }