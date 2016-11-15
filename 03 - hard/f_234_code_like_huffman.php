<?php

class codeLikeHuffman {
	private function _encode($symb2freq) {
		$heap = new SplPriorityQueue;
		$heap->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
		foreach ($symb2freq as $sym => $wt) {
			$heap->insert(array($sym => ''), -$wt);
		}
	 
		while ($heap->count() > 1) {
			$lo = $heap->extract();
			$hi = $heap->extract();
			foreach ($hi['data'] as &$x)
				$x = '1'.$x;
			foreach ($lo['data'] as &$x)
				$x = '0'.$x;

			$heap->insert($lo['data'] + $hi['data'],
						  $lo['priority'] + $hi['priority']);
		}
		$result = $heap->extract();
		return $result['data'];
	}
	
    public function getValue($input) {
		$symb2freq = array_count_values(str_split($input));
		$huff = $this->_encode($symb2freq);
		ksort($huff);
		$output = array();
		foreach ($huff as $sym => $code) {
			$output[] =  $sym.": ".$code;
		}
		
		return implode('; ', $output);
    }
}

$class = new codeLikeHuffman();

$input = array(
'abc',
'ilovecodeeval'
);

foreach ($input as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
