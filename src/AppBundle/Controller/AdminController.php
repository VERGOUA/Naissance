<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();

        if (empty($user) || !$user->hasRole('ROLE_ADMIN')) {
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

    public function loginCheckAction(Request $request)
    {
        if ($this->get('v.auth')->auth($request)) {
            return $this->redirect($this->generateUrl('admin_index'));
        }

        return $this->render('AppBundle:Admin\base:login.html.twig', array(
            // ...
        ));
    }

}
