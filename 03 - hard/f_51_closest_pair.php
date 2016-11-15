<?php

class closestPair {
    private $_queue = array();

    public function addPos($input) {
        $this->_queue[] = explode(' ', $input);
    }

    public function getValue() {
        $min = INF;

        foreach($this->_queue as $item1) {
            foreach($this->_queue as $item2) {
                if ($item1 !== $item2) {
                    $new = sqrt(pow($item1[0] - $item2[0], 2) + pow($item1[1] - $item2[1], 2));
                    $min = ($new < $min) ? $new : $min;
                }
            }
        }

        $this->_queue[] = array();

        return number_format($min, 4);
    }
}
 
$class = new closestPair();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	if (!$line) {
		break;
	}

	if (strpos(' ', $line)) {
		$class->addPos($line);
	} else {
		echo $class->getValue().PHP_EOL;
	}
}

?>
