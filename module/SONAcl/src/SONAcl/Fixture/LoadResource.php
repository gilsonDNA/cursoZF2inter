<?php

namespace SONAcl\Fixture;

/**
 * Description of LoadRole
 *
 * @author gilson
 */
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use SONAcl\Entity\Resource;

class LoadResource extends AbstractFixture implements OrderedFixtureInterface{
    
    public function load(ObjectManager $manager) {
       
        $resource = new Resource;
        $resource->setNome("Posts");
        
        $manager->persist($resource);
        
        $resource = new Resource;
        $resource->setNome("Página");
        
        $manager->persist($resource);
        
        $manager->flush();
        
    }

    public function getOrder() {
       return 2; 
    }

//put your code here
}
