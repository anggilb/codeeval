<?php

class validParentheses {
    public function getValue($input) {
        $chars = str_split($input);
        
        $queue = array();
        foreach($chars as $item) {
            if (in_array($item, array('{', '[', '('))) {
                switch($item) {
                    case '{':
                        $queue[] = '}';
                        break;
                    case '[':
                        $queue[] = ']';
                        break;
                    case '(':
                        $queue[] = ')';
                        break;
                }
            } else if (array_pop($queue) != $item) {
                return 'False';
            }
        }

        return (!count($queue)) ? 'True' : 'False';
    }
}

$class = new validParentheses();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
