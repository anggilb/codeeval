<?php

class overlappingRectangles {
    public function getValue($input) {
        list($ax1, $ay1, $ax2, $ay2, $bx1, $by1, $bx2, $by2) = explode(',', $input);
        
        $rax = range($ax1, $ax2);
        $ray = range($ay1, $ay2);
        $rbx = range($bx1, $bx2);
        $rby = range($by1, $by2);

        return (array_intersect($rax, $rbx) && array_intersect($ray, $rby)) ? 'True' : 'False';
    }
}
 
$class = new overlappingRectangles();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
