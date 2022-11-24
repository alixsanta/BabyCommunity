<?php
    class ManagerCategorie extends Categorie {

        public function createCategorie(object $bdd):void{
            try{
                $categorie = $this->getCategorie();

                $util = $this->getIdUtil();
                $req = $bdd->prepare('INSERT INTO categorie(titre_categorie, contenu_categorie, prix_article, taille_categorie, id_util) 
                VALUES(?, ?, ?, ?, ?);');
                $req->bindparam(1, $titre, PDO::PARAM_STR);
                $req->bindparam(2, $contenu, PDO::PARAM_STR);
                $req->bindparam(3, $taille, PDO::PARAM_STR);
                $req->bindparam(4, $prix, PDO::PARAM_STR);
                $req->bindparam(5, $util, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        // Afficher une categorie
        public function showCategorieById($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM categorie 
                WHERE id_categorie = :id_categorie');
                $req->execute(array(
                    'id_categorie' => $this->getIdcategorie(),
                    ));
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        // Afficher toutes les categories
        public function showAllcategories($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM categorie');
                $req->execute();
                // $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $req->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
        //fonction qui retourne la liste des categories
        public function getAllCategory($bdd):?array{
            try {
                //stocke et évalue la requête
                $req = $bdd->prepare("SELECT nom_categorie FROM 
                categorie");
                //exécute la requête
                $req->execute();
                //stocke dans $data le résultat de la requête (tableau associatif)
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                //retourner le tableau associatif
                return $data;
            } 
            catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
        // Modifier les categories
        public function updatecategorie($bdd):void{
            $nom = $this->getTitrecategorie();
            $prenom = $this->getContenucategorie();
            $mail = $this->getPrixcategorie();
            $mdp = $this->getPhotocategorie();
            $id = $this->getIdcategorie();
            try{
                $req = $bdd->prepare('UPDATE categorie
                                      SET titre_categorie = :titre_categorie, contenu_categorie = :contenu_categorie,
                                          prix_categorie = :prix_categorie, photo_categorie = :photo_categorie
                                      WHERE id_categorie = :id_categorie');
                $req->execute(array(
                    'titre_categorie' => $titre,
                    'contenu_categorie' =>$contenu,
                    'prix_article' =>$prix,
                    'photo_article' =>$photo,
                    'id_categorie' => $id
                    ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        //supprimer une categorie
        public function deletecategorie($bdd):void{
            try{
                $req = $bdd->prepare('DELETE FROM categorie 
                WHERE id_categorie = :id_categorie');
                $req->execute(array(
                    'id_categorie' => $this->getIdcategorie(),
                    ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>