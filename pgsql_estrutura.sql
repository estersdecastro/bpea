CREATE TABLE usuario ( 
  id SERIAL PRIMARY KEY, 
  name VARCHAR(128) NOT NULL, 
  social_name VARCHAR(128), 
  email VARCHAR(64) UNIQUE NOT NULL, 
  cellphone VARCHAR(32), 
  pcd BOOLEAN, 
  pcd_type VARCHAR(32), 
  campus VARCHAR(64), 
  instituto VARCHAR(64), 
  type VARCHAR(32) NOT NULL, 
  password VARCHAR(256) NOT NULL 
);

CREATE TABLE discentes ( 
  id SERIAL PRIMARY KEY, 
  matricula VARCHAR(32) UNIQUE NOT NULL, 
  course VARCHAR(32) NOT NULL, 
  id_usuario INT NOT NULL, 
  FOREIGN KEY (id_usuario) REFERENCES usuario (id) 
);

CREATE TABLE docentes ( 
  id SERIAL PRIMARY KEY, 
  siape VARCHAR(32) UNIQUE NOT NULL, 
  course VARCHAR(32) NOT NULL, 
  id_usuario INT NOT NULL, 
  FOREIGN KEY (id_usuario) REFERENCES usuario (id) 
);

CREATE TABLE colaboradores ( 
  id SERIAL PRIMARY KEY, 
  cpf VARCHAR(32) UNIQUE NOT NULL, 
  id_usuario INT NOT NULL, 
  FOREIGN KEY (id_usuario) REFERENCES usuario (id)
);

CREATE TABLE TAES ( 
  id SERIAL PRIMARY KEY, 
  siape VARCHAR(32) UNIQUE NOT NULL, 
  id_usuario INT NOT NULL, 
  FOREIGN KEY (id_usuario) REFERENCES usuario (id) 
);

CREATE TABLE tec_acessibilidade ( 
  id SERIAL PRIMARY KEY, 
  siape VARCHAR(32) UNIQUE NOT NULL, 
  id_usuario INT NOT NULL, 
  FOREIGN KEY (id_usuario) REFERENCES usuario (id) 
);

CREATE TABLE PEA (
  id SERIAL PRIMARY KEY,
  titulo VARCHAR(128),
  keyword VARCHAR(128),
  ano INT,
  formato VARCHAR(32),
  acc_resources VARCHAR(128),
  tipo_de_deficiencia VARCHAR(128),
  id_categoria VARCHAR(128),
  uso VARCHAR(128) NOT NULL,  
  local VARCHAR(256) NOT NULL,
  fonte_original VARCHAR(128) NOT NULL,
  descricao TEXT
);