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
 * @ORM\Table(name="sonacl_roles")
 * @ORM\Entity(repositoryClass="SONAcl\Entity\RoleRepository")
 */
class Role {
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;
    /**
     * @ORM\OneToOne(targetEntity="SONAcl\Entity\Role")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;
    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;
    /**
     * @ORM\Column(type="boolean", name="is_admin")
     * @var boolean
     */
    protected $isAdmin;
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
        if(isset($this->parent))
            $parent = $this->parent->getId();
        else
            $parent = false;
            
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'isAdmin' => $this->isAdmin,
            'parent' => $parent
            
        );
    }
    
    function getId() {
        return $this->id;
    }

    function getParent() {
        return $this->parent;
    }

    function getNome() {
        return $this->nome;
    }

    function getIsAdmin() {
        return $this->isAdmin;
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

    function setParent($parent) {
        $this->parent = $parent;
        return $this;
    }

    function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
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

    public function __toString() {
        return $this->nome;
    }

}
