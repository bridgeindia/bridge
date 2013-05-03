<?php

/*
 * to send individual mail
 */
namespace Onestop\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class ContactForm extends Form
{
    public function  __construct($name = null)
    {
        parent::__construct('onestop');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'mail_to_receiver',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'options' => array(
				  'Positive feedback' => 'Positive feedback',
				  'Complaint'         => 'Complaint',
				  'Additional Info'   => 'Additional Info'
             )),
             'options' => array(
                 'label' => 'Select Query Type'
             )
            
        ));
       
        $this->add(array(
            'name' => 'mail_sender',
            'attributes' => array(
                'type' => 'text'
            ),
            'options' => array(
                'label' => 'Name'
            )
        ));
        $this->add(array(
            'name' => 'mail_content',
            'attributes' => array(
                'type' => 'textarea'
            ),
            'options' => array(
                'label' => 'Message'
            )
        ));
        $this->add(array(
            'name' => 'mail_send',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Send'
            ),
            
        ));
    }
   
}
?>
