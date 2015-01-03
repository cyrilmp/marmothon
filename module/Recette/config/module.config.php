<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'Recette\Controller\Recette' => 'Recette\Controller\RecetteController',
         ),
     ),
	 
     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'recette' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/recette[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Recette\Controller\Recette',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),
     'view_manager' => array(
         'template_path_stack' => array(
             'recette' => __DIR__ . '/../view',
         ),
     ),
 );
 ?>