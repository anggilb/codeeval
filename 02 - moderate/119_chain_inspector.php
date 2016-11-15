<?php

class chainInspector {
    public function getValue($input) {		
        $pairs = array();
        $tmp = preg_split('/[;\-]/', $input);

        $i = count($tmp);
        $max = $i / 2;
        while( ($i = $i-2)>= 0) {
            $pairs[ $tmp[$i] ] = $tmp[$i+1];
        }
        
        $i = 0;
        $step = 'BEGIN';
        do {
            $step = $pairs[$step];
            $i++;
        } while( $step != 'END' && $i <= $max );
       
        return ( ( 'END' == $step ) && ( $i == $max ) ? 'GOOD' : 'BAD' );
    }
}

$class = new chainInspector();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
