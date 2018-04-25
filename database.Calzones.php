create database Calzones;

create tb_users(
	id int not null primary key auto_increment,
	usuario varchar(50),
	email varchar(100) not null,
	senha varchar(32) not null
);

create table tb_calzando(
	CalzAqui int not null primary key auto_increment,
	id_user int not null,
	CalZaquiText varchar(140) not null,
	dt_Calz datetime default current_timestamp
);

create table seguidores_calz(
	id_seguidor int not null primary key auto_increment,
	id_usuario int not null,
	seguindor int not null,
	data_registro datetime default current_timestamp
);