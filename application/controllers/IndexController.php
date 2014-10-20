<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $request = $this->getRequest();
        $form = new Application_Form_Petitionform();

        if ($request->isPost()) {
        	if ($form->isValid($request->getPost())) {
        		$petitionlist = new Application_Model_PetitionList($form->getValues());
        		$mapper = new Application_Model_PetitionListMapper();
        		$mapper->save($petitionlist);

        		
        	}
        }

        $this->view->form = $form;
    }


}

