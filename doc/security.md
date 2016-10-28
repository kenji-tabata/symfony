# Security

symfony.com/doc/current/security.html

## Autenticação via HTTP

http://symfony.com/doc/current/security.html#a-configuring-how-your-users-will-authenticate

No arquivo `/app/config/security.yml` adicione a linha `http_basic: ~` abaixo do `main` para ativar
a autenticação por http.

Adicione o `access_control` para definir o perfil de usuário que pode acessar a página `/admin`

    // app/config/security.yml
    security:

    providers:
        in_memory:
            memory: ~

    firewalls:
        # disables authentication for assets and the profiler, adapt it according to your needs
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false

        main:
            anonymous: ~
            http_basic: ~

    access_control:
        # require ROLE_ADMIN for /admin*
        - { path: ^/foo/admin, roles: ROLE_ADMIN }


No controller do Bundle adicione as seguintes linhas

    // /src/AppFooBundle/Controller/DefaultController.php
    /**
     * @Route("/admin/")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    } 


Ao tentar acessar a página `http://127.0.0.1:8000/foo/admin` será exibido o login http


## Criando usuário

http://symfony.com/doc/current/security.html#b-configuring-how-users-are-loaded

No arquivo `/app/config/security.yml` adicione o `encoders`, para criptografar as senhas...

    encoders:
        Symfony\Component\Security\Core\User\User:
            algorithm: bcrypt
            cost: 12


E adicione os usuários estáticos com o código abaixo...

    providers:
        in_memory:
            memory:
                users:
                    ryan:
                        // a senha é: ryanpass
                        password: $2a$12$LCY0MefVIEc3TYPHV9SNnuzOfyr2p/AXIGoQJEDs4am4JwhNz/jli
                        roles: 'ROLE_USER'
                    admin:
                        // a senha é: kitten
                        password: $2a$12$cyTWeE9kpq1PjqKFiWUZFuCRPwVyAZwm4XzMZ1qPUFl7/flCM3V0G
                        roles: 'ROLE_ADMIN'

Teste acessando a url `http://127.0.0.1:8000/foo/admin` com o login e senha.


## Logout

http://symfony.com/doc/current/security.html#logging-out

O login por HTTP não possui uma forma real de se fazer o logout, além de limpar o cache ou reiniciar 
o navegador.


## Criando usuário no banco de dados

http://symfony.com/doc/current/security/entity_provider.html