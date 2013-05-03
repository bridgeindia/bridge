<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Model\Contactmodel; 
use Application\Form\ContactForm;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendmailTransport;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
	
	public function contactformAction()
    {
        
		$form = new ContactForm();
		
		$request = $this->getRequest();
		
		  
        if($request->isPost())
        {
		  $contact = new Contactmodel();
		  $form->setInputFilter($contact->getInputFilter());
          $form->setData($request->getPost());
		  
		  
			if($form->isValid())
            {
			  $postData = $request->getPost();
			  
			      $email    = $postData->email;
				  $body     = $postData->feedback;
				  $subject  = "VPS cash test feedback";
				  
				  $message = new Message();
				  $message->addFrom("info@vpscash.com", "VPS")
		        ->addTo($email)
		        ->setSubject("VPS Cash feedback");
		        $message->setBody($body);
				
				$transport = new SendmailTransport();
				
				 $sent = true;
				 try {
				  $transport->send($message);
				 }
				 catch (Exception $e) {
				  $sent = false;
				 }
				if($sent==true)
				{
					//$this->view->sucessMessage = "Your feedback has been sent";
					$this->flashMessenger()->addMessage('Thank you for your comment!');
					 //set flash message
                    return $this->redirect()->toRoute('thankyou');
					
					
					  
				}
				else
				{
				    $this->flashMessenger()->addMessage('There has been a problem sending your feedback. Please try again later!');
					return $this->redirect()->toRoute('failure');
					//$this->flashMessenger()->addMessage('There has been a problem sending your feedback. PLeas try again later');
					
				}
		 
			}
			
		
		}
		return array('form' => $form);
    }
	
	 
	 
	 public function thankyouAction()
	 {
	     return array(
        'blog' => $blog,
        'comments' => $comments,
        'flashMessages' => $this->flashMessenger()->getMessages()
    );
	 	//return new ViewModel();
	 }
	 
	 public function messagefailureAction()
	 {
	 	 return array(
        'blog' => $blog,
        'comments' => $comments,
        'flashMessages' => $this->flashMessenger()->getMessages()
    );
	 }
}
