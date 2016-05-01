<?php

namespace Tests\AppBundle\Controller\Api;

use AppBundle\Entity\User;

class SecurityControllerTest extends ApiAbstractControllerTest
{
    protected function setUp()
    {
        parent::setUp();

        $container = static::$kernel->getContainer();

        $container->get('rqs.database.tester')->clear();

        $userManager = $container->get('fos_user.user_manager');
        /* @var $user User */
        $user = $userManager->createUser();

        $user
            ->setUsername('admin')
            ->setEmail('ReenExe@github.com')
            ->setPlainPassword('empty')
            ->setRoles(['ROLE_ADMIN'])
            ->setUpdated(new \DateTime());

        $userManager->updateUser($user);
    }

    public function test()
    {
        $this->client->request('POST', '/api/login');

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertResponse([
            'success' => false
        ]);

        $this->client->request('POST', '/api/login', [
            'username' => 'admin',
            'password' => 'empty',
        ]);

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertResponse([
            'success' => true
        ]);

        $this->client->request('POST', '/api/logout');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertResponse([
            'success' => true
        ]);

        $this->client->request('POST', '/api/logout');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
        $this->assertResponse([
            'success' => false
        ]);
    }
}
