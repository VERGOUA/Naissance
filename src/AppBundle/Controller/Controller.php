<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as FrameworkBundleController;

class Controller extends FrameworkBundleController
{
    /**
     * @return User|null
     */
    public function getUser()
    {
        return $this->get('doctrine')->getRepository('AppBundle:User')->find(1);

        return parent::getUser();
    }
}
