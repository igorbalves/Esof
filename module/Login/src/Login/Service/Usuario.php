<?php

namespace Login\Service;

class Usuario extends \JVBase\Service\AbstractService
{
    protected $entityMapper = 'login_mapper_usuario';
    
    
    public function check($uid) {
        return $this->findOneBy(array(
          'uid' => $uid,
           ),null,'object');
    }
}
