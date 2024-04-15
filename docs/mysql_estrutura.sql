CREATE TABLE `usuario` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `nome_social` varchar(128),
  `email` varchar(64) UNIQUE NOT NULL,
  `celular` varchar(32),
  `pcd` boolean NOT NULL,
  `pcd_tipo` varchar(32) NOT NULL,
  `campus` varchar(64) NOT NULL,
  `instituto` varchar(64) NOT NULL,
  `tipo_login` varchar(32) NOT NULL,
  `senha` varchar(256) NOT NULL
);

CREATE TABLE `discentes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `matricula` varchar(32) UNIQUE NOT NULL,
  `curso` varchar(32) NOT NULL,
  `id_usuario` int NOT NULL
);

CREATE TABLE `docentes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `matricula` varchar(32) UNIQUE NOT NULL,
  `curso` varchar(32) NOT NULL,
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
  `matricula` varchar(32) UNIQUE NOT NULL,
  `nucleo` boolean NOT NULL,
  `id_usuario` int NOT NULL
);

CREATE TABLE `tec_acessibilidade` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `matricula` varchar(32) UNIQUE NOT NULL,
  `nucleo` boolean NOT NULL,
  `id_usuario` int NOT NULL
);

CREATE TABLE `gestores` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `nivel_acesso` int NOT NULL
);

CREATE TABLE `Categorias` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL
);

CREATE TABLE `PEA` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `titulo` VARCHAR(128),
  `keyword` VARCHAR(128),
  `ano` INT,
  `formato` varchar(32),
  `curso` VARCHAR(128),
  `disciplina` VARCHAR(128),
  `tipo` varchar(32) NOT NULL,
  `tipo_de_deficiencia` VARCHAR(128),
  `id_categoria` int,
  `local` varchar(32) NOT NULL,
  `uso` varchar(32) NOT NULL COMMENT 'Indidual|Grupo',  
  `fonte_original` varchar(128) NOT NULL,
  `cid_pcd` VARCHAR(32) NOT NULL,
  `descricao` TEXT,
  `comentario` TEXT
);

ALTER TABLE `discentes` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `TAES` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `colaboradores` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `docentes` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `tec_acessibilidade` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `gestores` ADD FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

ALTER TABLE `PEA` ADD FOREIGN KEY (`id_categoria`) REFERENCES `Categorias` (`id`);

INSERT INTO `Categorias` (`nome`) VALUES ('1');