<?php
    class Categorie{
        private ?int $id_categorie;
        private ?string $categorie;

        public function __construct(?string $categorie){
            $this-> categorie = $categorie;
        }

                // ***GETTER***
        public function getIdcategorie():?int{
            return $this->id_categorie;
        }

        public function getCategorie():?string{
            return $this->categorie;
        }

                // ***SETTER***
        public function setIdcategorie(?int $id):void{
            $this->id_categorie = $id;
        }

        public function setCategorie(?string $categorie):void{
            $this->categorie = $categorie;
        }
    }
?>