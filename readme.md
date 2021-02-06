# transparencia.org.br

# PRÉ REQUISITOS

-   Instalar o docker: https://docs.docker.com/install/
-   Instalar o git: https://git-scm.com/downloads

# HTML, CSS E JAVASCRIPT

-   Local: webroot/
-   Views e Templates: src/

# INSTALAÇÃO DO SITE USANDO O DOCKER

-   CLONANDO O SITE DO GITBUCKET
    git clone https://github.com/Transparencia-Brasil/transparencia.org.br.git

-   Na pasta config copiar o arquivo app-example.php para app.php

-   no arquivo app.php colocar as credenciais para:
  
    * Array debug (em produção deve ser sempre false)
    
    * Array Security variável de ambiente: salt (ver descrição no comentário do arquivo)
  
    * Banco de dados no array Datasources com as variáveis de ambiente (env vars): host, username, password e database

    * SMTP no array EmailTransport / default com as variáveis de ambiente (env vars): SMTPAuth, host, port, timeout, username, password, client e tls

    * SMTP no array EmailTransport / default com as variáveis de ambiente (env vars): SMTPAuth, host, port, timeout, username, password, client e tls

    * Array Email / default: transport, from, charset, headerCharset

    * Array Email / no-reply: transport, from, charset, headerCharset

-   copiar ao arquivo bootstrap-example.php para bootstrap.php

-   no arquivo bootstrap.php definir na variável de ambiente a URL da aplicação:

    define('BASE_URL', "http://localhost:8000/");

-   FAZENDO O BUILD
    docker-compose build

-   Entrando no docker bash
    docker-compose exec app bash

    docker-compose exec database mysql -u root -p tbrasil_site

# SCRIPT PARA CRIACAO DA BASE DE DADOS
./dump-database.sql

# LIGANDO O DOCKER

docker-compose up (com visualização de log)
docker-compose up -d (rodar em background)

# DESLIGANDO O DOCKER

docker-compose down

# RODANDO O SITE SEM DOCKER

php -S localhost:8000 -t \var\www\html\webroot (caminho da aplicação\webroot)

# SENHA DO ADMIN AMBIENTE DEV:

usuario: teste
senha: teste