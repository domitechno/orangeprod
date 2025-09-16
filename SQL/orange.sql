drop database if exists orange; 
create database orange; 

use orange;

/******************************* USERS ********************************/

create table user (
	iduser int(3) not null auto_increment,
	nom varchar(50),
	prenom varchar(50),
	email varchar(50),
	tel varchar(15),
	mdp varchar(50),
	role enum ("technicien", "client"),
	primary key (iduser)
);

insert into user values
	(null, "BECKAM", "David", "david@gmail.com", "0123456789", "123", "technicien");



/******************************* PRODUITS ********************************/

create table produit (
	idproduit int(3) not null auto_increment,
	designation varchar(50),
	prix float(10, 2),
	fabricant varchar(50),
	datesortie date,
	description varchar(500),
	primary key (idproduit)
);

insert into produit values
	(null, "Iphone14", "1300", "Apple", "16-09-2022", "Smartphone haut de gamme"),
	(null, "TV 4k", "2500", "Sony", "03-02-2021", "Télévision 4k 75pouces"),
	(null, "Ordinateur de bureau XPS", "1299.99", "Dell", "23-04-2023", "Ordinateur de bureau puissant. Utilisation design et gaming possible"),
	(null, "Internet Haut Débit", "59.99", "Orange", "30-04-2019", "Abonnement mensuel à la fibre orange. Haut débit jusqu'à 500Mo/s");

/******************************* MES PRODUITS ********************************/

create table mesproduit (
	idmesproduit int(3) not null auto_increment,
	idproduit int(3) not null,
	iduser int(3) not null,
	primary key (idmesproduit)
);

/******************************* INTERVENTIONS ********************************/

create table intervention (
	idintervention int(3) not null auto_increment,
	idtechnicien int(3) not null,
	idclient int(3) not null,
	idproduit int(3) not null,
	datedemande date,
	dateintervention date,
	description varchar(500),
	primary key(idintervention)
);