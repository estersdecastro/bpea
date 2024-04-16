# Banco de Dados PEA - UFPA

Este repositório contém A Estrutura e interface que compõem uma sistema para interação com o banco de dados, para criar um banco de dados relacional voltado para um sistema de gerenciamento acadêmico de Produtos Educacionais Especiais do Acessar (PEA) de apoio e acessibilidade para pessoas com Deficiência no Ensino Superior da Universidade Federal do Pará (UFPA) e Universidade Federal Rural da Amazônia (UFRA).

Site: <a href="https://webapp-bdufpa.azurewebsites.net/">https://webapp-bdufpa.azurewebsites.net/</a>

## Estrutura do Banco de Dados
- **Usuario:** Armazena informações gerais sobre usuários, como estudantes, docentes, colaboradores, técnicos e administrativos.
- **Usuario_Discente, Usuario_Docente, Usuario_Colaborador, Usuario_TAE, Usuario_TecAccesibilidade:** Tabelas específicas para cada tipo de usuário, mantendo detalhes relacionados a cada categoria.
- **Categorias:** Define as categorias existentes no sistema.
- **PEA (Projeto de Ensino e Aprendizagem):** Registra projetos educacionais com detalhes como título, formato, tipo, categoria, local, uso, fonte original e comentários.

## Implementação Web
Os arquivos PHP neste repositório complementam a experiência do usuário, oferecendo uma interface web para interagir com o banco de dados. As funcionalidades incluem:
- Cadastro e gerenciamento de usuários de diferentes categorias.
- Registro e visualização de projetos de ensino e aprendizagem.
- Integração com categorias para classificação dos projetos.

## Requisitos
- PHP 7.4 ou superior
- PostgreSQL 12.0 ou superior
- Servidor web (como Apache ou Nginx)

## Instruções de Uso
1. Importe o código SQL fornecido para criar o banco de dados e tabelas.
2. Configure a conexão do banco de dados no arquivo PHP conforme necessário.
3. Implante os arquivos PHP em um servidor web compatível com PHP.

## Contribuições
Este projeto é parte de um trabalho acadêmico. Contribuições são bem-vindas para melhorar a interface web, adicionar funcionalidades ou otimizar a estrutura do banco de dados.

## Licença
Este projeto é distribuído sob a [Licença MIT](LICENSE).

**Observação:** Certifique-se de proteger informações sensíveis, como credenciais de banco de dados, ao implantar em um ambiente de produção.



