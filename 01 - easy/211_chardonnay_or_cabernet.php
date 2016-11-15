<?php

class chardonnayOrCabernet {
    public function getValue($input) {
		$content = explode(' | ', $input);
		$wines = explode(' ', $content[0]);
		
		$value = "";
		foreach ($wines as $item) {
			if ($this->_isRemember($item, $content[1])) {
				$value .= $item." ";
			}
		}

		return ($value) ? trim($value) : 'False';
    }
	
	private function _isRemember($wine, $pattern) {
		for ($i = 0; $i < strlen($pattern); $i++) {
			echo $wine."<br />";
		    if (stripos($wine, $pattern[$i]) !== false) {
				$pos = strpos($wine, $pattern[$i]);
				$wine = substr($wine, 0, $pos) . substr($wine, $pos + 1);
			} else {
				return false;
			}
		}
		return true;
	}
}

$class = new chardonnayOrCabernet();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line)
    echo $class->getValue($line) . PHP_EOL;
?>