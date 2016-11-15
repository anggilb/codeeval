<?php

class justifyTheText {
    public function getValue($input) {
        if (strlen($input) <= 80) {
            return $input.PHP_EOL;
        }

        $elements = explode(' ', $input);

        $line = 0;
        $count = 0;

        $out = array();
        $out[] = NULL;

        $n = array();
        $n[] = 0;
        foreach($elements as $word) {
            if ($count + strlen($word) > 80) {
                $out[] = NULL;
                $n[] = 0;
                $count = 0;
                $line++;
            }

            $count += strlen($word) + 1;
            $out[$line][] = $word; 
            $n[$line] += strlen($word);
        }

        $return = NULL;
        foreach($out as $key => $item) {
            if ($key == (count($out) - 1)) {
                $return.= trim(implode(' ', $item)).PHP_EOL;
                continue;
            }

            $num_words = count($item);
            $spaces = (int) 80 - $n[$key] - $num_words + 1;
            
            $gaps = $num_words - 1;
 
            $max = floor($spaces / $gaps);
 
            $dif = $spaces - ($max * $gaps);
 
            $add = array_fill(0, $gaps, $max);
            for($i = 0; $i < $dif; $i++) {
                $add[$i] += 1;
            }

            $add[] = 0;

            $ret = NULL;
            foreach($item as $key => $word) {
                $ret .= $word . str_repeat(' ', $add[$key] + 1);
            }
            
            $return.= trim($ret).PHP_EOL;
        }
        
        return $return;
    }
}

$class = new justifyTheText();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line);
}

?>
