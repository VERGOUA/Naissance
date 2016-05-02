<?php

namespace AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class AuthService
{
    use ContainerAwareTrait;

    public function auth(Request $request)
    {
        $username = $request->request->get('username');
        $password = $request->request->get('password');

        if (empty($username) || empty($password)) {
            return false;
        }

        /* @var $user User */
        $user = $this->container
            ->get('fos_user.user_manager')
            ->findUserByUsernameOrEmail($username);

        if (empty($user)) {
            return false;
        }

        $isValid = $this->container
            ->get('security.encoder_factory')
            ->getEncoder($user)
            ->isPasswordValid(
                $user->getPassword(),
                $password,
                $user->getSalt()
            );

        if (empty($isValid)) {
            return false;
        }

        $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
        $this->container->get('security.token_storage')->setToken($token);
        $this->container->get('session')->set('_security_main', serialize($token));

        return true;
    }
}
