<?php
    class Images{
        private ?int $id_image;
        private ?string $url_image;
        private ?int $id_util;
        private ?int $id_annonce;

        public function __construct(?string $url_image, ?int $id_util, ?int $id_annonce){
            $this-> url_image = $url;
            $this-> id_util = $util;
            $this-> id_annonce = $annonce;
        }

                // ***GETTER***
        public function getIdImage():?int{
            return $this->id_image;
        }

        public function getUrlImage():?string{
            return $this->url_image;
        }

        public function getIdUtil():?int{
            return $this->id_util;
        }

        public function getIdAnnonce():?int{
            return $this->id_annonce;
        }


                // ***SETTER***
        public function setIdImage(?int $id):void{
            $this->id_image = $id;
        }

        public function setUrlImage(?string $url):void{
            $this->url_image = $url;
        }

        public function setIdUtil(?int $util):void{
            $this->id_util = $util;
        }

        public function setIdAnnonce(?int $annonce):void{
            $this->id_annonce = $annonce;
        }
    }