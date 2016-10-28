# Funções do Controller

Cola com algumas funções utilizadas no controller

__Gerar uma url de acordo com os parâmetros utilizados:__

http://symfony.com/doc/current/controller.html#generating-urls

    $this->generateUrl('homepage', array('slug' => 'slug-value'));

Resultado: "/?slug=slug-value"


__Redirecionamento:__

http://symfony.com/doc/current/controller.html#redirecting

    return $this->redirectToRoute('homepage');          // Redireciona para a página inicial
    return $this->redirect('http://symfony.com/doc');   // Redireciona para uma página externa


__Renderização do template:__

http://symfony.com/doc/current/controller.html#rendering-templates

    return $this->render('lucky/number.html.twig', array('name' => $name));


__Utilizando um serviço (componentes):__

http://symfony.com/doc/current/controller.html#accessing-other-services

    $this->get('mailer');   // carrega o objeto Swift_Mailer

Para visualizar os serviços disponíveis utilize o comando `php bin/console debug:container`


__Session:__

http://symfony.com/doc/current/controller.html#managing-the-session

    // Carrega o módulo Request
    use Symfony\Component\HttpFoundation\Request;

    // Adiciona o módulo como parâmetro da função
    public function session(Request $request) {}

    // Carregamos o módulo Session
    $session = $request->getSession();

    // Setamos um valor para a session foo
    $session->set('foo', 'bar');

    // E carregamos o valor que está armazenado
    $session->get('foo');

    // Para visualizar todos os valores armazenados na session
    $session->all();


__Retornando JSON:__

http://symfony.com/doc/current/controller.html#json-helper

    return $this->json(array('username' => 'jane.doe'));
    // returns '{"username":"jane.doe"}' and sets the proper Content-Type header


__Route name:__

http://symfony.com/doc/current/templating.html#linking-to-pages

Podemos criar um apelido para a `route` do controller ao definir um `name` para ele, isso
facilita quando precisamos adicionar a url no template.

    // Controller
    /**
     * @Route("/", name="welcome")
     */
    public function indexAction() {}

No template utilizamos a função `path` para adicionar a url pelo apelido dela:

    // Template Twig
    <a href="{{ path('welcome') }}">Home</a>
