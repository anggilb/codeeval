<?php

class carRace {
    private $_track = array();
    
    private $_cars = array();
    
    public function setCircuit($input) {
        $this->_track = array_chunk(explode(' ', $input), 2);
    }

    public function setCar($input) {
        list($number, $velMax, $tAcel, $tBrake) = explode(' ', $input);

        $car = array(
            'id' => $number,
            'top_speed' => $velMax / 3600,  // seconds
            'time_to_accelerate_top' => $tAcel,
            'time_to_brake_zero' => $tBrake,
            'accelerate_rate' => ($velMax / 3600) / $tAcel,
            'brake_rate' => ($velMax / 3600) / $tBrake
        );
        
        $car['time'] = $this->_simulateRace($car);
        
        $this->_cars[] = $car; 
    }
    
    private function _simulateRace($car) {
        $speed_start_of_section = $time = 0;
        
        foreach($this->_track as $item) {
            $section_length = $item[0];
            $angle_factor = 1 - $item[1] / 180;

            $ts = $car['top_speed'];
            $a = $car['accelerate_rate'];
            $b = $car['brake_rate'];
                        
            $speed_end_of_section = $angle_factor * $ts;
                        
            // accelerate phase from $speed_start_of_section to $top_speed => time and distance
            $t = ( $ts - $speed_start_of_section ) / $a;
            // Linear distance can be expressed as (if acceleration is constant):
            // s = v0 t + 1/2 a t2
            $d = $speed_start_of_section * $t + ( $a * $t * $t ) * 0.5;
    
            $section_length -= $d;
            $time += $t;

            // brake phase from $top_speed to $speed_end_of_section => time and distance
            $t = ( $ts - $speed_end_of_section) / $b;
            $d = $ts * $t - ($b * $t * $t ) * 0.5; // caution: minus here

            $section_length -= $d;
            $time += $t;
    
            // top speed during (section_length - accelerate_phase.distance - brake_phase.distance) => time
            $time += $section_length / $ts;

            $speed_start_of_section = $speed_end_of_section;
        }

        return number_format($time, 2);
    }
    
    public function order() {
        usort($this->_cars, function($a, $b) { return strcmp($a["time"], $b["time"]); });

        foreach($this->_cars as $car) {
            echo $car['id']." ".$car['time'].PHP_EOL;
        }
    }
}
 
$class = new carRace();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $key => $line) {
    if ($key) {
        $class->setCar($line);
    } else {
        $class->setCircuit($line);
    }
}

$class->order();

?>
