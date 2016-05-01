<?php

namespace Tests\AppBundle\Controller\Api;

use AppBundle\Entity\User;

class SecurityControllerTest extends ApiAbstractControllerTest
{
    protected function setUp()
    {
        parent::setUp();

        $container = static::$kernel->getContainer();

        $userManager = $container->get('fos_user.user_manager');
        /* @var $user User */
        $user = $userManager->createUser();

        $user
            ->setUsername('admin')
            ->setPlainPassword('empty')
            ->setRoles(['ROLE_ADMIN']);

        $userManager->updateUser($user);
    }

    public function test()
    {

    }
}
