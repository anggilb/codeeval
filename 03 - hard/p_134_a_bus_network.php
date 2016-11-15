<?php

class aBusNetwork {
	private $_MAXSTOPS = 31;//310
	private $_MAXNODES = 60;//6000
	private $_MAXCOST = 300;//30000
	
	private function get_cost($src, $dst, $g) {
		$end = 0;
		$head = 0;

		$ans = $this->_MAXCOST;
		$nodeq[$end++] = $src;
		for($i=0; $i<$this->_MAXNODES; $i++) {
			$costs[$i] = $this->_MAXCOST;
			$visited[$i] = 0;
		}

		$costs[$src] = 0;
		while($head < $end) {
			$node = $nodeq[$head++];
			$visited[$node] = 1;
			for($i = 1; $i < $this->_MAXNODES; $i++) {
				if($g[$node][$i] < $this->_MAXCOST && $visited[$i] == 0) {
					$nodeq[$end++] = $i;
					if ($costs[$i] > $costs[$node] + $g[$node][$i]) {
						$costs[$i] = $costs[$node] + $g[$node][$i];
					}
				}
			}
		}

		for($i=1; $i <= $dst[0]; $i++) {
			$d = $dst[$i];
			if($ans > $costs[$d]) {
				$ans = $costs[$d];
			}
		}

		return $ans;    
	}

    public function getValue($input) {
		$elements = explode('; ', $input);

		$base = array_shift($elements);

		list($src, $dst) = explode(',', substr($base, 1, strlen($base) - 2));

		foreach($elements as $key => $route) {
			 $elem = explode(
				',', 
				substr($route, strpos($route, '[') + 1, 
				strlen($route) - strpos($route, '[') - 2)
			);

			$routes[] = array_merge(array(count($elem)), $elem);
		}

		for($i = 0; $i < $this->_MAXSTOPS; $i++) {
			for($j = 0; $j < $this->_MAXNODES; $j++) {
				$node_ref[$i][$j] = 0;
			}
		}

		for($i = 0; $i < $this->_MAXNODES; $i++) {
			for($j = 0; $j < $this->_MAXNODES; $j++) {
				$g[$i][$j] = $this->_MAXCOST;
			}
		}

		$start = 0;
		for($rti = 0; $rti < sizeof($routes); $rti++) {
			//printf("route %d, count %d\n", $rti, $routes[$rti][0]);
			for($nodei = 1; $nodei < sizeof($routes[$rti]); $nodei++) {
				if($nodei < $routes[$rti][0]) {
					$g[$start + $nodei][$start + $nodei + 1] = 7;
					$g[$start + $nodei + 1][$start + $nodei] = 7;
				}

				//printf("nodei %d\n", $nodei);
				$station = $routes[$rti][$nodei];
				$cnt = $node_ref[$station][0];

				//printf("station %d, cnt %d\n", $station, $cnt);
				for($k=1; $k<=$cnt; $k++) {
					$tmp = $node_ref[$station][$k];
					$g[$start + $nodei][$tmp] = 12;
					$g[$tmp][$start + $nodei] = 12;
				}
				$node_ref[$station][$cnt + 1] = $start + $nodei;
				$node_ref[$station][0] = $cnt + 1;
			}   
			$start += $routes[$rti][0];    
		}

		$ans = $this->_MAXCOST;
		for($i=1; $i <= $node_ref[$src][0]; $i++) {
			$res = $this->get_cost($node_ref[$src][$i], $node_ref[$dst], $g);
			if($res < $ans) $ans = $res;
		}

		if($ans < $this->_MAXCOST) {
			return $ans;
		} else {
			return "None";
		}
    }
}
 
$class = new aBusNetwork();

/*
$input = array(
    "(2,4); R1=[1,2,3,11,12,4]; R2=[5,6,4]; R3=[1,6,7]; R4=[5,6,4]; R5=[8,6,3]",
    "(1,7); R1=[1,2,3,4]; R2=[5,6,4]; R3=[9,6,7]; R4=[12,1,2,3,11,16,15,14,10,13,7]",
    "(3,299); R1=[1,2,3,4]; R2=[6,7,19,12,4]; R3=[11,14,16,6]; R4=[24,299,42,6]",
    "(3,4); R1=[1,2,3]; R2=[6,7,19,12,4]; R3=[11,14,16,6]"
);
*/

//foreach($input as $line) {
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}






