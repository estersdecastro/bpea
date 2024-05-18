CREATE TABLE `usuario` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `social_name` varchar(128),
  `email` varchar(64) UNIQUE NOT NULL,
  `cellphone` varchar(32),
  `pcd` boolean NOT NULL,
  `pcd_type` varchar(32) NOT NULL,
  `campus` varchar(64) NOT NULL,
  `instituto` varchar(64) NOT NULL,
  `type` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL
);


CREATE TABLE `discentes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `matricula` varchar(32) UNIQUE NOT NULL,
  `course` varchar(32) NOT NULL,
  `id_usuario` int NOT NULL
);


CREATE TABLE `docentes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `siape` varchar(32) UNIQUE NOT NULL,
  `course` varchar(32) NOT NULL,
  `nucleo` boolean NOT NULL,
  `id_usuario` int NOT NULL
);


CREATE TABLE `colaboradores` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `cpf` varchar(32) UNIQUE NOT NULL,
  `id_usuario` int NOT NULL
);


CREATE TABLE `TAES` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `siape` varchar(32) UNIQUE NOT NULL,
  `nucleo` boolean NOT NULL,
  `id_usuario` int NOT NULL
);


CREATE TABLE `tec_acessibilidade` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `siape` varchar(32) UNIQUE NOT NULL,
  `nucleo` boolean NOT NULL,
  `id_usuario` int NOT NULL
);

CREATE TABLE `PEA` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `titulo` VARCHAR(128),
  `keyword` VARCHAR(128),
  `ano` INT,
  `formato` varchar(32),
  `acc_resources` varchar(128),
  `tipo_de_deficiencia` VARCHAR(128),
  `uso` varchar(32) NOT NULL COMMENT 'Individual|Grupo',  
  `local` varchar(256) NOT NULL,
  `fonte_original` varchar(128) NOT NULL,
  `descricao` TEXT
);


ALTER TABLE `discentes` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `TAES` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `colaboradores` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `docentes` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `tec_acessibilidade` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);