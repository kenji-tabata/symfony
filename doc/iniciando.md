# Iniciando o projeto

O Symfony trabalha com componentes chamados de `Bundles`, que é uma pasta contendo todos
os arquivos (PHP, Javascript, CSS e etc) necessário para um componente funcionar.

Para criar Bundles automaticamente utilizamos o comando...

    php bin/console generate:bundle

Ao executar este comando será disparado algumas perguntas sobre a configuração e o nome do 
componente que está sendo criado.

Após confirmar responder as perguntas o Bundle será criado na pasta `src` do seu projeto e o 
Bundle será registrado no arquivo `app/AppKernel.php`


## Iniciando com o AppBundle de exemplo

http://symfony.com/doc/current/page_creation.html

Podemos iniciar no AppBundle adicionando apenas um `controller` e definindo sua `Route` que será 
utilizada para acessar o `controller`:

    // src/AppBundle/Controller/LuckyController1.php
    namespace AppBundle\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Response;

    class LuckyController1
    {
        /**
         * @Route("/lucky/number")
         */
        public function numberAction()
        {
            $number = mt_rand(0, 100);

            return new Response(
                '<html><body>Lucky number: '.$number.'</body></html>'
            );
        }
    }

Para testar podemos executar o arquivo do `controller` diretamente no navegador com a 
seguinte url:

    http://localhost:8000/app_dev.php/lucky/number

Ao inserir o `app_dev.php` antes do `/lucky/number` (que a route do controller) executamos 
acessamos a página em ambiente de desenvolvimento (carregamento da páginas sem cache).



## Separando o `controller` da `view`

Para utilizar o template Twig na resposta do `controller` alteramos o return para `$this->render`
e incluímos a herança do `Controller`.

    // src/AppBundle/Controller/LuckyController2.php
    namespace AppBundle\Controller;

    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

    class LuckyController2 extends Controller
    {
        /**
         * @Route("/lucky/number/twig")
         */
        public function numberAction()
        {
            $number = mt_rand(0, 100);

            return $this->render('lucky/number.html.twig', array(
                'number' => $number,
            ));
        }
    }

O template ficaria assim...

    {# app/Resources/views/lucky/number.html.twig #}
    <h1>Your lucky number is {{ number }}</h1>

Testando...

    http://localhost:8000/lucky/number/twig

Quando não inserimos `app_dev.php` a página será carregada em ambiente de produção (carregamento
 com cache)