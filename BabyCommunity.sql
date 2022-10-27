create database babyCommunity;
use babyCommunity;

create table utilisateur
(
	id_util int primary key auto_increment not null,
    nom_util varchar(50),
    prenom_util varchar(50),
    mail_util varchar(50),
    mdp_util varchar(100) not null,
    id_droit int,
    id_annonce int
)engine=InnoDB;

create table droit
(
	id_droit int primary key auto_increment not null
)engine=InnoDB;

create table annonce
(
	id_annonce int primary key auto_increment not null,
    titre_annonce varchar(50),
    contenu_annonce varchar(100),
    prix_annonce varchar(50),
    photo_annonce blob
)engine=InnoDB;

create table localisation
(
id_adresse int primary key auto_increment not null,
nom_voie varchar(50),
code_postal varchar(10),
ville varchar(10)
)engine=InnoDb;

create table posseder
(
	id_util int,
    id_droit int,
    primary key (id_droit, id_user)
)engine=InnoDB;

create table se_localiser
(
	id_user int,
    id_adresse int,
    primary key(id_adresse, id_user)
)engine=InnoDB;

alter table utilisateurs
add constraint fk_poster_annonces
foreign key(id_annonce)
references annonces(id_annonce);

alter table se_localiser
add constraint fk_localiser_user
foreign key(id_user)
references utilisateurs(id_user);

alter table se_localiser
add constraint fk_localiser_localisation
foreign key(id_adresse)
references localisation (id_adresse);
