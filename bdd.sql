drop table if exists produit cascade;
drop table if exists boisson cascade;
drop table if exists goodies cascade;
drop table if exists typeboisson cascade;
drop table if exists event cascade;
drop table if exists utiliser cascade;
drop table if exists alimentaire cascade;
drop table if exists typealim cascade;
drop table if exists stock cascade;
drop table if exists users cascade;
drop table if exists typestock cascade;


create table users (
	iduser serial primary key,
	admin boolean default false,
	mail character varying(64),
	nom character varying(64) NOT NULL,
	prenom character varying(64),
	age numeric(3,0),
	rue character varying(64),
	codepostale numeric(5),
	ville character varying(64),
	telephone numeric(10),
	password character varying(150),
	cookieuser character varying(150),
	sexe character varying(32),
	CONSTRAINT dom_age CHECK (age >= 0::numeric AND age <= 120::numeric)
);

create table typestock (
	idtype serial primary key,
	nomtype character varying(64)
);

create table stock (
	idstock serial primary key,
	iduser integer,
	typestock integer,
	nomstock varchar(64),
	constraint stock_fk foreign key (iduser) references users(iduser),
	constraint typestock_fk foreign key (typestock) references typestock(idtype)	
);

create table event (
	idevent serial primary key,
	iduser integer,
	nomevent character varying(64),
	dateevenement date,
	evenementactif boolean default false,
	prixtotal integer,
	constraint stock_fk foreign key (iduser) references users(iduser)
);



create table produit (
	idproduit serial primary key,
	idstock integer,
	iduser integer,
	nomproduit character varying(64),
	prixproduit real,
	qtestock integer,
	constraint produit_stock_fk foreign key (idstock) references stock(idstock),
	constraint produit_user_fk foreign key (iduser) references users(iduser)
);

create table typealim (
	idtype serial primary key,
	nomtype character varying(64)
);

create table alimentaire (
	idalim integer,
	idstock integer,
	iduser integer,
	typealim integer,
	referencealim integer,
	constraint alim_pk primary key (idalim,idstock,iduser),
	constraint alim_fk foreign key (idalim) references produit(idproduit),
	constraint alim_user_fk foreign key (iduser) references users(iduser),
	constraint alil_stock_fk foreign key (idstock) references stock(idstock),
	constraint typealim_fk foreign key (typealim) references typealim(idtype)
);

create table typeboisson (
	idtype serial primary key,
	nomtype character varying(64)
);

create table boisson (
	idboisson integer,
	idstock integer,
	iduser integer,
	typeboisson integer,
	referenceboisson integer,
	uniteboisson integer,
	constraint boisson_pk primary key (idboisson,idstock,iduser),
	constraint boisson_fk foreign key (idboisson) references produit(idproduit),
	constraint boisson_user_fk foreign key (iduser) references users(iduser),
	constraint boisson_stock_fk foreign key (idstock) references stock(idstock),
	constraint typeboisson_fk foreign key (typeboisson) references typeboisson(idtype)
);



create table goodies (
	idgoodies integer,
	idstock integer,
	iduser integer,
	constraint goodies_pk primary key (idgoodies,idstock,iduser),
	constraint goodies_user_fk foreign key (iduser) references users(iduser),
	constraint goodies_fk foreign key (idgoodies) references produit(idproduit),
	constraint goodies_stock_fk foreign key (idstock) references stock(idstock)
);

create table utiliser (
	idevent integer,
	idproduit integer,
	iduser integer,
	qtecommande integer default 0,
	nbreproduit integer default 0,
	prixtotal real default 0,
	constraint utiliser_pk primary key (idevent, idproduit, iduser),
	constraint utiliser_user_fk foreign key (iduser) references users(iduser),
	constraint utiliser_event_fk foreign key (idevent) references event(idevent),
	constraint utiliser_produit_fk foreign key (idproduit) references produit(idproduit)
);


insert into typeboisson(nomtype) values ('Alcool');
insert into typeboisson(nomtype) values ('Jus de fruit');
insert into typeboisson(nomtype) values ('Soda');
insert into typeboisson(nomtype) values ('Fut');

insert into typestock(nomtype) values ('Boissons');
insert into typestock(nomtype) values ('Produits alimentaires');
insert into typestock(nomtype) values ('Goodies');

insert into typealim(nomtype) values ('Légumes et fruits frais');
insert into typealim(nomtype) values ('Viandes, poissons, oeufs');
insert into typealim(nomtype) values ('Pain, pâtes, riz, pomme de terre');
insert into typealim(nomtype) values ('Produits sucrés');
insert into typealim(nomtype) values ('Lait et produits laitiers');
insert into typealim(nomtype) values ('Corps gras');



