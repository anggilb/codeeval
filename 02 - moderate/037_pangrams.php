<?php

class pangrams {
    public function getValue($input) {
        $letters = str_split(str_replace(' ', '',$input));
        $letters = array_unique(array_map('strtolower', $letters));
        
        $diff = array_diff(range('a', 'z'), $letters);
        
        return (count($diff)) ? implode($diff) : 'NULL';
    }
}

$class = new pangrams();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
