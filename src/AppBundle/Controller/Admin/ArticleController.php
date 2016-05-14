<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\Controller;
use AppBundle\Entity\Article;
use AppBundle\Entity\Model;
use AppBundle\Form\Type\ArticleType;
use Doctrine\ORM\EntityManager;
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
        $form = $this->createForm(ArticleType::class, null, [
            'action' => $this->generateUrl('admin_article_save'),
            'method' => 'POST',
        ]);

        return $this->render(
            'AppBundle:Admin\article:edit.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }

    public function saveAction(Request $request)
    {
        /* @var $form Form */
        $form = $this->createForm(ArticleType::class);

        $form->handleRequest($request);

        /* @var $entity Article */
        $entity = $form->getData();

        $now = new \DateTime();

        $entity
            ->setUser($this->getUser())
            ->setCreated($now)
            ->setUpdated($now)
            ->setViewCount(0)
            ->setStatus(Model::STATUS_PENDING);

        /* @var $manager EntityManager */
        $manager = $this->get('doctrine')->getManager();
        $manager->persist($entity);
        $manager->flush($entity);

        return $this->redirect($this->generateUrl('admin_article_index'));
    }
}
