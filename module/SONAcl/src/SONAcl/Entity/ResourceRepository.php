<?php

namespace SONAcl\Entity;

/**
 * Description of PrivilegeRepository
 *
 * @author gilson
 */

use Doctrine\ORM\EntityRepository;

class ResourceRepository extends EntityRepository{
    //put your code here
    public function fetchPairs(){
        $entities = $this->findAll();
        $array = array();
        foreach ($entities as $entity){
            $array[$entity->getId()] = $entity->getNome();
        }
        
        return $array;
    }
}
