<?php

class fizzBuzz {	
    public function getValue($input) {		
		$elements = explode(' ', $input);

        $f = $elements[0];
        $b = $elements[1];
        $n = $elements[2];
        
        $output = array(); 
        for($i = 1; $i <= $n; $i++) {
            $val = NULL;
            if (!($i % $f)) {
                $val = 'F';
            }

            if (!($i % $b)) {
                $val .= 'B';
            }
            
            $output[] = ($val) ? $val : $i;  
        }

        return implode(' ', $output);
    }
}

$class = new fizzBuzz();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
