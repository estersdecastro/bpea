CREATE TABLE [Usuario] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [nome] varchar(128) NOT NULL,
  [nome_social] varchar(128),
  [email] varchar(64) UNIQUE NOT NULL,
  [celular] varchar(32),
  [pcd] bit NOT NULL,
  [pcd_tipo] varchar(32) NOT NULL,
  [campus] varchar(64) NOT NULL,
  [instituto] varchar(64) NOT NULL,
  [tipo_login] varchar(32) NOT NULL,
  [senha] varchar(256) NOT NULL
)
GO

CREATE TABLE [UsuariosTae] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [siape] varchar(32) UNIQUE NOT NULL,
  [nucleo] bit NOT NULL,
  [id_usuario] int NOT NULL
)
GO

CREATE TABLE [UsuarioDocente] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [siape] varchar(32) UNIQUE NOT NULL,
  [curso] varchar(32) NOT NULL,
  [nucleo] bit NOT NULL,
  [id_usuario] int NOT NULL
)
GO

CREATE TABLE [UsuarioDiscente] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [matricula] varchar(32) UNIQUE NOT NULL,
  [curso] varchar(32) NOT NULL,
  [id_usuario] int NOT NULL
)
GO

CREATE TABLE [UsuarioTecAccesibilidade] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [siape] varchar(32) UNIQUE NOT NULL,
  [nucleo] bit NOT NULL,
  [id_usuario] int NOT NULL
)
GO

CREATE TABLE [Categorias] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [nome] varchar(32) NOT NULL
)
GO

CREATE TABLE [PEA] (
  [id] int PRIMARY KEY IDENTITY(1, 1),
  [formato] varchar(32),
  [tipo] varchar(32) NOT NULL,
  [id_categoria] int,
  [local] varchar(32) NOT NULL,
  [uso] varchar(32) NOT NULL,
  [fonte_original] varchar(128) NOT NULL,
  [cid_pcd] VARCHAR(32) NOT NULL,
  [comentario] TEXT
)
GO

EXEC sp_addextendedproperty
@name = N'Column_Description',
@value = 'Indidual|Grupo',
@level0type = N'Schema', @level0name = 'dbo',
@level1type = N'Table',  @level1name = 'PEA',
@level2type = N'Column', @level2name = 'uso';
GO

ALTER TABLE [UsuarioDiscente] ADD FOREIGN KEY ([id_usuario]) REFERENCES [Usuario] ([id])
GO

ALTER TABLE [UsuariosTae] ADD FOREIGN KEY ([id_usuario]) REFERENCES [Usuario] ([id])
GO

ALTER TABLE [UsuarioColaborador] ADD FOREIGN KEY ([id_usuario]) REFERENCES [Usuario] ([id])
GO

ALTER TABLE [UsuarioDocente] ADD FOREIGN KEY ([id_usuario]) REFERENCES [Usuario] ([id])
GO

ALTER TABLE [UsuarioTecAccesibilidade] ADD FOREIGN KEY ([id_usuario]) REFERENCES [Usuario] ([id])
GO

ALTER TABLE [PEA] ADD FOREIGN KEY ([id_categoria]) REFERENCES [Categorias] ([id])
GO
