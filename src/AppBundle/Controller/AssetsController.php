<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AssetsController extends Controller
{
    /**
     * @Route("/assets/")
     */
    public function assets()
    {
        return $this->render('lucky/assets.html.twig', array());
    }
}