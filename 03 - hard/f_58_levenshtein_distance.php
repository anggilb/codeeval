<?php

class levenshteinDistance {
    private $_cases = array();
 
    private $_words = array();
 
    public function addCase($input) {
        $this->_cases[] = $input;
    }
 
    public function addWord($input) {
        $this->_words[] = $input;
    }

    public function getResults() {
        $output = array();
        foreach($this->_cases as $case) {
            $count = 0;
            $friends = array();
            foreach($this->_words as $word) {
                if(levenshtein($case, $word) == 1) {
                	$friends[] = $word;
                }
            }
            
            $subfriends = array();
            foreach($friends as $word) {
                if(levenshtein($case, $word) == 1) {
                	$subfriends[] = $word;
                }
            }

            foreach($subfriends as $word) {
                if(levenshtein($case, $word) == 1) {
                	$count++;
                }
            }

            $output[] = $count;
        }
 
        return implode(PHP_EOL, $output);
    }
}
 
$class = new levenshteinDistance();

$flag = false;
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    if ('END OF INPUT' == $line) {
        $flag = true;
        continue;
    }
   
    if (!$flag) {
        $class->addCase($line);
    } else {
        $class->addWord($line);
    }
}
 
?>
