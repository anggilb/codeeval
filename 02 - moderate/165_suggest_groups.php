<?php

//class suggestGroups {
	//private $_contacts = array();
	$_contacts = array();
 
	//private function _getAllGroups() {  
	function _getAllGroups() {  
    	$all_groups = array();
    	global $_contacts;
    	//foreach ($this->_contacts as $item) {
    	foreach ($_contacts as $item) {
        	if (!empty($item['g'][0])) {
            	$all_groups = array_merge($item['g'], $all_groups);
        	}
    	}
    	$all_groups = array_unique($all_groups);
    	sort($all_groups);
    	return $all_groups;
	}
 
	//public function parse($input) {   
	function parse($input) {
		global $_contacts;
   		$elements = explode(':', $input);
    	$friends = explode(',', $elements[1]);
    	$groups= explode(',', $elements[2]);
    	
    	//$this->_contacts[$elements[0]] = array('f' => $friends, 'g' => $groups);
    	$_contacts[$elements[0]] = array('f' => $friends, 'g' => $groups);
	}
 
 	//public function getResult() {
 	function getResult() {
 		global $_contacts;
 	
		//$all_groups = $this->_getAllGroups();
		$all_groups = _getAllGroups();

		$values = array();
		//foreach ($this->_contacts as $kcontact => $contact) {
		foreach ($_contacts as $kcontact => $contact) {
    		$values[$kcontact] = array();
    		foreach($all_groups as $group) {
        		if (!in_array($group, $contact['g'])) {
            		$values[$kcontact][$group] = 0;
        		}
    		}
		}

		//foreach($this->_contacts as $kcontact => $contact) {
		foreach($_contacts as $kcontact => $contact) {
    		foreach($contact['f'] as $friend) {
        		foreach($all_groups as $group) {
            		//if (!in_array($group, $contact['g']) && in_array($group, $this->_contacts[$friend]['g'])) {
            		if (!in_array($group, $contact['g']) && in_array($group, $_contacts[$friend]['g'])) {
                		$values[$kcontact][$group] += 1;
            		}
        		}
    		}
		}
 
		$output = array();
		foreach($values as $kcontact => $contact) {
    		//$num_friends = count($this->_contacts[$kcontact]['f']);
    		$num_friends = count($_contacts[$kcontact]['f']);
    		foreach($contact as $key => $item) {
        		if ((1 / 2) > ($item  / $num_friends)) {
            		unset($values[$kcontact][$key]);
        		}
    		}

    		if (count($values[$kcontact])) {
        		echo $kcontact.':'.implode(',', array_keys($values[$kcontact])).PHP_EOL;
    		}
    	}
    }
//}

//$class = new suggestGroups();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	//$class->parse($line);
	parse($line);
}

//$class->getResult();
getResult();

?>
