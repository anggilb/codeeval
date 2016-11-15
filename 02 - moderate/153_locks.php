<?php

class locks {
    public function getValue($input) {
        list($n, $m) = explode(' ', $input);
 
        if( $m == 1 ){
            return $n - 1;
        }
 
        $locks = 0;
        $unlocked = $n;
        // m-1 passes
        for( $j = 1 ; $j <= $n ; $j++ ){
            $div2 = ($j % 2 == 0);
            $div3 = ($j % 3 == 0);
 
            $lock = false;
            if(!($div2 && $div3) && ($div2 || ($div3 && ($m - 1) % 2 != 0))) {
                $lock = true;
            }
 
            if( $j == $n ){
                $lock = !$lock;
            }
 
            if( $lock ){
                $locks++;
            }
        }
        $unlocked -= $locks;
 
        return $unlocked;
    }
}
 
$class = new locks();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
