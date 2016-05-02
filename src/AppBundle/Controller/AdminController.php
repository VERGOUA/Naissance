<?php

namespace AppBundle\Controller;

class AdminController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();

        if (empty($uaer) || !$user->hasRole('ROLE_ADMIN')) {
            return $this->redirect($this->generateUrl('admin_login'));
        }

        return $this->render('AppBundle:Admin\base:index.html.twig', array(
            // ...
        ));
    }

    public function loginAction()
    {
        return $this->render('AppBundle:Admin\base:login.html.twig', array(
            // ...
        ));
    }

    public function loginCheckAction()
    {

    }

}
