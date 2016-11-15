<?php

class sequenceTransformation {
    public function getValue($input) {
        $elements = explode(' ', $input);

        $pattern = '/^'.str_replace(array(0, 1), array('[A]+', '[A|B]+'), (string) $elements[0]).'$/i';

        return (preg_match($pattern, $elements[1])) ? 'Yes' : 'No';
    }
}
 
$class = new sequenceTransformation();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
