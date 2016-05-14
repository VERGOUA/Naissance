<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\Controller;
use AppBundle\Form\Type\ArticleType;
use Symfony\Component\Form\Form;
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

    public function addAction()
    {
        /* @var $form Form */
        $form = $this->createForm(ArticleType::class);

        return $this->render(
            'AppBundle:Admin\article:edit.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
