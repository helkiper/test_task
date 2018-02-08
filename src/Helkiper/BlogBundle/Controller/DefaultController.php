<?php

namespace Helkiper\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@HelkiperBlog/Default/index.html.twig');
    }
}
