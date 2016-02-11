<?php

namespace SONAcl\Service;
/**
 * Description of Role
 *
 * @author gilson
 */
use SONBase\Service\AbstractService;
use Doctrine\ORM\EntityManager;
use Zend\Stdlib\Hydrator;

class Resource extends AbstractService
{
    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = "SONAcl\Entity\Resource";
        
        
    }
    
    
}
