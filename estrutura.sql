CREATE TABLE login (
    nome_id STRING PRIMARY KEY,
    nome_social STRING,
    email STRING,
    telefone STRING,
    FCPD BOOLEAN,
    tipo_de_ECD STRING,
    campus STRING,
    instituio STRING,
    senha STRING
);

CREATE TABLE PEA (
    id STRING PRIMARY KEY,
    formato STRING,
    tipo STRING,
    categoria_perfil STRING
);

CREATE TABLE USUARIO_DISCENTE (
   matricula STRING PRIMARY KEY,
   curso STRING,
   FOREIGN KEY (nome_id) REFERENCES login(nome_id)
);

CREATE TABLE USUARIO_TAE (
   SIAPE STRING PRIMARY KEY,
   nucleo BOOLEAN,
   FOREIGN KEY (nome_id) REFERENCES login(nome_id)
);

CREATE TABLE USUARIO_COLABORADOR (
   CPF STRING PRIMARY KEY,
   FOREIGN KEY (nome_id) REFERENCES login(nome_id)
);

CREATE TABLE USUARIO_DOCENTE (
   SIAPE STRING PRIMARY KEY,
   curso STRING,
   FOREIGN KEY (nome_id) REFERENCES login(nome_id)
);

CREATE TABLE USUARIO_TEC_ACESSIBILIDADE (
   SIAPE STRING PRIMARY KEY,
   FOREIGN KEY (nome_id) REFERENCES login(nome_id)
);
