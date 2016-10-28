# Criando um Bundle

O Symfony trabalha com componentes chamados de `Bundles`, que é uma pasta contendo todos
os arquivos (PHP, Javascript, CSS e etc) necessário para um componente funcionar.

Para criar Bundles automaticamente utilizamos o comando...

    php bin/console generate:bundle

Ao executar este comando será disparado algumas perguntas sobre a configuração e o nome do 
componente que está sendo criado.

Após confirmar responder as perguntas o Bundle será criado na pasta `src` do seu projeto e o 
Bundle será registrado no arquivo `app/AppKernel.php`
