pragma foreign_key = ON;
CREATE TABLE user(id_user int primary key, 
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
					id_user references user(id_user),
					id_restaurant references user(id_restaurant),
					rate int,
					commment char(150));
					
CREATE TABLE location(id_location int primary key,
						country char(50),
						city char(50));