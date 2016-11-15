<?php

class lowestCommonAncestor {
    public function getValue($input) {
        $elements = explode(' ', $input);
        
        $three = array(
            30 => array(30),
            8 => array(30,8),
            3 => array(30, 8, 3),
            20 => array(30, 8, 20),
            10 => array(30, 8, 20, 10),
            29 => array(30, 8, 20, 29),
            52 => array(30, 52)
        );

        $queue = array_intersect($three[$elements[0]], $three[$elements[1]]);
        return array_pop($queue);
    }
}

$class = new lowestCommonAncestor();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
