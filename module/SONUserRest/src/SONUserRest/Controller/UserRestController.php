<?php

namespace SONUserRest\Controller;

/**
 * Description of UserRestController
 *
 * @author gilson
 */
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class UserRestController extends AbstractRestfulController{
   
    //Listar - GET
    public function getList(){
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $repo = $em->getRepository("SONUser\Entity\User");
        
        $data = $repo->findArray();
     
        return new JsonModel(array('data'=>$data));

    }
    //get - GET
    public function get($id){
        $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
        $repo = $em->getRepository("SONUser\Entity\User");
        
        $data = $repo->find($id)->toArray();
        
        return new JsonModel(array('data'=>$data));
    }
    //insert - POST
    public function create($data) {
        $userService = $this->getServiceLocator()->get("SONUser\Service\User");
        if ($data) {
            $user = $userService->insert($data);
            if ($user) {
                return new JsonModel(array('data' => array('id' => $user->getId(), 'success' => true)));
            } else {

                return new JsonModel(array('data' => array('success' => false)));
            }
        } else
            return new JsonModel(array('data' => array('success' => false)));
    }

    //update - PUT
    public function update($id, $data) {
        $data['id'] = $id;
        $userService = $this->getServiceLocator()->get("SONUser\Service\User");

        if ($data) {
            $user = $userService->update($data);
            if ($user) {
                return new JsonModel(array('data' => array('id' => $user->getId(), 'success' => true)));
            } else {

                return new JsonModel(array('data' => array('success' => false)));
            }
        } else
            return new JsonModel(array('data' => array('success' => false)));
    }

    //delete - delete
    public function delete($id) {
        $userService = $this->getServiceLocator()->get("SONUser\Service\User");
        $res = $userService->delete($id);

        if ($res) {
            return new JsonModel(array('data' => array('success' => true)));
        } else
            return new JsonModel(array('data' => array('success' => false)));
    }

}
