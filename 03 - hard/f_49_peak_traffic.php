<?php

class peakTraffic {
    private $_queue = array();
 
    private $_accounts = array();
 
    public function getValue($input) {
        list($dump, $origin, $destiny) = explode('    ', $input);
 
        if (!in_array($origin, $this->_accounts)) {
            $this->_accounts[] = $origin;
        }
 
        if (!in_array($destiny, $this->_accounts)) {
            $this->_accounts[] = $destiny;
        }
 
        $this->_queue[] = array($origin, $destiny);
    }
 
    public function getResults() {
        $count = count($this->_accounts);
 
       $submatrix = array_combine($this->_accounts, array_fill(0, $count, false));
        $matrix = array_combine($this->_accounts, array_fill(0, $count, $submatrix));
 
        foreach($this->_queue as $item) {
            $matrix[$item[0]][$item[1]] = true;
        }
 
        $grid = array();
        foreach($this->_accounts as $item1) {
            $grid[$item1][] = $item1;
            foreach($this->_accounts as $item2) {
                if ($matrix[$item1][$item2] && $matrix[$item2][$item1]) {
                    $grid[$item1][] = $item2;
                }
            }
        }
 
        $output = array();
        foreach($grid as $item) {
            foreach($item as $pos) {
                sort($item);
                if(!in_array($item, $output) && $item !== $grid[$pos]) {
                    break;
                }
 
                $output[] = implode(', ', $item);
            }
 
        }
 
        foreach($output as $item) {
            echo $item.PHP_EOL;
        }
    }
}
 
$class = new peakTraffic();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    $class->getValue($line);
}
 
$class->getResults();
 

?>
