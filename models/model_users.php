<?php 
    class Utilisateur {
        /* ------------------------------ ATTRIBUTS ------------------------------ */
        
        private $id_util;
        private $nom_util;
        private $mail_util;
        private $mdp_util;


        /* ------------------------------ CONSTRUCTEUR ------------------------------ */
        
        public function __construct($name, $email, $password){
            $this->name_util = $name;
            $this->first_name_util = $first;
            $this->mail_util = $mail;
            $this->pwd_util = $password;
        }


        /* ------------------------------ GETTERS & SETTERS ------------------------------ */
        
        public function getIdUtil(): int{
            return $this->id_util;
        }
        public function getNameUtil(): string{
            return $this->nom_util;
        }
        public function getMailUtil(): string{
            return $this->mail_util;
        }
        public function getPwdUtil(): string{
            return $this->mdp_util;
        }

        public function setIdUtil($id): void{
            $this->id_util = $id;
        }
        public function setNameUtil($nom): void{
            $this->nom_util = $nom;
        }
        public function setMailUtil($mail): void{
            $this->mail_util = $id;
        }
        public function setPwdUtil($password): void{
            $this->mdp_util = $password;
        }

        
        /* ------------------------------ METHODES ------------------------------ */  


        //création d'un utilisateur en BDD (utilisateur)
        public function createUser($bdd): void{
            //récupérer les valeurs de l'objet
            $nom = $this->getNameUtil();
            $mail = $this->getMailUtil();
            $password = $this->getPwdUtil();
            
            try {
                $req = $bdd -> prepare('INSERT INTO utilisateur(nom_util, mail_util, mdp_util)
                                        VALUES (:nom_util, :mail_util, :mdp_util)');
                $req -> execute (array(
                    'nom_util' => $nom,
                    'mail_util' => $mail,
                    'mdp_util' => $password,
                    ));
            }
            catch(Exception $e){
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }



        //récupérer l'utilisateur par son (mail_util) si existe en BDD (utilisateur)
        public function showUserByMail($bdd): array{
            try {
                $req = $bdd -> prepare(
                    'SELECT * FROM utilisateur 
                     WHERE mail_util = :mail_util');

                $req -> execute(array('mail_util' => $this->getMailUtil(),));

                $data = $req -> fetchAll(PDO::FETCH_ASSOC);

                return $data;
            }
            catch(Exception $e){
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>