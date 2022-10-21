create database osvac;

create table peca(
cod_peca  int not null primary key auto_increment,
modelo varchar(20),
tipo varchar(20),
marca varchar(20),
dimensões varchar(15),
foto longblob,
valor varchar(15)
);