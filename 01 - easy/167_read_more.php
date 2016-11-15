<?php

class readMore {
    public function getValue($input) {
		$num_chars = strlen($input);
		
		if ($num_chars <= 55) {
			return $input;
		} else {
			$section = substr($input, 0, 40);
			
    		if (false !== strpos($section, ' ')) {
        		$section = trim(substr($section, 0, strrpos($section, ' ')));
    		}
			
			return $section.'... <Read More>';
		}
    }	
}

$class = new readMore();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;