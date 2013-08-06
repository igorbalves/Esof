<?php

namespace Login\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class UserFace extends AbstractPlugin {
    
    protected $facebook;


    public function verificaLoginFace() {
     
        $facebook = new \Facebook( array(
    'appId' => '378511822274768',
    'secret' => 'c08cb0b2f4c0de6ca49186fd584ab7e8'
));
        $this->facebook=$facebook;
        $user = $facebook->getUser();
        return $user;
        

    }
    
    public function getFace() {
        return $this->facebook;
    }


    /* public function api($a) {
        return $this->facebook->api($a);
    }*/
    
    public function __call($name, $arguments=null) {
        return $this->facebook->$name($arguments);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    public function check($view,$usuarioService) {
         
        $user = $this->verificaLoginFace();
        if ($user) {
	
  
    $user_profile = $this->facebook->api('/me');
    $usuario = $usuarioService->check($user_profile['id']);
    
    if ($usuario!=null) {
                  $view->setVariables(array(
                      'user' => $usuario,
                  ));
                  $view->setTemplate('login/face/index');
                   return $view; 
                } else {
                    
                    $newUser = new \Login\Model\Usuario(null, $user_profile['id'], $user_profile['email'], $user_profile['name']);
                //    var_dump($newUser);
                    $r=$usuarioService->insert($newUser);
                

                $view->setVariables(array(
                    'id' => $r,
                    'user' => $newUser,
                ));

                $view->setTemplate('login/face/add');
                return $view;
                }

  

  
}else {
	
        $url = 
                $this->facebook->getLoginUrl(array(
        'scope' => 'email'
		));
  //echo '<a href="'. $url . '">Login com Facebook</a>';	
 // var_dump($url);
                         
           $view->setVariables(array(
                 'url' => $url,
           ));
           $view->setTemplate('login/face/index2');
           return $view;
           
}
    }
}
?>
