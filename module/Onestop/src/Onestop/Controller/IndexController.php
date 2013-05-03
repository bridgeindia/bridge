<?php

/*
 * Controller file for adding, editing, deleting 
 * and viewing the categories
 */
namespace Onestop\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
  
use Onestop\Form\Contact\Form;

class IndexController extends AbstractActionController
{
	protected $cochinTable;

    public function indexAction()
    {
         
        $form = new ContactForm();
    }
	
	public function aboutusAction()
	{
		return new ViewModel();
	}
    public function sendAction()
    {
        $form = new ContactForm();
        $form = $this->getServiceLocator()->get('Admin\Form\ContactForm');
        $request= $this->getRequest();
        if($request->isPost()){
            $this->sendMessage($form, $request);
        }
        return array(
            'form' => $form
        );
    }
   
}

?>
