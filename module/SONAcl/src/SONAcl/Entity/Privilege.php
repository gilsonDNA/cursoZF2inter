<?php
namespace SONAcl\Entity;

/**
 * Description of Role
 *
 * @author gilson
 */

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="sonacl_privileges")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\PrivilegeRepository")
 */
class Privilege {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    
    
    /**
     * @ORM\OneToOne(targetEntity="SONAcl\Entity\Role")
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    protected $role;
    
     /**
     * @ORM\OneToOne(targetEntity="SONAcl\Entity\Resource")
     * @ORM\JoinColumn(name="resource_id", referencedColumnName="id")
     */
    protected $resource;
    
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;
     /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;
    
    
    public function __construct($options = array()) {
        (new Hydrator\ClassMethods)->hydrate($options, $this);
        $this->createdAt = new \DateTime("now");
        $this->updatedAt = new \DateTime("now");
    }
    
    public function toArray(){
        return array(
          'id' => $this->id,
            'nome' => $this->nome,
            'role' => $this->role->getId(),
            'resource' => $this->resource->getId()
        );
    }
    
    function getId() {
        return $this->id;
    }

    

    function getNome() {
        return $this->nome;
    }

    

    function getCreatedAt() {
        return $this->createdAt;
    }

    function getUpdatedAt() {
        return $this->updatedAt;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    

    function setCreatedAt() {
        $this->createdAt = new \Datetime("now");
        return $this;
    }

    /**
     * 
     * @ORM\PrePersist
     */
    function setUpdatedAt() {
        $this->updatedAt = new \Datetime("now");
        return $this;
    }
    function getRole() {
        return $this->role;
    }

    function getResource() {
        return $this->resource;
    }

    function setRole($role) {
        $this->role = $role;
        return $this;
    }

    function setResource($resource) {
        $this->resource = $resource;
        return $this;
    }



}
