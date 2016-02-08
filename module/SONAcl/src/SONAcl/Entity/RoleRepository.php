<?php

namespace SONAcl\Entity;

/**
 * Description of PrivilegeRepository
 *
 * @author gilson
 */

use Doctrine\ORM\EntityRepository;

class RoleRepository extends EntityRepository{
    //put your code here
    
    public function fatchParent(){
        $entity = $this->findAll();
        $array = array();
        
        foreach ($entity as $entity){
            $array[$entity->getId()] = $entity->getNome();
        }
        
        return $array;
    }
}
