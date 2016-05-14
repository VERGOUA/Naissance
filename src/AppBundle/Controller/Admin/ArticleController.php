<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'AppBundle:Admin\article:index.html.twig',
            [
                'collection' => []
            ]
        );
    }
}
