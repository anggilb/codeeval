<?php

class passTriangle {
    private $_levels = array();
 
    public function setValue($input) {
        $elements = explode(' ', $input);
        
        $this->_levels[] = $elements;
    }
 
    public function getResults() {
        $i = count($this->_levels) - 1;
        while($i--){
            $level = $this->_levels[$i];

            for($j=0, $nb = count($level) ; $j < $nb ; $j++){
                $this->_levels[$i][$j] += max( $this->_levels[$i+1][$j], $this->_levels[$i+1][$j+1]);
            }
        }

        return $this->_levels[0][0];
    }
}
 
$class = new passTriangle();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    $class->setValue($line);
}

echo $class->getResults();

?>
