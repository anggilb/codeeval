<?php

class blackOrWhite {
    private $_patterns = array(
        2 => array(),
        3 => array(),
        4 => array(2),
        5 => array(),
        6 => array(2, 3),
        7 => array(),
        8 => array(2, 4),
        9 => array(3),
        10 => array(2, 5),
        11 => array(),
        12 => array(2, 3, 4, 6),
        13 => array(),
        14 => array(2, 7),
        15 => array(3, 5),
        16 => array(2, 4, 8),
        17 => array(),
        18 => array(2, 3, 6, 9),
        19 => array(),
        20 => array(2, 4, 5, 10),
        21 => array(3, 7),
        22 => array(2, 11),
        23 => array(),
        24 => array(2, 3, 4, 6, 8, 12),
        25 => array(5),
    );
   
    public function getValue($line) {
        $elements = implode(explode(' | ', $line));

        $num = sqrt(strlen($elements));
        $multiples = $this->_patterns[$num];
        $v = str_split($elements);
 
        // Return
        if (array_sum($v) == count($v)) {
            return '1x1, 1';
        } else if (array_sum($v) == 0) {
            return '1x1, 0';
        }
 
        foreach($multiples as $sub) {
            $out = array();
            foreach($v as $key => $item) {
                $out[(floor(($key % $num)/$sub) + (floor($key / ($sub * $num)) * ($num / $sub)))][] = $item;
            }

            $flag = true;
            $actual = array_sum($out[0]);
            foreach($out as $item) {
                if ($actual != array_sum($item)) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                return $sub.'x'.$sub.', '.$actual;
            }
        }
       
        return $num.'x'.$num.', '.array_sum($v);
    }
}

$class = new blackOrWhite();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
