<?php

class stringSubstitution {
    public function getValue($input) {
        list($chain, $elements) = explode(';',$input);
        $moves = array_chunk(explode(',',$elements), 2);

        $count = count($moves);

        $replaced = array();

        $first = ord('a');
        for($i = 0; $i < $count; $i++){
            $replacement = chr($first + count($replaced));
            $replaced[$replacement] = $moves[$i][1];
            $chain = str_replace($moves[$i][0], $replacement, $chain);
        }
        return strtr($chain, $replaced);
    }
}

$class = new stringSubstitution();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
