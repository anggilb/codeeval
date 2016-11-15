<?php

class morseCode {
    public function getValue($input) {
		
		$elements = explode(' ', str_replace('  ', ' * ', $input));

		$output = array_map(function($value) {return $this->_getLetter($value);}, $elements);
		
		return implode($output);
    }
	
	private function _getLetter($input) {
		switch($input) {
			case '.-':
				return 'A';
				break;
			case '-...':
				return 'B';
				break;
			case '-.-.':
				return 'C';
				break;
			case '-..':
				return 'D';
				break;
			case '.':
				return 'E';
				break;
			case '..-.':
				return 'F';
				break;
			case '--.':
				return 'G';
				break;
			case '....':
				return 'H';
				break;
			case '..':
				return 'I';
				break;
			case '.---':
				return 'J';
				break;
			case '-.-':
				return 'K';
				break;
			case '.-..':
				return 'L';
				break;
			case '--':
				return 'M';
				break;
			case '-.':
				return 'N';
				break;
			case '---':
				return 'O';
				break;
			case '.--.':
				return 'P';
				break;
			case '--.-':
				return 'Q';
				break;
			case '.-.':
				return 'R';
				break;
			case '...':
				return 'S';
				break;
			case '-':
				return 'T';
				break;
			case '..-':
				return 'U';
				break;
			case '...-':
				return 'V';
				break;
			case '.--':
				return 'W';
				break;
			case '-..-':
				return 'X';
				break;
			case '-.--':
				return 'Y';
				break;
			case '--..':
				return 'Z';
				break;
			case '.----':
				return '1';
				break;
			case '..---':
				return '2';
				break;
			case '...--':
				return '3';
				break;
			case '....-':
				return '4';
				break;
			case '.....':
				return '5';
				break;
			case '-....':
				return '6';
				break;
			case '--...':
				return '7';
				break;
			case '---..':
				return '8';
				break;
			case '----.':
				return '9';
				break;
			case '-----':
				return '0';
				break;
			case '*':
				return ' ';
				break;
		}
	}
}

$class = new morseCode();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}