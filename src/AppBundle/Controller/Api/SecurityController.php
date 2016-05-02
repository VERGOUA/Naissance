<?php

namespace AppBundle\Controller\Api;

use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {
        return new JsonResponse([
            'success' => $this->get('v.auth')->auth($request)
        ]);
    }

    public function logoutAction()
    {
        $user = $this->getUser();

        $this->get('security.token_storage')->setToken(null);
        $this->get('session')->invalidate();

        return new JsonResponse([
            'success' => (bool)$user
        ]);
    }
}
