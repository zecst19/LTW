pragma foreign_key = ON;
CREATE TABLE user(id_user int primary key, 
					first_name char(50),
					last_name char(50),
					email char(50),
					photo char(50),);
					
CREATE TABLE restaurant(id_restaurant int primary key, 
						name char(50), 
						description char(50), 
						rate int,
						photo char(50),);
					
CREATE TABLE review(id_review int primary key,
					rate int,
					commment char(150),
					);