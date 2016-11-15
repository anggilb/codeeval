<?php

class cashRegister {
    public function getValue($input) {
        $coins = array(
            10000 => 'ONE HUNDRED',
            5000 => 'FIFTY',
            2000 => 'TWENTY',
            1000 => 'TEN',
            500 => 'FIVE',
            200 => 'TWO',
            100 => 'ONE',
            50 => 'HALF DOLLAR',
            25 => 'QUARTER',
            10 => 'DIME',
            5 => 'NICKEL',
            1 => 'PENNY'
        );

        $elements = explode(';',$input);

        $diff = round(($elements[1] - $elements[0]) * 100);

        if ($diff < 0) {
            return 'ERROR';
        } if ($diff == 0) {
            return 'ZERO';
        } else {
            $kCoins = array_filter(array_keys($coins), function($val) use($diff) { return ($val <= $diff); });
            
            $output = array();
            while ($diff > 0) {
                $coin = array_shift($kCoins);

                $num = (int) floor($diff / $coin);
                
                for ($i = 0; $i < $num; $i++) {
                    $output[] = $coins[$coin];
                }
               
                $diff = (int) ($diff - ($num * $coin));
            }
            
            return implode(',', $output);
        }
    }
}

$class = new cashRegister();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
