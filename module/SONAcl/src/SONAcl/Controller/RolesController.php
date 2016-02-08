<?php

namespace SONAcl\Controller;

/**
 * Description of RolesController
 *
 * @author gilson
 */
use SONBase\Controller\CrudController;

class RolesController extends  CrudController{
    //put your code here
    public function __construct() {
        $this->entity = 'SONAcl\Entity\Role';
        $this->service = "SONAcl\Service\Role";
        $this->form = "SONAcl\Form\Role";
        $this->controller = "roles";
        $this->route = "sonacl-admin/default";
        
    }
}
