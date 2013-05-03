<?php

/*
 * To add category details
 */
namespace Application\Form;

use Zend\Form\Form;
use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Fieldset;

class ContactForm extends Form
{
    public function __construct($name= null)
    {
        parent::__construct('application');
        $this->setAttribute('method', 'post');
       
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
				'class'  => 'contactform'
            ),
            'options'=> array(
                'label' => 'Email',
				 
            ),
        ));
		 $this->add(array(
            'name' => 'feedback',
            'attributes' => array(
                'type' => 'textarea',
				'class'  => 'feedform'
            ),
            'options'=> array(
                'label' => 'Feedback',
            ),
        ));
	
		
		
		
        $this->add(array(
            'name' => 'ContactSub',
            'attributes' => array(
                'type' => 'submit',
				'value' => 'Contact Us',
            ),
            'options' => array(
                'label' => 'Contact Us'
                
            ),
        ));
    }
    
    
}
?>
