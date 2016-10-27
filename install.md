# Symfony

## Instalação

Digite os comando a seguir para fazer o download e instalar o symfony em sua máquina local:

    $ sudo mkdir -p /usr/local/bin
    $ sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
    $ sudo chmod a+x /usr/local/bin/symfony

Para criar um projeto utilize o comando

    $ symfony new my_project_name



## Instalação via Composer

Digite o comando a seguir para instalar e iniciar um projeto com Symfony

    $ composer create-project symfony/framework-standard-edition my_project_name



## Executando no servidor embutido

    $ php bin/console server:run


## Configurando Apache na máquina local

https://symfony.com/doc/current/deployment.html#common-post-deployment-tasks

Crie o arquivo `symfony.conf` (ou com qualquer outro nome) na pasta `/etc/apache2/sites-available/`

    $ sudo nano /etc/apache2/site-available/symfony.conf

No arquivo adicione as linhas abaixo, alterando o local e a pasta do projeto:

    <VirtualHost *:80>
        ServerAlias www.symfony-test.php
        DocumentRoot /local/do/projeto/nome_do_projeto/web
        DirectoryIndex app.php
        ErrorLog /local/do/projeto/nome_do_projeto/var/logs/error.log
        CustomLog /local/do/projeto/nome_do_projeto/var/logs/access.log combined
    </VirtualHost>

Crie os arquivos de log do Apache na pasta `var/logs/` do seu projeto e altere sua permissão ou seu proprietário

    cd /local/do/projeto/nome_do_projeto
    touch var/logs/error.log
    touch var/logs/access.log
    chmod 777 var/logs/error.log    //para alterar o dono utilize: chown www-data:www-data var/logs/error.log
    chmod 777 var/logs/access.log   //para alterar o dono utilize: chown www-data:www-data var/logs/access.log

Adicione no arquivo `/etc/hosts` a seguinte linha:

    127.0.0.1       www.symfony-test.php

Altere a permissão ou o proprietário da pasta `var/logs/`

    chmod 777 var/logs/             //para alterar o dono utilize: chown www-data:www-data var/logs/

Crie o cache para produção do projeto

    php bin/console cache:clear --env=prod --no-debug

Altere a permissão ou o proprietário da pasta `var/cache/prod/` e `var/cache/prod/annotations/`

    chmod 777 var/cache/prod/               #para alterar o dono utilize: chown www-data:www-data var/logs/
    chmod 777 var/cache/prod/annotations/   #para alterar o dono utilize: chown www-data:www-data var/logs/


E reinicie o servidor Apache

    service apache2 restart


Teste no navegador acessando a url `www.symfony-test.php`