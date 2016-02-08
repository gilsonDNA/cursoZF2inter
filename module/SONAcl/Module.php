<?php


namespace SONAcl;


use Zend\Mvc\MvcEvent;

use Zend\ModuleManager\ModuleManager;

class Module
{
    

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
   
    
    public function getServiceConfig(){
        
        return array(
            'factories' => array(
                'SONAcl\Form\Role' => function($sm){
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    $repo = $em->getRepository('SONAcl\Entity\Role');
                    $parent = $repo->fetchParent();
                    
                    return new Form\Role('role', $parent);
                },
                
                'SONAcl\Service\Role' => function($sm){
                    return new Service\Rersource($sm->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }
    
    
}
