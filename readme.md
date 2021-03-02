# transparencia.org.br

## PRÉ REQUISITOS

-   Instalar o docker: https://docs.docker.com/install/
-   Instalar o git: https://git-scm.com/downloads


## HTML, CSS E JAVASCRIPT

-   Local: webroot/
-   Views e Templates: src/


## INSTALAÇÃO DO SITE USANDO O DOCKER

-   CLONANDO O SITE DO GITBUCKET
    git clone https://github.com/Transparencia-Brasil/transparencia.org.br.git

-   configurar as variáveis de ambiente:

    * `APP_DEBUG`: true ou false (padrão);
    * `APP_URL`: URL do site terminada com `/` (e.g. `https://www.transparencia.org.br/`);
    * `SECURITY_SALT`: string que serve de [salt](https://en.wikipedia.org/wiki/Salt_(cryptography));
    * `MYSQL_HOST`: endereço do servidor de MySQL;
    * `MYSQL_USERNAME`: usuário do MySQL;
    * `MYSQL_PASSWORD`: senha do MySQL;
    * `MYSQL_DATABASE`: banco de dados do MySQL;
    * `MYSQL_ATTR_SSL_CA`: certificado SSL para conexão com banco de dados.
    * `MAIL_DRIVER`: 'Smtp' (padrão) ou 'Mail';
    * `MAIL_HOST`: endereço do servidor de email;
    * `MAIL_USERNAME`: usuário do servidor de email;
    * `MAIL_PASSWORD`: senha do servidor de email.

-   FAZENDO O BUILD
    docker-compose build

-   Entrando no docker bash
    docker-compose exec app bash

    docker-compose exec database mysql -u root -p tbrasil_site


## SCRIPT PARA CRIACAO DA BASE DE DADOS

./dump-database.sql


## LIGANDO O DOCKER

docker-compose up (com visualização de log)
docker-compose up -d (rodar em background)


## CRIAR PASTA CACHE NA RAIZ DO PROJETO

mkdir tmp
sudo chmod -R 777 tmp


## DESLIGANDO O DOCKER

docker-compose down


## RODANDO O SITE SEM DOCKER

php -S localhost:8000 -t \var\www\html\webroot (caminho da aplicação\webroot)


## SENHA DO ADMIN AMBIENTE DEV:
usuario: teste
senha: teste

## PASTAS PARA UPLOAD DE ARQUIVOS DINÂMICOS (PUBLICADOS PELO ADMIN) 
* Necessário permissão de leitura e escrita a partir da pasta uploads
  
```
webroot/
    uploads/
        banners/
        imprensa/
        midias/
        projetos/
        publicacoes/
        quemsomos/
```

## SYMLINK PARA PUBLICAÇÕES (MANTEM URL /downloads/publicacoes/)
```
ln -s uploads downloads
```