<?php

return array(
    'router' => array(
        'routes' => array(
            'login' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Login\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
   
    'controllers' => array(
        'invokables' => array(
            'Login\Controller\Index' => 'Login\Controller\IndexController',
            'Login\Controller\Face' => 'Login\Controller\FaceController'
        ),
    ),
    
    'controller_plugins' => array(
        'invokables' => array(
            'UserFace' => 'Login\Controller\Plugin\UserFace',
        )
    ),
    
    'service_manager' => array(
        'invokables' => array(
            'login_mapper_usuario' => 'Login\Mapper\Usuario',
            'login_service_usuario' => 'Login\Service\Usuario',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'login/index/index' => __DIR__ . '/../view/login/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            
            'login/face/index' => __DIR__ . '/../view/login/face/index.phtml',
            'login/face/index2' => __DIR__ . '/../view/login/face/index2.phtml',
            'login/face/add' => __DIR__ . '/../view/login/face/add.phtml',
          
         
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
