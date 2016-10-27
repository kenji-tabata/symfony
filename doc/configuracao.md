# Configurando Apache na máquina local

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


Adicione no arquivo `/etc/hosts` a seguinte linha:

    127.0.0.1       www.symfony-test.php


E reinicie o servidor Apache

    service apache2 restart


Ao tentar acessar a url `www.symfony-test.php` ocorrerá um erro de permissão de pasta, 
para corrigir altere as permissões das pastas `/var/cache`, `var/logs` e `var/sessions` 
para 777...

    chmod 777 var/cache/
    chmod 777 var/logs/
    chmod 777 var/sessions/

Ou altere o apenas o proprietário das pastas para o usuário Apache.

    chown www-data:www-data var/cache/
    chown www-data:www-data var/logs/
    chown www-data:www-data var/sessions/

E acesse novamente o endereço `www.symfony-test.php`