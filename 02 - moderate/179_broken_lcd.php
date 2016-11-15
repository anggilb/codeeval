<?php

class brokenLCD {
    const PATTERNS = array(
        0  => array(1, 1, 1, 1, 1, 1, 0, 0),
        1  => array(0, 1, 1, 0, 0, 0, 0, 0),
        2  => array(1, 1, 0, 1, 1, 0, 1, 0),
        3  => array(1, 1, 1, 1, 0, 0, 1, 0),
        4  => array(0, 1, 1, 0, 0, 1, 1, 0),
        5  => array(1, 0, 1, 1, 0, 1, 1, 0),
        6  => array(1, 0, 1, 1, 1, 1, 1, 0),
        7  => array(1, 1, 1, 0, 0, 0, 0, 0),
        8  => array(1, 1, 1, 1, 1, 1, 1, 0),
        9  => array(1, 1, 1, 0, 0, 1, 1, 0),
        10 => array(1, 1, 1, 1, 1, 1, 0, 1),
        11 => array(0, 1, 1, 0, 0, 0, 0, 1),
        12 => array(1, 1, 0, 1, 1, 0, 1, 1),
        13 => array(1, 1, 1, 1, 0, 0, 1, 1),
        14 => array(0, 1, 1, 0, 0, 1, 1, 1),
        15 => array(1, 0, 1, 1, 0, 1, 1, 1),
        16 => array(1, 0, 1, 1, 1, 1, 1, 1),
        17 => array(1, 1, 1, 0, 0, 0, 0, 1),
        18 => array(1, 1, 1, 1, 1, 1, 1, 1),
        19 => array(1, 1, 1, 0, 0, 1, 1, 1)
    );
   
    public function getValue($input) {
        list($elements, $number) = explode(';', $input);
       
        $display = explode(' ', $elements);
       
        $digits = array();
        foreach(str_split($number) as $key => $digit) {
            if ($digit == '.') {
                $digits[$key - 1] += 10;
            } else {
                $digits[] = (int) $digit;
            }
        }
 
        for($i = 0; $i <= (12 - count($digits)); $i++) {
            $flag = true;
            foreach($digits as $key => $digit) {
                $correct = self::PATTERNS[$digit];
                $toTry = str_split($display[$key + $i]);
                if (!(array_sum(array_intersect_assoc($correct, $toTry)) == array_sum($correct))) {
                    $flag = false;
                }
            }
 
            if ($flag) {
                return '1';
            }
        }
 
        return '0';
    }
}

$class = new brokenLCD();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
