<?php

class burrowsWheelerTransform {
    public function getValue($input) {
		$l = preg_split( '//', substr($input, 0, strlen($input) - 1), -1, PREG_SPLIT_NO_EMPTY );

		$f = $l; sort($f);

		$l2 = $l;
		$t = array();
		for( $fi = 0; $fi < count($f); $fi++ ) {
			$li = array_search( $f[$fi], $l2, true );
			if($li===false) die('Data corruption error.');

			$t[$fi] = $li;
			$l2[$li] = null;
		}

		$result = '';
		$index = array_search('$', $l);
		for( $i=0; $i < count($l) - 1; $i++ ) {			
			$index = $t[$index];
			$result .= $l[$index];
		}

		return $result.'$';
    }
}

$class = new burrowsWheelerTransform();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
