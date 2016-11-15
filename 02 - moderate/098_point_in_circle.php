<?php

class pointInCircle {
    public function getValue($input) {
        $n = sscanf($input, "Center: (%f, %f); Radius: %f; Point: (%f, %f)", $centerX, $centerY, $radius, $pointX, $pointY);

        return (sqrt(pow($pointX - $centerX, 2) + pow($pointY - $centerY, 2)) <= $radius) ? 'true' : 'false';
    }
}
 
$class = new pointInCircle();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
