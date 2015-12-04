<?php
namespace SONUser\Fixture;
/**
 * Description of LoadUser
 *
 * @author gilson
 */

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

use SONUser\Entity\User;

class LoadUser extends AbstractFixture{
   
    public function load(ObjectManager $manager) {
        $user = new User();
        $user->setNome("Gilson Anselmo de Araujo")
                ->setEmail("gilson@idnadevendas.com.br")
                ->setPassword(12345)
                ->setActive(true);
        
        $manager->persist($user);
        
         $user = new User();
        $user->setNome("Admin")
                ->setEmail("admin@idnadevendas.com.br")
                ->setPassword(123456)
                ->setActive(true);
        
        $manager->persist($user);
        
        $manager->flush();
    }

    
}
