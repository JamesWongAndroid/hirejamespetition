<?php

class Application_Model_PetitionListMapper
{
	// saves the table in a protected variable
	protected $_dbTable;

	// a getter and setter for a table
	public function setDbTable($dbTable) {
		if(is_string($dbTable)) {
			$dbTable = new $dbTable();
		}
		if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
	}

	public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_PetitionList');
        }
        return $this->_dbTable;
    }

    public function save(Application_Model_DbTable_PetitionList $petitionlist)
    {
    	$data = array(
    		'first_name' => $petitionlist->getFirst_Name(),
    		'last_name' => $petitionlist->getLast_Name(),
    		'email' => $petitionlist->getEmail(),
    		'location' => $petitionlist->getLocation(),
    		'message' => $petitionlist->getMessage()
    		);

    	if(null === ($id = $petitionlist->getUserid())) {
    		unset($data['userid']);
    		$this->getDbTable()->insert($data);
    	} else {
    		$this->getDbTable()->update($data, array('userid = ?' => $id));
    	}
    }


}

