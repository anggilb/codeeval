<?php
class straightLines {	
	public function getValue($input) {		
    	$elements = array_unique(explode(' | ', $input));
   
    	$matrix = array();
    	foreach($elements as $item) {
        	$matrix[] = explode(' ', $item);
    	}
 
    	$pos = 1;
    	$count = array();
    	$n_matrix = count($matrix);
    	for($i = 0; $i < $n_matrix; $i++) {
        	for($j = $pos; $j < $n_matrix; $j++) {
            	$tryTo = array_diff(range($j, $n_matrix - 1), array($j));
 
            	if ($matrix[$i][0] === $matrix[$j][0]) {
                	foreach($tryTo as $item) {
                    	if ($matrix[$item][0] == $matrix[$i][0]) {
							if (!in_array($matrix[$i][0], $count)) {
								$count[] = $matrix[$i][0];
							}
                        	break;
                    	}
                	}
            	} else {
                	$m = ($matrix[$j][1] - $matrix[$i][1]) / ($matrix[$j][0] - $matrix[$i][0]);
                	$b = $matrix[$j][1] - ($m*$matrix[$j][0]);
 
                	foreach($tryTo as $item) {
                    	if ($matrix[$item][1] == (($m*$matrix[$item][0]) + $b)) {
							if (!in_array($m."-".$b, $count)) {
								$count[] = $m."-".$b;
							}
                        	break;
                    	}
                	}
            	}
        	}
       
        	$pos++;
    	}
		
    	return count($count);
	}
}
$class = new straightLines();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
