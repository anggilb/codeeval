<?php

class typeAhead {
    private function _getNextOcurrences($haystack, $needle, $n) {
        $output = array();
        $count = count($haystack) - 2;

        foreach($haystack as $key => $item) {
            if ($key < $count) {
                switch($n) {
                    case 2:
                        $val = $haystack[$key];
                        break;
                    case 3:
                        $val = $haystack[$key].' '.$haystack[$key + 1];
                        break;
                    case 4:
                        $val = $haystack[$key].' '.$haystack[$key + 1].' '.$haystack[$key + 2];
                        break;
                }
    
                if ($val == $needle) {
                    $output[] = trim($haystack[$key + $n - 1]);
                }
            }
        }
 
        return array_count_values($output);
    }
   
    public function getValue($input) {
        $elements = explode(',', $input);
 
        $n = $elements[0];
        $needle = $elements[1];
       
        $text = "Mary had a little lamb its fleece was white as snow;
                And everywhere that Mary went, the lamb was sure to go.
                It followed her to school one day, which was against the rule;
                It made the children laugh and play, to see a lamb at school.
                And so the teacher turned it out, but still it lingered near,
                And waited patiently about till Mary did appear.
                Why does the lamb love Mary so? the eager children cry;
                Why, Mary loves the lamb, you know the teacher did reply.";
 
        $text = str_replace(array(';', '.', '?', ','), '', $text);
 
        $grid = explode(' ', $text);
 
        $output = $this->_getNextOcurrences($grid, $needle, $n);
 
        array_multisort(array_values($output), SORT_DESC, array_keys($output), SORT_ASC, $output);
 
        $total = array_sum($output);
 
        return implode(';', array_map(function($k, $v) use($total) { return $k.','.number_format($v/$total, 3); }, array_keys($output), $output));
       
        echo $total;
    }
}
 
$class = new typeAhead();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
