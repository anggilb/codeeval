<?php

class workingExperience {
    public function getValue($input) {		
        $elements = explode('; ', $input);
        
        date_default_timezone_set('Europe/Madrid');
        
        $grid = array_fill(0, 30*12, 'false');
        foreach($elements as $item) {
            $m_ini = date("m", strtotime(substr($item, 0, 3)));
            $y_ini = substr($item, 4, 4) - 1990;
            $m_end = date("m", strtotime(substr($item, 9, 3)));
            $y_end = substr($item, 13, 4) - 1990;
            
            for($i = (($y_ini * 12) + $m_ini); $i <= (($y_end * 12) + $m_end); $i++) {
                $grid[$i] = 'true';
            }
        }
        
        return floor(array_count_values($grid)['true']/12);
    }
}

$class = new workingExperience();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}