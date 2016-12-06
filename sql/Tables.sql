pragma foreign_key = ON;
CREATE TABLE user(	id_user int primary key NOT NULL, 
					first_name char(50),
					last_name char(50),
					email char(50),
					photo char(50),
					password char(32));
					
CREATE TABLE restaurant(id_restaurant int primary key, 
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
								
								
								
insert into user values(1, 'Joao', 'Castro','pandasarehere@gmail.com','photo1','Salsichas420');
insert into user values(2, 'Tiago', 'Pacheco','avidadepi@gmail.com','photo2','Bagacocommel2');
insert into user values(3, 'Manuel', 'Gomes','timonepumba@gmail.com','photo3','Altibor5');
insert into user values(4, 'Vasco', 'Ferreira','calcitrinmd@gmail.com','photo4','Papibaquigrafos1');
insert into user values(5, 'Alcino', 'Mendes','victormoses@gmail.com','photo5','4Governo');
insert into user values(6, 'Rodrigo', 'Santoro','monstrosvsaliens@gmail.com','photo6','VaiSer4');
insert into user values(7, 'Joao', 'Gonçalves','pois.pois@gmail.com','photo7','Pois2');
insert into user values(8, 'Nuno', 'Assunção','montalegre@gmail.com','photo8','Pelopidas1');
insert into user values(9, 'David', 'Magalhães','binhotinto@gmail.com','photo9','Salsichas430');
insert into user values(10, 'Rui', 'Costa','benfas@gmail.com','photo10','AndreAlmeida19');

insert into restaurant values(1,'TidBit','italian restaurant and pizzeria', 10, 'photo1');
insert into restaurant values(2,'Casa de Pasto Zé de Ver','tasca', 8, 'photo2');
insert into restaurant values(3,'Condado','italian restaurant and pizzeria', 5, 'photo3');
insert into restaurant values(4,'Mumadona','italian restaurant and pizzeria', 7, 'photo4');

insert into review values(1,1,1,10,'muito bicho');

insert into location values(1,'Portugal','Porto');
insert into location values(2,'Portugal','Guimarães');
insert into location values(3,'Portugal','Lisboa');

insert into location_restaurant values(1,1);
insert into location_restaurant values(2,3);
insert into location_restaurant values(2,4);