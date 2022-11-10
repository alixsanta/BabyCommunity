<?php
    class ManagerImages extends Images {
        // Enregistrer une image
        public function addImage(object $bdd):void{
            try{
                $url = $this->getUrlImage();
                $util = $this->getIdUtil();
                $annonce = $this->getIdAnnonce();
                $req = $bdd->prepare('INSERT INTO images(url_image, id_util, id_annonce) 
                VALUES(?, ?, ?);');
                $req->bindparam(1, $url, PDO::PARAM_STR);
                $req->bindparam(2, $util, PDO::PARAM_INT);
                $req->bindparam(3, $annonce, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        // Afficher une image
        public function showImageById($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM images 
                WHERE id_image = :id_image');
                $req->execute(array(
                    'id_image' => $this->getIdImage(),
                    ));
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        // Afficher toutes les images
        public function showAllImages($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM images');
                $req->execute();
                // $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $req->fetchAll(PDO::FETCH_ASSOC);
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        //supprimer une image
        public function deleteImage($bdd):void{
            try{
                $req = $bdd->prepare('DELETE FROM images 
                WHERE id_image = :id_image');
                $req->execute(array(
                    'id_image' => $this->getIdImage(),
                    ));
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>