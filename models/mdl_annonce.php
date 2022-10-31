<?php
    class Annonce{
        private ?int $id_annonce;
        private ?string $titre_annonce;
        private ?string $contenu_annonce;
        private ?string $prix_article;
        private ?string $photo_article;
        // private ?string $token_annonce;
        private ?int $id_util;

        public function __construct(?string $titre, ?string $contenu, ?string $prix, ?string $photo, ?int $util){
            $this-> titre_annonce = $titre;
            $this-> contenu_annonce = $contenu;
            $this-> prix_article = $prix;
            $this-> photo_article = $photo;
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

        public function getPrixArticle():?string{
            return $this->prix_article;
        }

        public function getPhotoArticle():?string{
            return $this->photo_article;
        }

        public function getTokenAnnonce():?string{
            return $this->token_annonce;
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

        public function setPrixArticle(?string $prix):void{
            $this->prix_article = $prix;
        }

        public function setPhotoArticle(?string $photo):void{
            $this->photo_article = $photo;
        }

        public function setTokenUtil(?string $token):void{
            $this->token_util = $token;
        }
        
        public function setIdUtil(?int $util):void{
            $this->id_util = $util;
        }
    }