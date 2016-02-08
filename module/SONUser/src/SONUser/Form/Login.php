<?php
namespace SONUser\Form;
/**
 * Description of User
 *
 * @author gilson
 */

use Zend\Form\Form;

class Login extends Form{
    
    public function __construct($name = null, $options = array()) {
        parent::__construct('Login', $options);
        
        $this->setAttribute('method', 'post');
        
       
        
        $email =  new \Zend\Form\Element\Text('email');
        $email->setLabel("Email: ")
                ->setAttribute('placeholder' , 'Entre com o Email');
        $this->add($email);
        
        $password =  new \Zend\Form\Element\Text('password');
        $password->setLabel("Password: ")
                ->setAttribute('placeholder' , 'Entre com o senha');
        $this->add($password);
        
         
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Logar',
                'class' => 'btn-success'
            )
        ));
        
    }
    
}
