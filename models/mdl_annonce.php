<?php
    class Annonce{
        private ?int $id_annonce;
        private ?string $titre_annonce;
        private ?string $contenu_annonce;
        private ?string $taille_article;
        private ?string $prix_article;
        private ?int $id_util;

        public function __construct(?string $titre, ?string $contenu, ?string $taille, ?string $prix, ?int $util){
            $this-> titre_annonce = $titre;
            $this-> contenu_annonce = $contenu;
            $this-> taille_article = $taille;
            $this-> prix_article = $prix;
            $this-> id_util = $util;
        }

                // ***GETTER***
        public function getIdAnnonce():?int{
            return $this->id_annonce;
        }

        public function getTitreAnnonce():?string{
            return $this->titre_annonce;
        }

        public function getContenuAnnonce():?string{
            return $this->contenu_annonce;
        }

        public function getailleArticle():?string{
            return $this->taille_article;
        }

        public function getPrixArticle():?string{
            return $this->prix_article;
        }

        public function getIdUtil():?int{
            return $this->id_util;
        }


                // ***SETTER***
        public function setIdAnnonce(?int $id):void{
            $this->id_annonce = $id;
        }

        public function setTitreAnnonce(?string $titre):void{
            $this->titre_annonce = $titre;
        }

        public function setContenuAnnonce(?string $contenu):void{
            $this->contenu_annonce = $contenu;
        }

        public function setTailleArticle(?string $taille):void{
            $this->taille_article = $taille;
        }

        public function setPrixArticle(?string $prix):void{
            $this->prix_article = $prix;
        }
        
        public function setIdUtil(?int $util):void{
            $this->id_util = $util;
        }
    }