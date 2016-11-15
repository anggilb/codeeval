<?php

class blackCard {
    public function getValue($input) {
		$elements = explode(' | ', $input);
		
		$players = explode(' ', $elements[0]);
		$num = $elements[1];
		
		$count = count($players);
		while ($count != 1) {
			unset($players[($num % $count) - 1]);
			$players = array_values($players);

			$count--;
		}

		return $players[0];
    }
}

$class = new blackCard();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}