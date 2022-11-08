<?php
    class ManagerAnnonce extends Annonce {

        public function createAnnonce(object $bdd):void{
            try{
                $titre = $this->getTitreAnnonce();
                $contenu = $this->getContenuAnnonce();
                $taille = $this->getTailleArticle();
                $prix = $this->getPrixArticle();
                // $util = $this->getIdUtil();
                $req = $bdd->prepare('INSERT INTO annonce(titre_annonce, contenu_annonce, prix_article, taille_annonce) 
                VALUES(?, ?, ?, ?);');
                $req->bindparam(1, $titre, PDO::PARAM_STR);
                $req->bindparam(2, $contenu, PDO::PARAM_STR);
                $req->bindparam(3, $taille, PDO::PARAM_STR);
                $req->bindparam(4, $prix, PDO::PARAM_STR);
                // $req->bindparam(5, $util, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        // Afficher une annonce
        public function showAnnonceById($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM annonce 
                WHERE id_annonce = :id_annonce');
                $req->execute(array(
                    'id_annonce' => $this->getIdAnnonce(),
                    ));
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        // Afficher toutes les annonces
        public function showAllAnnonces($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM annonce');
                $req->execute();
                // $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $req->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        // Modifier les annonces
        public function updateAnnonce($bdd):void{
            $nom = $this->getTitreAnnonce();
            $prenom = $this->getContenuAnnonce();
            $mail = $this->getPrixAnnonce();
            $mdp = $this->getPhotoAnnonce();
            $id = $this->getIdAnnonce();
            try{
                $req = $bdd->prepare('UPDATE annonce
                                      SET titre_annonce = :titre_annonce, contenu_annonce = :contenu_annonce,
                                          prix_annonce = :prix_annonce, photo_annonce = :photo_annonce
                                      WHERE id_annonce = :id_annonce');
                $req->execute(array(
                    'titre_annonce' => $titre,
                    'contenu_annonce' =>$contenu,
                    'prix_article' =>$prix,
                    'photo_article' =>$photo,
                    'id_annonce' => $id
                    ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        //supprimer une annonce
        public function deleteAnnonce($bdd):void{
            try{
                $req = $bdd->prepare('DELETE FROM annonce 
                WHERE id_annonce = :id_annonce');
                $req->execute(array(
                    'id_annonce' => $this->getIdAnnonce(),
                    ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>