<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Login\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use \Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\PluginManager;



class FaceController extends AbstractActionController
{
    
    
 //   public function indexAction() {
      //  $this->redirect()->toRoute('login/face');
       // return new ViewModel();
   //    return $this->redirect()->toUrl('/login/face/face');
  //  }
    
    public function indexAction()
    {
        
       
        $view = new ViewModel();
        $face = $this->plugin('UserFace');
        $user = $face->verificaLoginFace();
        if ($user) {
	

	  
    $user_profile = $face->getFace()->api('/me');

    $usuarioService = $this->getServiceLocator()->get('login_service_usuario');
    $usuario = $usuarioService->check($user_profile['id']);
    
    if ($usuario!=null) {
                  $view->setVariables(array(
                      'user' => $usuario,
                  ));
                  $view->setTemplate('login/face/index');
                   return $view; 
                } else {
                    
                    $newUser = new \Login\Model\Usuario(null, $user_profile['id'], $user_profile['email'], $user_profile['name']);
                
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
                $face->getFace()->getLoginUrl(array(
        'scope' => 'email'
		));
  echo '<a href="'. $url . '">Login com Facebook</a>';	
 // var_dump($url);
                         
         //  $view->setVariables(array(
         //        'url' => $url,
         //  ));
         //  
         $this->redirect()->toUrl($url);
       //   $view->setTemplate('login/face/index2');
       //    return $view;
}

        
        /*
        $view = new ViewModel();
        $face = $this->plugin('UserFace');
        $user = $face->verificaLoginFace();

        
        if ($user) {
          var_dump($user);
                $user_profile = $face->api('/me');
                var_dump($user_profile);
                $usuarioService = $this->getServiceLocator()->get('login_service_usuario');
                $usuario = $usuarioService->check($user_profile['id']);


                if ($usuario!=null) {
                  $view->setVariables(array(
                      'user' => $usuario,
                  ));
                  $view->setTemplate('login/index/index');
                   return $view; 
                } else {
                    
                    $newUser = new \Login\Model\Usuario(null, $user_profile['id'], $user_profile['email'], $user_profile['name']);
                    //var_dump($newUser);
                    //$r=$usuarioService->insert($newUser);
                

                $view->setVariables(array(
                    'id' => $r,
                    'user' => $newUser,
                ));

                $view->setTemplate('login/index/add');
                return $view;
                }
         }else {
           $url = $face->getLoginUrl(array(
                 'scope' => 'email'
                         ));
           var_dump($url);
                         
           $view->setVariables(array(
                 'url' => $url,
           ));
           $view->setTemplate('login/index/index2');
           return $view;
         }
         */
    } // fim indexAction
    
   
public function setPluginManager(PluginManager $plugins)
{
    $this->plugins = $plugins;
    $this->plugins->setController($this);

    return $this;
}

public function getPluginManager()
{
    if (!$this->plugins) {
        $this->setPluginManager(new PluginManager());
    }

    return $this->plugins;
}

public function plugin($name, array $options = null)
{
    return $this->getPluginManager()->get($name, $options);
}    
}

