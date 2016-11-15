<?php

class stringList {
    private function _getCombinations($chars, $size, $combinations = array()) {
        if (empty($combinations)) {
            $combinations = $chars;
        }

        if ($size == 1) {
            return $combinations;
        }

        $new_combinations = array();

        foreach ($combinations as $combination) {
            foreach ($chars as $char) {
                $new_combinations[] = $combination . $char;
            }
        }

        return $this->_getCombinations($chars, $size - 1, $new_combinations);
    }
    
    public function getValue($input) {
        $elements = explode(',', $input);
        $n = $elements[0];

        $letters = array_unique(str_split($elements[1]));

        sort($letters);

        $output = $this->_getCombinations($letters, $n);
        return implode(',', $output);
    }
}

$class = new stringList();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
