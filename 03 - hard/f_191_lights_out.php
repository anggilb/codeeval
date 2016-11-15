<?php

class lightsOut {
    public function getValue($input) {
        list($f, $c, $elements) = explode(' ', $input);

        $matrix = array_map('intval', str_split(str_replace('.', '1', str_replace('|', '', $elements))));

        $max = $f*$c;

        $range = range(1, $max);

        $matrix = array_combine($range, $matrix);

        $patterns = array();
        foreach($range as $item) {
            $patterns[] = $this->_calcPoints($item, $f, $c);
        }

        $patterns = array_combine($range, $patterns);

        foreach($range as $n) {
            foreach($this->_comb($n, $range) as $pos) {
                $submatrix = $matrix;
                
                foreach($pos as $item) {
                    foreach($patterns[$item] as $point) {
                        $submatrix[$point] = $matrix[$point] ^ 1;
                    }
                }

                if (array_sum($submatrix) == $max) {
                    return count($pos);
                }
            }
        }

        return -1;
    }
    
    private function _calcPoints($p, $f, $c) {
        $return = array($p);

        if (($p % $f) != 1) {
            $return[] = $p - 1;     
        }

        if (($p % $f) != 0) {
            $return[] = $p + 1;     
        }

        if (($p - $c) > 0) {
            $return[] = $p - $c;     
        }

        if (($p + $c) <= ($f * $c)) {
            $return[] = $p + $c;     
        }
        return $return;
    }
    
    private function _comb($m, $a) {
        if (!$m) {
            yield[];
            return;
        }

        if (!$a) {
            return;
        }

        $h = $a[0];
        $t = array_slice($a, 1);
        foreach($this->_comb($m - 1, $t) as $c)
            yield array_merge([$h], $c);
            foreach($this->_comb($m, $t) as $c)
                yield $c;
    }
}
 
$class = new lightsOut();

$input = array(
//'4 10 ...OOOOOOO|.OO.O.O...|.OO..OO.OO|...O....O.',
//'3 3 ..O|OOO|OOO',
'5 5 .O.O.|O...O|OOOOO|OOOOO|OOOOO'
//'5 7 .O.O...|..O.O..|.O.O..O|.O..OOO|OO.OOOO'
);

// 254,07

foreach ($input as $line) {
    echo $class->getValue($line).PHP_EOL;
}


?>






function _calcPoints($p, $f, $c) {
    $return = array_fill(1, $f * $c, 0);
    
    $return[$p] = 1;

    if (($p % $f) != 1) {
        $return[$p - 1] = 1;     
    }

    if (($p % $f) != 0) {
        $return[$p + 1] = 1;     
    }

    if (($p - $c) > 0) {
        $return[$p - $c] = 1;     
    }

    if (($p + $c) <= ($f * $c)) {
        $return[$p + $c] = 1;     
    }
    return implode($return);
}

function cmp($var1, $var2) {
    $output = array();
    $cmp = str_split($var2);
    
    foreach(str_split($var1) as $key => $letter) {
        $output[] = (int)$letter & (int)$cmp[$key];
    }
    
    return $output;
}

/*
$matrix = array(
  '110100000',
  '111010000',
  '011001000',
  '100110100',
  '010111010',
  '001011001',
  '000100110',
  '000010111',
  '000001011'
);
*/

$f = 4;
$c = 10;
$range = range(1, $f * $c);

$matrix = array();
foreach($range as $item) {
    $matrix[] = _calcPoints($item, $f, $c);
}


$max = base_convert(111111111, 2, 10);

$pruebas = array();
foreach(range(1, $max) as $item) {
    $pruebas[] = str_pad(base_convert($item, 10, 2), 9, 0, STR_PAD_LEFT)."<br />";
}


usort($pruebas, function($a, $b) { 
    $a = array_count_values(str_split($a))[1]; 
    $b = array_count_values(str_split($b))[1]; 
    return ($a < $b) ? -1 : 1; });

$res = '0001111111011010100001100110110001000010';
foreach($pruebas as  $pr) {
    $out = NULL;
    foreach($matrix as $case) {
        $out.= array_sum(cmp($case, $pr)) % 2;
    }
    
    if ($out == $res) break;
}

echo $pr."<br />";
echo array_count_values(str_split($pr))[1];


die;

class lightsOut {
    public function getValue($input) {
        list($f, $c, $elements) = explode(' ', $input);

        $matrix = array_map('intval', str_split(str_replace(array('.', '|', 'O'), array(0,'',1), $elements)));
        $max = $f*$c;
        $range = range(1, $max);
        $matrix = array_combine($range, $matrix);

        $patterns = array();
        foreach($range as $item) {
            $patterns[] = $this->_calcPoints($item, $f, $c);
        }
        $patterns = array_combine($range, $patterns);

        foreach($range as $n) {
            foreach($this->_comb($n, $range) as $pos) {var_dump($pos);
                $submatrix = $matrix;
                
                foreach($pos as $item) {
                    foreach($patterns[$item] as $point) {
                        $submatrix[$point] = $matrix[$point] ^ 1;
                    }
                }

                if (array_sum($submatrix) == 0) {
                    return count($pos);
                }
            }
        }

        return -1;
    }
    
    private function _calcPoints($p, $f, $c) {
        $return = array($p);

        if (($p % $f) != 1) {
            $return[] = $p - 1;     
        }

        if (($p % $f) != 0) {
            $return[] = $p + 1;     
        }

        if (($p - $c) > 0) {
            $return[] = $p - $c;     
        }

        if (($p + $c) <= ($f * $c)) {
            $return[] = $p + $c;     
        }
        return $return;
    }
    
    private function _comb($m, $a) {
        if (!$m) {
            yield[];
            return;
        }

        if (!$a) {
            return;
        }

        $h = $a[0];
        $t = array_slice($a, 1);
        foreach($this->_comb($m - 1, $t) as $c)
            yield array_merge([$h], $c);
            foreach($this->_comb($m, $t) as $c)
                yield $c;
    }
}
 
$class = new lightsOut();

$input = array(
//'4 10 ...OOOOOOO|.OO.O.O...|.OO..OO.OO|...O....O.',
'3 3 ..O|OOO|OOO',
//'5 5 .O.O.|O...O|OOOOO|OOOOO|OOOOO'
//'5 7 .O.O...|..O.O..|.O.O..O|.O..OOO|OO.OOOO'
);

// 254,07

foreach ($input as $line) {
    echo $class->getValue($line).PHP_EOL;
}











