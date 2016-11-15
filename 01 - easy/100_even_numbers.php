 <?php

class evenNumbers {
    public function getValue($input) {
		return (1+$input) % 2;
    }
}

$class = new evenNumbers();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}