<?php

class Application_Form_Petitionform extends Zend_Form
{

    public function init()
    {
        $this->setMethod('POST');

        $this->addElement('text', 'first_name', array(
        	'label' => 'First Name',));

        $this->addElement('text','last_name', array(
        	'label'		=> 'Last Name'));

        $this->addElement('text','email', array(
        	'label' 	=> 'Email Address',
        	'required'	=> true,
        	'filters'	=> array('StringTrim'),
        	'validators'	=> array('EmailAddress')
        	)); 

        $this->addElement('text', 'location', array(
        	'label'		=> 'Your Location'));

        $this->addElement('textarea', 'message', array(
        	'label'		=> 'Your Message: ',
        	'width'		=> '150',
        	'height'	=> '50'));

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sign Petition',
        ));

        // CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));


    }


}

