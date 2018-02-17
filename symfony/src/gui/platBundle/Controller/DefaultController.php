<?php

namespace gui\platBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('guiplatBundle:Default:index.html.twig');
    }
}
