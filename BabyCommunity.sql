CREATE DATABASE babyCommunity;

USE babyCommunity;

CREATE TABLE utilisateur
(
	id_util INT PRIMARY KEY auto_increment NOT NULL,
    nom_util VARCHAR(50) NOT NULL,
    prenom_util VARCHAR(50) NOT NULL,
    pseudo_util VARCHAR(50) NOT NULL,
    mail_util VARCHAR(50),
    mdp_util VARCHAR(100) NOT NULL,
    id_droit int NOT NULL DEFAULT 1,
    valide_util boolean NOT NULL DEFAULT 0,
    token_util VARCHAR(100) NULL
)engine=InnoDB;

CREATE TABLE droit (
	id_droit INT PRIMARY KEY auto_increment NOT NULL
)engine=InnoDB;

CREATE TABLE annonce (
	id_annonce INT PRIMARY KEY auto_increment NOT NULL,
    titre_annonce VARCHAR(50),
    contenu_annonce VARCHAR(100),
    taille VARCHAR(50),
    prix float,
    id_util INT,
)engine=InnoDB;

CREATE TABLE images (
    id_image INT PRIMARY KEY auto_increment NOT NULL,
    url_image VARCHAR(100),
    nom_image VARCHAR(50),
    id_annonce INT,
    id_util INT,
    CONSTRAINT fk_id_util FOREIGN KEY (id_util) REFERENCES utilisateur(id_util) ON DELETE CASCADE,
    CONSTRAINT fk_id_annonce FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce) ON DELETE CASCADE
)engine=InnoDB;

CREATE TABLE categorie (
    id_categorie INT PRIMARY KEY auto_increment NOT NULL,
    categorie VARCHAR(50)
)engine=InnoDB;

CREATE TABLE posseder (
	id_util INT,
    id_droit INT,
    PRIMARY KEY (id_droit, id_user)
)engine=InnoDB;

CREATE TABLE commentaire (
    commentaire text NOT NULL,
    id_util INT,
    id_annonce INT,
    CONSTRAINT fk_id_util FOREIGN KEY (id_util) REFERENCES utilisateur(id_util) ON DELETE SET NULL,
    CONSTRAINT fk_id_annonce FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce) ON DELETE SET NULL
)engine=InnoDB;

CREATE TABLE rattacher (
    id_categorie INT,
    id_annonce INT,
    CONSTRAINT fk_id_categorie FOREIGN KEY (id_categorie) REFERENCES categorie(id_categorie) ON DELETE SET NULL,
    CONSTRAINT fk_id_annonce FOREIGN KEY (id_annonce) REFERENCES annonce(id_annonce) ON DELETE SET NULL,
)engine=InnoDB;

CREATE TABLE ami (
    id_accepteur INT,
    id_demandeur INT,
    CONSTRAINT fk_id_demandeur FOREIGN KEY (id_demandeur) REFERENCES utilisateur(id_util) ON DELETE SET NULL,
    CONSTRAINT fk_id_accepteur FOREIGN KEY (id_accepteur) REFERENCES utilisateur(id_util) ON DELETE SET NULL
)engine=InnoDB;


ALTER TABLE utilisateur
add CONSTRAINT fk_posseder_droit
FOREIGN KEY (id_droit) references droit(id_droit)
ON DELETE CASCADE;

ALTER TABLE annonce
add CONSTRAINT fk_poster_annonce
FOREIGN KEY (id_util) references utilisateur(id_util)
ON DELETE CASCADE;


INSERT INTO categorie (id_categorie, categorie) values
(1, "Filles"), (2, "Garçons"), (3,"Jouets"),
(4, "Soins bébé"), (5, "Poussettes"), (6, "Trotteurs & vélos"),
(7, "Chaises hautes & Sièges auto"),
(8, "Mobilier enfant"), (9, "Scolarité"), (10, "Autres");