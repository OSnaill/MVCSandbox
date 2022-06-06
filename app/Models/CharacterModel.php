<?php

namespace App\Models;

    class CharacterModel extends CoreModel
    {
        protected $table = "character";
        protected $nom;
        protected $description;

        /* METHODS */










        /* SETTER GETTER */

        /**
         * Get the value of table
         */
        public function getTable()
        {
                return $this->table;
        }

        /**
         * Get the value of nom
         */
        public function getNom()
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         */
        public function setNom($nom): self
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of descrition
         */
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description         */
        public function setDescription($description): self
        {
                $this->description= $description;

                return $this;
        }
    }