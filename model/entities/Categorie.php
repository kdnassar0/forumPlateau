<?php
    namespace Model\Entities;

    use App\Entity;

    final class Categorie extends Entity{

        // Chaque Entity va hériter de la classe Entity (dans le dossier App) et toutes les Entities auront exactement le même constructeur qui implémente la méthode "hydrate"

        private $id;
        private $nomCategorie;
     
        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;
        }

        /**
         * Get the value of nomCategorie
         */ 
        public function getNomCategorie()
        {
                return $this->nomCategorie;
        }

        /**
         * Set the value of nomCategorie
         *
         * @return  self
         */ 
        public function setNomCategorie($nomCategorie)
        {
                $this->nomCategorie = $nomCategorie;


        }

        public function __toString()
        {
            return $this->nomCategorie ;
        }
    }