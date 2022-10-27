<?php
    class Utilisateur{
        private ?int $id_util;
        private ?string $nom_util;
        private ?string $prenom_util;
        private ?string $mail_util;
        private ?string $mdp_util;
        private ?string $token_util;
        private ?int $id_droit;
        private ?int $id_annonce;
        private ?int $valide_util;

        public function __construct(?string $nom, ?string $prenom, ?string $mail, ?string $mdp){
            $this-> nom_util = $nom;
            $this-> prenom_util = $prenom;
            $this-> mail_util = $mail;
            $this-> mdp_util = $mdp;
            $this-> id_droit = 1;
            $this-> id_annonce = $annonce;
            $this-> valide_util = 0;
        }

        

                // ***GETTER***
        public function getIdUtil():?int{
            return $this->id_util;
        }

        public function getNomUtil():?string{
            return $this->nom_util;
        }

        public function getPrenomUtil():?string{
            return $this->prenom_util;
        }

        public function getMailUtil():?string{
            return $this->mail_util;
        }


        public function getMdpUtil():?string{
            return $this->mdp_util;
        }

        public function getTokenUtil():?string{
            return $this->token_util;
        }


        public function getValideUtil():?int{
            return $this->valide_util;
        }


        public function getIdRole():?int{
            return $this->id_role;
        }


        public function getIdAnnonce():?int{
            return $this->id_annonce;
        }
        



                // ***SETTER***
        public function setIdUtil(?int $id):void{
            $this->id_util = $id;
        }

        public function setNomUtil(?string $nom):void{
            $this->nom_util = $nom;
        }

        public function setPrenomUtil(?string $prenom):void{
            $this->prenom_util = $prenom;
        }

        public function setMailUtil(?string $mail):void{
            $this->mail_util = $mail;
        }

        public function setMdpUtil(?string $mdp):void{
            $this->mdp_util = $mdp;
        }

        public function setIdRole(?int $id_droit):void{
            $this->id_droit = $id_droit;
        }

        public function setIdAnnonce(?int $id_annonce):void{
            $this->id_annonce = $id_annonce;
        }

        public function setValideUtil(?int $valide):void{
            $this->valide_util = $valide;
        }

        public function setTokenUtil(?string $token):void{
            $this->token_util = $token;
        }
        
    }
?>