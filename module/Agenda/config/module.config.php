<?php

return array(
    'router' => array(
        'routes' => array(
            'agenda' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/agenda',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Agenda\Controller',
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
            'Agenda\Controller\Index' => 'Agenda\Controller\IndexController'
           
        ),
    ),
    
        
    'service_manager' => array(
        'invokables' => array(
    
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
            'agenda/index/index' => __DIR__ . '/../view/agenda/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            
            'agenda/index/teste' => __DIR__ . '/../view/agenda/index/teste.phtml',
            
          
         
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
