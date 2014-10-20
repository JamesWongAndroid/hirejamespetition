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

        $body = new Zend_Form_Element_Textarea('message');
        $body->setLabel('Your Message:')
            ->setRequired(true)
            ->setAttrib('cols', '40')
            ->setAttrib('rows', '4');
        $this->addElement($body);

       

        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'class' => 'btn btn-lg btn-success',
            'label'    => 'Sign Petition',
        ));

        // CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));


    }


}

