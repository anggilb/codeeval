<?php

class lostInTranslation {
    public function getValue($input) {
        $patterns = array(
            'a' => 'y',
            'b' => 'h',
            'c' => 'e',
            'd' => 's',
            'e' => 'o',
            'f' => 'c',
            'g' => 'v',
            'h' => 'x',
            'i' => 'd',
            'j' => 'u',
            'k' => 'i',
            'm' => 'l',
            'n' => 'b',
            'l' => 'g',
            'o' => 'k',
            'p' => 'r',
            'q' => 'z',
            'r' => 't',
            's' => 'n',
            't' => 'w',
            'u' => 'j',
            'v' => 'p',
            'w' => 'f',
            'x' => 'm',
            'y' => 'a',
            'z' => 'q',
            ' ' => ' '
        );
        
        $elements = str_split($input);
        
        $output = NULL;
        foreach($elements as $letter) {
            $output .= $patterns[$letter];
        }

        return $output;
    }
}
 
$class = new lostInTranslation();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $key => $line) {
	echo $class->getValue($line).PHP_EOL;
} 

?>