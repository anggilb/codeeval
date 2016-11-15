<?php

class sortMatrixColumns {
    public function getValue($input) {
        $elements = explode(' | ', $input);
     
        $n = count($elements);
     
        $matrix = array();
        foreach($elements as $key => $item) {
            $matrix[] = explode(" ", $item);
        }

        //$params = array(&$matrix[0], &$matrix[1], &$matrix[2]);
        $params = array();
        for ($i = 0; $i < $n; $i++) {
            $params[] = &$matrix[$i];
        }

        call_user_func_array('array_multisort', $params);

        $output = array();
        foreach($matrix as $item) {
            $output[] = implode(' ', $item);
        }
       
        return implode(' | ', $output);
    }
}

$class = new sortMatrixColumns();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
