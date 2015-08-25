<?php

namespace SeGuiMo\CRMBundle\EventListener;

// ...

use Avanzu\AdminThemeBundle\Event\ShowUserEvent;
use SeGuiMo\CRMBundle\Model\UserModel;

use FOS\UserBundle\Doctrine\UserManager;

class UserShowListEvent {

    public function onShowUser(ShowUserEvent $event) {
    	
        //$user = $this->getUser();
        //$event->setUser($user);       

    }

    protected function getUser() {
        // retrieve your concrete user model or entity
        

    }

}