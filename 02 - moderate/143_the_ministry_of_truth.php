<?php

class theMinistryOfTruth {
    function getValue($line) {
        list($a,$b) = explode(';', $line);
        $a_len = strlen($a);
        $b = explode(' ',$b);
        $offset = -1;
        $pos = -1;
        $found = 0;
        $len = count($b);
        for($i=0; $i < $len ; $i++){
            if( $b[$i] && false !== ( $pos = strpos($a, $b[$i], $offset+1 ) ) ){
                $b_len = strlen($b[$i]);
                for($j = max(0,$offset) ; $j < $pos ; $j++){
                    if( $a[$j] != ' ' ){
                        $a[$j] = '_';
                    }
                    else{
                        $a[$j] = ' ';
                    }
                }
                
                $offset = $pos + $b_len;
                $found++;
            }
        }
        if( $found && $found == $len ){
            for($j = $offset ; $j < $a_len ; $j++){
                if( $a[$j] != ' ' ){
                    $a[$j] = '_';
                }
                else{
                    $a[$j] = ' ';
                }
            }
            $a = str_replace('  ',' ',$a);
            $a = str_replace('  ',' ',$a);
            $a = str_replace('  ',' ',$a);
        }
        else{
            echo 'I cannot fix history';
        }
    }
}

$class = new theMinistryOfTruth();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
