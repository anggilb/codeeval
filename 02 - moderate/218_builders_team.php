<?php
class buildersTeam {	
	public function getValue($input) {		
    $elements = explode(' | ', $input);
   
    $matrix = array();
    foreach($elements as $item) {
        $row = explode(' ', $item);
        $matrix[] = ($row[0] < $row[1]) ? array($row[0], $row[1]) : array($row[1], $row[0]);
    }
   
    $register = array();
    foreach($matrix as $item) {
        $register[] =
            (($item[0] - 1) % 5)
            + (floor(($item[0] - 1) / 5) * 9)
            + $item[1]
            - $item[0];
    }
 
    sort($register);
   
    $pos_1 = array(1,2,3,4,10,11,12,13,19,20,21,22,28,29,30,31);
    $pos_2 = array(1,2,3,10,11,12,19,20,21,28,29,30);
    $pos_3 = array(1,2,10,11,19,20,28,29);
    $pos_4 = array(1,10,19,28);
 
    //pos_4
    $try = array(1,2,3,4,5,9,14,18,23,27,32,36,37,38,39,40);
    $count = (count(array_intersect($try, $register)) == 16) ? 1 : 0;
    foreach($register as $item) {
        // Pos 1
        if  (in_array($item, $pos_1)) {
            $try = array(
                $item,
                $item + 4,
                $item + 5,
                $item + 9
            );
   
            if(count(array_intersect($try, $register)) == 4) {
                $count++;
            }
        }
       
        // Pos 2
        if  (in_array($item, $pos_2)) {
            $try = array(
                $item,
                $item + 1,
                $item + 4,
                $item + 6,
                $item + 13,
                $item + 15,
                $item + 18,
                $item + 19
            );
   
            if(count(array_intersect($try, $register)) == 8) {
                $count++;
            }
        }
       
        // Pos 3
        if  (in_array($item, $pos_3)) {
            $try = array(
                $item,
                $item + 1,
                $item + 2,
                $item + 4,
                $item + 7,
                $item + 13,
                $item + 16,
                $item + 22,
                $item + 25,
                $item + 27,
                $item + 28,
                $item + 29
            );
   
            if(count(array_intersect($try, $register)) == 12) {
                $count++;
            }
        }
    }
   
    return $count;
	}
}
$class = new buildersTeam();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
