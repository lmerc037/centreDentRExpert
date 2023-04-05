CREATE TABLE `utilisateur` (
	`id` INT NOT NULL  AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`password` varchar(200) NOT NULL,
	`email` varchar(255) NOT NULL,
	`horodatage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`nom` varchar(50) NOT NULL,
	`prenom` varchar(50) NOT NULL,
	PRIMARY KEY (id)

)


CREATE TABLE `employe` (
	`id` INT NOT NULL  AUTO_INCREMENT,
	`id_utilisateur` INT NOT NULL,
	`id_adresse` INT,
	`id_succursale` INT,
	`ssn` INT,
	`role` varchar(50) NOT NULL,
	`type` varchar(50) NOT NULL,
	`salaire` varchar(50) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
	FOREIGN KEY (id_adresse) REFERENCES adresse(id),
	FOREIGN KEY (id_succursale) REFERENCES succursale(id)
)


CREATE TABLE `patient` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_utilisateur` INT NOT NULL,
	`id_adresse` INT,
	`id_succursale` INT,
	`datenaissance` DATE,
	`sexe` varchar(10) NOT NULL,
	`telephone` INT NOT NULL,
	`assurance` varchar(50),
	`parent` varchar(50),
	PRIMARY KEY (id),
	FOREIGN KEY (id_utilisateur) REFERENCES utilisateur(id),
	FOREIGN KEY (id_adresse) REFERENCES adresse(id),
	FOREIGN KEY (id_succursale) REFERENCES succursale(id)
)

CREATE TABLE `adresse` (
	`id` INT NOT NULL  AUTO_INCREMENT,
	`adresse` varchar(120) NOT NULL,
	`ville` varchar(50) NOT NULL,
	`province` varchar(10),
	`code_postal` varchar(50),
	`pays` varchar(50),
	PRIMARY KEY (id)
	
)


CREATE TABLE `succursale` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`id_adresse` INT NOT NULL,
	`telephone` INT NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (id_adresse) REFERENCES adresse(id)
)

CREATE TABLE `rendezvous` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_patient` INT NOT NULL,
	`id_succursale` INT,
	`date` DATETIME,
	`type` varchar(50),
	`commentaire` varchar(250),
	PRIMARY KEY (id),
	FOREIGN KEY (id_patient) REFERENCES patient(id),
	FOREIGN KEY (id_succursale) REFERENCES succursale(id)
	
)


CREATE TABLE `proceduredentaire` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`categorie` varchar(50),
	`soins` varchar(50),
	`code` INT NOT NULL,
	`cout` INT NOT NULL,
	`restriction` varchar(150),
	PRIMARY KEY (id)
	
	
)


CREATE TABLE `traitement` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_proceduredentaire` INT NOT NULL,
	`id_patient` INT NOT NULL,
	`date` DATETIME,
	`dents` varchar(250),
	`commentaire` varchar(250),
	PRIMARY KEY (id),
	FOREIGN KEY (id_patient) REFERENCES patient(id),
	FOREIGN KEY (id_proceduredentaire) REFERENCES proceduredentaire(id)
)



