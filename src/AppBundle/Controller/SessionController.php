<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    /**
     * @Route("/add/session")
     */
    public function addSession(Request $request)
    {
        $session = $request->getSession();

        // store an attribute for reuse during a later user request
        $session->set('foo', 'bar');

        // get the attribute set by another controller in another request
        $foobar = $session->get('foo');
        var_dump($foobar);

        // use a default value if the attribute doesn't exist
        $filters = $session->get('foo', array());
        var_dump($filters);

        var_dump($session->all());
        return new Response(
            '<html><body></body></html>'
        );
    }
}