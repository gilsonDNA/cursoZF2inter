<?php

namespace SONUser\Controller;
/**
 * Description of UsersController
 *
 * @author gilson
 */
class UsersController extends CrudController
{
    public function __construct() 
    {
        $this->entity = 'SONUser\Entity\User';
    }
}
