<?php

namespace SONAcl\Controller;

/**
 * Description of RolesController
 *
 * @author gilson
 */
use SONBase\Controller\CrudController;
use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class ResourcesController extends  CrudController{
    //put your code here
    public function __construct() {
        $this->entity = 'SONAcl\Entity\Resource';
        $this->service = "SONAcl\Service\Resource";
        $this->form = "SONAcl\Form\Resource";
        $this->controller = "resources";
        $this->route = "sonacl-admin/default";
        
    }
    
    
    
}
