<?php

class Combinations implements Iterator
{
    protected $c = null;
    protected $s = null;
    protected $n = 0;
    protected $k = 0;
    protected $pos = 0;
 
    function __construct($s, $k) {
        if(is_array($s)) {
            $this->s = array_values($s);
            $this->n = count($this->s);
        } else {
            $this->s = (string) $s;
            $this->n = strlen($this->s);
        }
        $this->k = $k;
        $this->rewind();
    }
    function key() {
        return $this->pos;
    }
    function current() {
        $r = array();
        for($i = 0; $i < $this->k; $i++)
            $r[] = $this->s[$this->c[$i]];
        return is_array($this->s) ? $r : implode('', $r);
    }
    function next() {
        if($this->_next())
            $this->pos++;
        else
            $this->pos = -1;
    }
    function rewind() {
        $this->c = range(0, $this->k);
        $this->pos = 0;
    }
    function valid() {
        return $this->pos >= 0;
    }
    //
    protected function _next() {
        $i = $this->k - 1;
        while ($i >= 0 && $this->c[$i] == $this->n - $this->k + $i)
            $i--;
        if($i < 0)
            return false;
        $this->c[$i]++;
        while($i++ < $this->k - 1)
            $this->c[$i] = $this->c[$i - 1] + 1;
        return true;
    }
}

class sumToZero {
	public function getValue($input) {
		$elements = explode(',', $input);

		$count = 0;
		foreach(new Combinations(range(0, count($elements) - 1), 4) as $item) {
			$sum = $elements[$item[0]] + $elements[$item[1]] + $elements[$item[2]] + $elements[$item[3]];
			if ($sum == 0) {
				$count++;
			}
		}

		return $count;
    }
	
	private function _pc_array_power_set($array) {
    	$results = array(array( ));

		foreach ($array as $element) {
			foreach ($results as $combination) {
            	array_push($results, array_merge(array($element), $combination));
			}
		}

    	return $results;
	}
}

$class = new sumToZero();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
