<?php

class colorCodeConverter {
    private function _hex2rgb($item) {
        $item = str_replace("#", "", $item);
 
        $out = array();
        if(strlen($item) == 3) {
            $out[] = hexdec(substr($item,0,1).substr($item,0,1));
            $out[] = hexdec(substr($item,1,1).substr($item,1,1));
            $out[] = hexdec(substr($item,2,1).substr($item,2,1));
        } else {
            $out[] = hexdec(substr($item,0,2));
            $out[] = hexdec(substr($item,2,2));
            $out[] = hexdec(substr($item,4,2));
        }
 
       return 'RGB('.implode(',', $out).')';
    }
 
    private function _cmyk2rgb($item) {
        list($c, $m, $y, $k) = explode(',', substr($item, 1, strlen($item) - 2));
		
		$r	= (1 - ($c * (1 - $k)) - $k ) * 255;
		$g	= ( 1 - ($m * (1 - $k)) - $k ) * 255;
		$b	= ( 1 - ($y * (1 - $k)) - $k ) * 255;
		  
		if($r<0) $r = 0 ;
		if($g<0) $g = 0 ;
		if($b<0) $b = 0 ;
		  
		$rgb = array('r' => round($r), 'g' => round($g), 'b' => round($b) );
		return 'RGB('.$rgb['r'].','.$rgb['g'].','.$rgb['b'].')';
    }
 
    private function _hsl2rgb($item) {
        list($h, $s, $l) = explode(',', substr($item, 4, strlen($item) - 5));
		
		$s /= 100;
		$l /= 100;
		
		$c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
		$x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
		$m = $l - ( $c / 2 );
		if ( $h < 60 ) {
			$r = $c;
			$g = $x;
			$b = 0;
		} else if ( $h < 120 ) {
			$r = $x;
			$g = $c;
			$b = 0;			
		} else if ( $h < 180 ) {
			$r = 0;
			$g = $c;
			$b = $x;					
		} else if ( $h < 240 ) {
			$r = 0;
			$g = $x;
			$b = $c;
		} else if ( $h < 300 ) {
			$r = $x;
			$g = 0;
			$b = $c;
		} else {
			$r = $c;
			$g = 0;
			$b = $x;
		}
		$r = ( $r + $m ) * 255;
		$g = ( $g + $m ) * 255;
		$b = ( $b + $m  ) * 255;

		$rgb = array( 'r' => round($r), 'g' => round($g), 'b' => round($b) );
		return 'RGB('.$rgb['r'].','.$rgb['g'].','.$rgb['b'].')';
    }
 
    private function _hsv2rgb($item) {
        list($h, $s, $v) = explode(',', substr($item, 4, strlen($item) - 5));
		$s /= 100;
		$v /= 100;

		$c = $v * $s;
		$x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
		$m = $v - $c;
		if ( $h < 60 ) {
			$r = $c;
			$g = $x;
			$b = 0;
		} else if ( $h < 120 ) {
			$r = $x;
			$g = $c;
			$b = 0;			
		} else if ( $h < 180 ) {
			$r = 0;
			$g = $c;
			$b = $x;					
		} else if ( $h < 240 ) {
			$r = 0;
			$g = $x;
			$b = $c;
		} else if ( $h < 300 ) {
			$r = $x;
			$g = 0;
			$b = $c;
		} else {
			$r = $c;
			$g = 0;
			$b = $x;
		}

		$r = ( $r + $m ) * 255;
		$g = ( $g + $m ) * 255;
		$b = ( $b + $m  ) * 255;

		$rgb = array( 'r' => round($r), 'g' => round($g), 'b' => round($b) );
		return 'RGB('.$rgb['r'].','.$rgb['g'].','.$rgb['b'].')';
    }
 
    public function getValue($item) {
        switch (true) {
            case (substr($item, 0, 1) == '#'):
                return $this->_hex2rgb($item);
                break;
            case (substr($item, 0, 1) == '('):
                return $this->_cmyk2rgb($item);
                break;
            case (substr($item, 0, 3) == 'HSL'):
                return $this->_hsl2rgb($item);
                break;
            case (substr($item, 0, 3) == 'HSV'):
                return $this->_hsv2rgb($item);
                break;
        }
    }
}
 
$class = new colorCodeConverter();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
