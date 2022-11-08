create database babyCommunity;
use babyCommunity;

create table utilisateur
(
	id_util int primary key auto_increment not null,
    nom_util varchar(50) not null,
    prenom_util varchar(50) not null,
    pseudo_util varchar(50) not null,
    mail_util varchar(50),
    mdp_util varchar(100) not null,
    id_droit int not null default 1,
    valide_util boolean not null default 0,
    token_util varchar(100) null
)engine=InnoDB;

create table droit (
	id_droit int primary key auto_increment not null
)engine=InnoDB;

create table annonce (
	id_annonce int primary key auto_increment not null,
    titre_annonce varchar(50),
    contenu_annonce varchar(100),
    taille varchar(50),
    prix varchar(50),
    id_utilisateur int
)engine=InnoDB;

create table images (
    id_image int primary key auto_increment not null,
    url_image varchar(100),
    id_annonce int,
    id_util int,
    constraint fk_id_util foreign key (id_util) REFERENCES utilisateur(id_util) on delete cascade,
    constraint fk_id_annonce foreign key (id_annonce) REFERENCES annonce(id_annonce) on delete cascade
)engine=InnoDB;

create table categorie (
    id_categorie int primary key auto_increment not null,
    categorie varchar(50)
)engine=InnoDB;

create table posseder (
	id_util int,
    id_droit int,
    primary key (id_droit, id_user)
)engine=InnoDB;

create table commentaire (
    commentaire text not null,
    id_util int,
    id_annonce int,
    constraint fk_id_util foreign key (id_util) REFERENCES utilisateur(id_util) on delete set null,
    constraint fk_id_annonce foreign key (id_annonce) REFERENCES annonce(id_annonce) on delete set null
)engine=InnoDB;

create table rattacher (
    id_categorie int,
    id_annonce int,
    constraint fk_id_categorie foreign key (id_categorie) REFERENCES categorie(id_categorie) on delete set null,
    constraint fk_id_annonce foreign key (id_annonce) REFERENCES annonce(id_annonce) on delete set null,
)engine=InnoDB;

create table ami (
    id_accepteur int,
    id_demandeur int,
    constraint fk_id_demandeur foreign key (id_demandeur) REFERENCES utilisateur(id_util) on delete set null,
    constraint fk_id_accepteur foreign key (id_accepteur) REFERENCES utilisateur(id_util) on delete set null
)engine=InnoDB;


alter table utilisateur
add constraint fk_posseder_droit
foreign key (id_droit) references droit(id_droit)
on delete cascade;

alter table annonce
add constraint fk_poster_annonce
foreign key (id_util) references utilisateur(id_util)
on delete cascade;


insert into categorie (id_categorie, categorie) values
(1, "Filles"), (2, "Garçons"), (3,"Jouets"),
(4, "Soins bébé"), (5, "Poussettes"), (6, "Trotteurs & vélos"),
(7, "Chaises hautes & Sièges auto"),
(8, "Mobilier enfant"), (9, "Scolarité"), (10, "Autres");