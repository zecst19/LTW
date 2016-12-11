pragma foreign_key = ON;
CREATE TABLE user(	id_user int primary key NOT NULL, 
					first_name char(50),
					last_name char(50),
					email char(50),
					photo char(50),
					password char(32),
					owner int);
					
CREATE TABLE restaurant(id_restaurant int primary key,
						id_user int, 
						name char(50), 
						description char(50), 
						rate int,
						photo char(50));
					
CREATE TABLE review(id_review int primary key,
					id_user REFERENCES user(id_user),
					id_restaurant REFERENCES restaurant(id_restaurant),
					rate int,
					commment char(150));
					
CREATE TABLE location(id_location int primary key,
						country char(50),
						city char(50));
						
CREATE TABLE location_restaurant(id_location int REFERENCES location(id_location),
								id_restaurant int REFERENCES restaurant(id_restaurant),
								primary key(id_location,id_restaurant));
								
								
								
insert into user values(1, 'Joao', 'Castro','pandasarehere@gmail.com','uphoto1','Salsichas420',0);
insert into user values(2, 'Tiago', 'Pacheco','avidadepi@gmail.com','uphoto2','Bagacocommel2',0);
insert into user values(3, 'Manuel', 'Gomes','timonepumba@gmail.com','uphoto3','Altibor5',0);
insert into user values(4, 'Vasco', 'Ferreira','calcitrinmd@gmail.com','uphoto4','Papibaquigrafos1',0);
insert into user values(5, 'Alcino', 'Mendes','victormoses@gmail.com','uphoto5','4Governo',0);
insert into user values(6, 'Rodrigo', 'Santoro','monstrosvsaliens@gmail.com','uphoto6','VaiSer4',0);
insert into user values(7, 'Joao', 'Gonçalves','pois.pois@gmail.com','uphoto7','Pois2',0);
insert into user values(8, 'Nuno', 'Assunção','montalegre@gmail.com','uphoto8','Pelopidas1',0);
insert into user values(9, 'David', 'Magalhães','binhotinto@gmail.com','uphoto9','Salsichas430',0);
insert into user values(10, 'Rui', 'Costa','benfas@gmail.com','uphoto10','AndreAlmeida19',0);

insert into restaurant values(1,1,'TidBit','italian restaurant and pizzeria', 10, 'photo1');
insert into restaurant values(2,1,'Casa de Pasto Zé de Ver','tasca', 8, 'photo2');
insert into restaurant values(3,1,'Condado','italian restaurant and pizzeria', 5, 'photo3');
insert into restaurant values(4,1,'Mumadona','vinho e castanhas cruas', 7, 'photo4');
insert into restaurant values(5,1,'Pinguim','jarros de receita', 6, 'photo5');
insert into restaurant values(6,1,'Adega Amarela','tudo à descriçao', 9, 'photo6');
insert into restaurant values(7,1,'Lusíada','a real', 10, 'photo7');
insert into restaurant values(8,1,'Bufete Rapide','lusiada com as paredes escritas', 10, 'photo8');
insert into restaurant values(9,1,'Sala 141','sandes e assim', 8, 'photo9');
insert into restaurant values(10,1,'Taberna Belga','esperar 45 minutos e francesinhas', 6, 'photo10');
insert into restaurant values(11,1,'Yuko','melhores francesinhas', 9, 'photo11');
insert into restaurant values(12,1,'Taberna Londrina','mais francesinhas', 8, 'photo12');
insert into restaurant values(13,1,'Portuscale','caro', 8, 'photo13');
insert into restaurant values(14,1,'Luar','sandes e assim', 5, 'photo14');
insert into restaurant values(15,1,'Honorato','hamburguers bicho', 9, 'photo15');
insert into restaurant values(16,1,'Kebabs do Raza','melhores kebabs do mundo', 10, 'photo16');

insert into review values(1,1,1,10,'muito bicho');
insert into review values(2,2,2,10,'pouco bicho');
insert into review values(3,3,3,10,'tao bicho');
insert into review values(4,4,4,10,'podia ser mais bicho');
insert into review values(5,1,1,10,'omfg bicho');

insert into location values(1,'Portugal','Porto');
insert into location values(2,'Portugal','Guimarães');
insert into location values(3,'Portugal','Lisboa');
insert into location values(4,'Portugal','Braga');
insert into location values(5,'Portugal','Santo Tirso');
insert into location values(6,'Portugal','Arouca');

insert into location_restaurant values(1,1);
insert into location_restaurant values(2,3);
insert into location_restaurant values(2,4);
insert into location_restaurant values(2,5);
insert into location_restaurant values(6,2);
insert into location_restaurant values(5,6);
insert into location_restaurant values(1,7);
insert into location_restaurant values(1,8);
insert into location_restaurant values(2,9);
insert into location_restaurant values(4,10);
insert into location_restaurant values(1,11);
insert into location_restaurant values(2,12);
insert into location_restaurant values(1,13);
insert into location_restaurant values(1,14);
insert into location_restaurant values(3,15);
insert into location_restaurant values(5,16);
