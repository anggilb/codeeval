<?php

class findASquare {
    public function getValue($input) {
        $elements = explode('), (', substr($input, 1, strlen($input) - 2));
       
        $coords = array();
        foreach($elements as $item) {
            $coords[] = explode(',', $item);
        }

        $dist[] = (string) sqrt(pow($coords[1][0] - $coords[0][0], 2) + pow($coords[1][1] - $coords[0][1], 2));
        $dist[] = (string) sqrt(pow($coords[2][0] - $coords[0][0], 2) + pow($coords[2][1] - $coords[0][1], 2));
        $dist[] = (string) sqrt(pow($coords[3][0] - $coords[2][0], 2) + pow($coords[3][1] - $coords[2][1], 2));
        $dist[] = (string) sqrt(pow($coords[3][0] - $coords[1][0], 2) + pow($coords[3][1] - $coords[1][1], 2));
 
        $dist[] = (string) sqrt(pow($coords[2][0] - $coords[1][0], 2) + pow($coords[2][1] - $coords[1][1], 2));
        $dist[] = (string) sqrt(pow($coords[3][0] - $coords[0][0], 2) + pow($coords[3][1] - $coords[0][1], 2));

        $val = array_values(array_count_values($dist));
        return (in_array($val, array(array(2, 4), array(4, 2)))) ? 'true' : 'false';
    }
}
 
$class = new findASquare();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
