<?php

class slangFlavor {
    private $_subs = array(
        NULL,
        ', yeah!',
        NULL,
        ', this is crazy, I tell ya.',
        NULL,
        ', can U believe this?',
        NULL,
        ', eh?',
        NULL,
        ', aw yea.',
        NULL,
        ', yo.',
        NULL,
        '? No way!',
        NULL,
        '. Awesome!'
    );
     
    private $_patterns = array(
        '?',
        '!',
        '.'
    );
    
    private $_queue;
    
    public function loadQueue() {
        $this->_queue = $this->_subs;
    }
     
    public function getValue($input) {
        $pos = 1;
        $count_subs = 0;
        $output = $input;
        $subs = $this->_subs;
       
        while (true) {
            $content = 
                array_filter(
                    array_map(
                        "strpos",
                        array_fill(
                            0,
                            count($this->_patterns),
                            $input
                        ),
                    $this->_patterns
                    ),
                "is_int"
                );
     
            if (count($content)) {
                $pos = min($content);
            } else {
                break;
            }
       
            if (!count($this->_queue)) {
                $this->_queue = $this->_subs;
            }
    
            $sust = array_shift($this->_queue);
     
            if ($sust) {
                $output = substr_replace($output, $sust, $pos + $count_subs, 1);
                $count_subs += strlen($sust) - 1;
            }
     
            $input = substr_replace($input, ' ', $pos, 1);
        }
       
        return $output;
    }
}

$class = new slangFlavor();


foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}