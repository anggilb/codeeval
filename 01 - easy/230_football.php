<?php

class football {
    public function getValue($input) {		
		$rows = explode(' | ', $input);
		
		$content = array();
		
		foreach ($rows as $key => $row) {
			$elements = explode(' ', $row);
			foreach ($elements as $element) {
			    $content[$element][] = $key + 1;
			}
		}
		
		$value = "";

		ksort($content);
		foreach ($content as $country => $teams) {
			$value .= $country.':';
			foreach ($teams as $key => $team) {
				$value .= $team;
				$value .= (count($teams)-1 === $key) ? ';' : ','; 
			}
		}

		return $value;
    }
}

$class = new football();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;