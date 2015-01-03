<?php
namespace Recette;

 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;
 use Recette\Model\Recette;
 use Recette\Model\RecetteTable;
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }
 
 
 public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'Recette\Model\RecetteTable' =>  function($sm) {
                     $tableGateway = $sm->get('RecetteTableGateway');
                     $table = new RecetteTable($tableGateway);
                     return $table;
                 },
                 'RecetteTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Recette());
                     return new TableGateway('recette', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
	}
}
 ?>