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



class IndexController extends AbstractActionController
{
    
    
    public function indexAction() {
        //echo 'index';
      //  $this->redirect()->toRoute('login/face');
       // return new ViewModel();
        //return $this->faceAction();
    }
    
    public function faceAction()
    {
        $view = new ViewModel();
        $face = $this->plugin('UserFace');
        $usuarioService = $this->getServiceLocator()->get('login_service_usuario');
        return $face->check($view,$usuarioService);
        
        
    
   
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
