<?php
namespace SONUser\Auth;

/**
 * Description of Adapter
 *
 * @author gilson
 */

use Zend\Authentication\Adapter\AdapterInterface,
    Zend\Authentication\Result;

use Doctrine\ORM\EntityManager;

class Adapter implements AdapterInterface{
    
    protected $em;
    protected $username;
    protected $password;
    
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }
            
    function getEm() {
        return $this->em;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setEm($em) {
        $this->em = $em;
        return $this;
    }

    function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    public function authenticate() {
        
        $repository = $this->em->getRepository("SONUser\Entity\User");
        $user = $repository->findByEmailAndPassword($this->getUsername(), $this->getPassword());
        
        
        
        if($user){
            return new Result(Result::SUCCESS, array('user' => $user) , array('OK'));
        }else{
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
         }
    }

}
