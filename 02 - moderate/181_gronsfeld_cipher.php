<?php

class gronsfeldCipher {
    public function getValue($input) {
        list($key, $message) = explode(';', $input);
   
        $pattern = " !\"#$%&'()*+,-./0123456789:<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $out = NULL;
        $c = str_split($key);
        foreach(str_split($message) as $key => $letter) {
            $pos = strpos($pattern, $letter) - $c[$key % count($c)];
            $pos = ($pos <0) ? $pos + 84 : $pos;
            $out .= $pattern[$pos];
        }
   
        return $out;
    }
}

$class = new gronsfeldCipher();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
