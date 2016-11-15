<?php

class distinctTriangles {	
	public function getValue($input) {		
    $elements = explode(';', $input);
 
    $subelements1 = explode(' ', $elements[0]);
    $n = $subelements1[0];

    $edges = explode(',', $elements[1]);
 
    $matrix = array_fill(0, $n, array());
    
    foreach ($edges as $key => $item) {
        $val = explode(' ', $item);
        if ($val[0] !== $val[1]) {
            $matrix[$val[0]][] = $val[1];
            $matrix[$val[1]][] = $val[0];
        } else {
            unset($edges[$key]);
        }
    }
   
    $triangles = array();
    for($e = 0; $e < $n; $e++) {
        foreach($matrix[$e] as $i) {
            foreach($matrix[$i] as $j) {
                foreach($matrix[$j] as $k) {
                    if ($e == $k) {
                        $val = array($i, $j, $k);
                        sort($val);
                        $edge = implode($val);
                        if (!in_array($edge, $triangles)) {
                            $triangles[] = implode($val);
                        }
                    }
                }
            }
        }
    }
   
    return count($triangles);	
	}
}
$class = new distinctTriangles();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
