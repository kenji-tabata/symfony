# Symfony

## Instalação básica

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


