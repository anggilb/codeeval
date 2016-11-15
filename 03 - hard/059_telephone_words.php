<?php

class telephoneWords {
    private function _getCombinations(array $data,
            array &$all = array(), array $group = array(), $value = null, $i = 0) {
        $keys = array_keys($data);
        if (isset($value) === true) {
            array_push($group, $value);
        }
   
        if ($i >= count($data)) {
            array_push($all, $group);
        } else {
            $currentKey     = $keys[$i];
            $currentElement = $data[$currentKey];
            foreach ($currentElement as $val) {
                $this->_getCombinations($data, $all, $group, $val, $i + 1);
            }
        }
   
        return $all;
    }
   
    public function getValue($input) {
        $patterns = array(
            array('0'),
            array('1'),
            array('a', 'b', 'c'),
            array('d', 'e', 'f'),
            array('g', 'h', 'i'),
            array('j', 'k', 'l'),
            array('m', 'n', 'o'),
            array('p', 'q', 'r', 's'),
            array('t', 'u', 'v'),
            array('w', 'x', 'y', 'z')
        );
 
        $comb = array();
        foreach(str_split($input) as $letter) {
            $comb[] = $patterns[$letter];
        }
 
        $output = $this->_getCombinations($comb);
 
        $output = array_map(function($val) {return implode($val);}, $output);
        return implode(',', $output);
    }
}
 
$class = new telephoneWords();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
