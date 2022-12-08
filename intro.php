<?php 
    interface Comics {
        public function integrer();
    }

    class Heros implements Comics {
        private $prenom;
        private $nom;
        private $identite;

        public function __construct($prenom, $nom, $identite){
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->identite = $identite;
        }
        public function integrer(){
            return "je suis un personnage Dc Comics";
        }
        
        public function presentation($nom, $prenom, $identite){
            var_dump("Bonjour moi c'est $this->prenom $this->nom et surtout pas $this->identite");
        }

        public function setIdentity($identite){
            $this->identite=$identite;
        }
        public function getIdentity(){
            return $this->identite;
        }
    }

class Acolyte extends Heros {
    public $acolyte;
    public function __construct($prenom, $nom, $identite, $acolyte){
        parent::__construct($prenom, $nom, $identite);
        $this->acolyte = $acolyte;
    }
    public function copain($identite, $prenom, $nom, $acolyte){
        var_dump("Bonjour moi c'est $this->identite, mais en vrai je m'appelle $this->prenom $this->nom et je suis l'acolyte de $this->acolyte");
    }
}

$hero1 = new Heros("Bruce", "Wayne", "Batman");

$hero2 = new Heros("Selina", "Kale", "Catwoman");

$hero1->presentation($prenom, $nom, $identite);
$hero2->setIdentity("un gros matou");
$hero2->presentation($prenom, $nom, $identite);

$copain = new Acolyte("Dick", "Grayson", "Robin", "Batman" );
$copain->copain($prenom, $nom, $identite, $acolyte);






?>