# Manipulando dados

## Persistindo um produto...

http://symfony.com/doc/current/doctrine.html#persisting-objects-to-the-database

    // src/AppBundle/Controller/DefaultController.php

    // ...
    use AppBundle\Entity\Product;
    use Symfony\Component\HttpFoundation\Response;

    // ...
    public function createAction()
    {
        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish!');

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }


## Recuperando produto...

http://symfony.com/doc/current/doctrine.html#fetching-objects-from-the-database

    // src/AppBundle/Controller/DefaultController.php
    public function showAction($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productId
            );
        }

        // ... do something, like pass the $product object into a template
    }

Ao definir o repositório...

    $repository = $this->getDoctrine()->getRepository('AppBundle:Product');

Podemos buscar um registro pelo id...

    // query for a single product by its primary key (usually "id")
    $product = $repository->find($productId);

Podemos buscar por nome do campo...

    // dynamic method names to find a single product based on a column value
    $product = $repository->findOneById($productId);
    $product = $repository->findOneByName('Keyboard');

    // dynamic method names to find a group of products based on a column value
    $products = $repository->findByPrice(19.99);

Podemos listar os produtos...

    // find *all* products
    $products = $repository->findAll();

Podemos buscar um registro com dois parâmetros...

    // query for a single product matching the given name and price
    $product = $repository->findOneBy(
        array('name' => 'Keyboard', 'price' => 19.99)
    );

Podemos buscar vários registros e ordena-los...

    // query for multiple products matching the given name, ordered by price
    $products = $repository->findBy(
        array('name' => 'Keyboard'),
        array('price' => 'ASC')
    );


## Atualizando registro

http://symfony.com/doc/current/doctrine.html#updating-an-object

    // src/AppBundle/Controller/DefaultController.php
    public function updateAction($productId)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productId
            );
        }

        $product->setName('New product name!');
        $em->flush();

        return $this->redirectToRoute('homepage');
    }


## Removendo um registro

http://symfony.com/doc/current/doctrine.html#deleting-an-object

    // src/AppBundle/Controller/DefaultController.php
    public function deleteAction($productId)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productId
            );
        }
        $em->remove($product);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }