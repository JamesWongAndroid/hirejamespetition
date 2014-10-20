<?php

class Application_Model_PetitionList
{
	//Create get/set variables

	protected $_userid;
	protected $_first_name;
	protected $_last_name;
	protected $_email;
	protected $_location;
	protected $_message;

	// a constructor that allows setting of all props (?)
	public function __construct(array $options = null) {
		if(is_array($options)) {
			$this->setOptions($options);
		}
	}

	// a default setter
	public function __set($name, $value) {
		$method = 'set' . $name;
		if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid petitionlist property');
        }
        $this->$method($value);
    }
 
 	// a default getter
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid petitionlist property');
        }
        return $this->$method();
    }

    // setting properties from an array (?)
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }


    public function setUserid($id)
    {
    	$this->_userid = (int) $id;
    }
    
    public function getUserid()
    {
    	return $this->_userid;
    }
    
    public function setFirst_Name($text)
    {
    	$this->_first_name = (string) $text;
    }
    
    public function getFirst_Name()
    {
    	return $this->_first_name;
    }
    
    public function setLast_Name($text)
    {
    	$this->_last_name = (string) $text;
    }
    
    public function getLast_Name()
    {
    	return $this->_last_name;
    }
    
    public function setEmail($text)
    {
    	$this->_email = (string) $text;
    }
    
    public function getEmail()
    {
    	return $this->_email;
    }

    public function setLocation($text) {
    	$this->_location = (string) $text;
    }

    public function getLocation() {
    	return $this->_location; 
    }

    public function setMessage($text)
    {
    	$this->_message = (string) $text;
    }
    
    public function getMessage()
    {
    	return $this->_message;
    }



}

