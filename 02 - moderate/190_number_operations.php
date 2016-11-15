<?php

class numberOperations {
    public function getValue($input) {
		$vals = explode(' ', $input);
		
		$perms = $this->_permute($vals);
		$ops = array('+', '-', '*');

		foreach($perms as $perm) {
		    $item = array_values($perm);

			foreach($ops as $op1) {
			    foreach($ops as $op2) {
				    foreach($ops as $op3) {
					    foreach($ops as $op4) {
						    eval("\$value = (((($item[0] $op1 $item[1]) $op2 $item[2]) $op3 $item[3]) $op4 $item[4]);");

						    if (42 === $value) {
						    	return 'YES';
						    }
					    }
				    }
			    }
			}
		}

		return 'NO';
    }
    
    private function _permute($inArray, $inProcessedArray = array()) {
        $returnArray = array();
        foreach($inArray as $Key=>$value) {
            $copyArray = $inProcessedArray;
            $copyArray[$Key] = $value;
            $tempArray = array_diff_key($inArray, $copyArray);
            if (count($tempArray) == 0) {
                $returnArray[] = $copyArray;
            } else {
                $returnArray = array_merge($returnArray, $this->_permute($tempArray, $copyArray));
            }
        }
        return $returnArray;
    }
}

$class = new numberOperations();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>