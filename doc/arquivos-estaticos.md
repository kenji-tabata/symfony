# Adicionando arquivos estáticos

http://symfony.com/doc/current/templating.html#linking-to-assets

Todos os arquivos estáticos (imagens, js, css e etc) utilizados pelo site ficam na pasta `web`.

Ao adicionar os arquivos na pasta `web` podemos adicionar o link path do arquivo no template:

    <img src="{{ asset('images/logo_symfony.png') }}" alt="Symfony geral!" />



## Arquivos estáticos exclusivos para o Bundle

http://symfony.com/doc/current/templating.html#including-stylesheets-and-javascripts-in-twig

Na pasta `src/nome-do-bundle` crie a pasta `Resouces` e a acesse, dentro desta pasta crie mais uma
como `public`.

Todos os arquivos estáticos do Bundle devem ser adicionados nesta pasta `src/nome-do-bundle/Resources/public/`.

Após adicionado os arquivos execute o comando abaixo para criar links simbólicos destes arquivos

    $ php bin/console assets:install --symlink

E adicione na função asset do template o `path` do link simbólico criado do arquivo estático.

    <img src="{{ asset('bundles/nome-do-bundle/images/logo_symfony.png') }}" alt="Symfony!" />