# Database

http://symfony.com/doc/current/doctrine.html

## Configurando

O arquivo `/app/config/parameters.yml` contém os dados para a conexão com o banco de dados.

Altere os dados do arquivos caso a conexão falhe ou o adicione caso o arquivo não exista.

    # app/config/parameters.yml
    parameters:
        database_host:      localhost
        database_name:      test_project
        database_user:      root
        database_password:  password

Após configurado o arquivo `parameters.yml` execute o comando abaixo para cria a database:

    php bin/console doctrine:database:create



## Criando uma Entity class

http://symfony.com/doc/current/doctrine.html#creating-an-entity-class

Adicionamos o arquivo Product na pasta Entity do Bundle

    // src/AppBundle/Entity/Product.php
    namespace AppBundle\Entity;

    class Product
    {
        private $name;
        private $price;
        private $description;
    }

Para persistirmos a Entity class Product na database adicionamos as annotations do Doctrine 
com as configurações de cada campo...

    // src/AppBundle/Entity/Product.php
    namespace AppBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="product")
     */
    class Product
    {
        /**
         * @ORM\Column(type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @ORM\Column(type="string", length=100)
         */
        private $name;

        /**
         * @ORM\Column(type="decimal", scale=2)
         */
        private $price;

        /**
         * @ORM\Column(type="text")
         */
        private $description;
    }

Após configuramos as variáveis do Entity class será preciso criar as funções get/set, execute o 
código abaixo para gerar automaticamente as funções get/set da Entity class.

    // O parâmetro `AppBundle/Entity/Product` é o path da classe.
    $ php bin/console doctrine:generate:entities AppBundle/Entity/Product

    //Para gerar o get/set para todas as Entity class do Bundle utilize o comando abaixo
    $ php bin/console doctrine:generate:entities AppBundle

Com a Entity class mapeada podemos adicionar a tabela no banco de dados com o comando...

    $ php bin/console doctrine:schema:update --force



## Criando pelo console a Entity class

Com comando abaixo podemos criar a Entity class automaticamente ao responder perguntas sobre 
as propriedades da Entity class

    $ php bin/console doctrine:generate:entity

Após criar a Entity class adicionamos a tabela na database

    $ php bin/console doctrine:schema:update --force


