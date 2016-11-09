<?php

namespace GameInLyonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GameInLyonBundle:Default:index.html.twig');
    }
}
