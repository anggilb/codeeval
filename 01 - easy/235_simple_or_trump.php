<?php

class simpleOrTrump {
	private $_values = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A');
	
    public function getValue($input) {		
		$elements = explode(' | ', $input);

		$cards = explode(' ', $elements[0]);
		
		$trump = $elements[1];
		
		$card_1_suit = substr($cards[0], -1);
		$card_1_rank = str_replace($card_1_suit, '', $cards[0]);
		$card_2_suit = substr($cards[1], -1);
		$card_2_rank = str_replace($card_2_suit, '', $cards[1]);
		
		if ($card_1_suit === $trump && $card_2_suit !== $trump) {
			return $cards[0];
		} else if ($card_1_suit !== $trump && $card_2_suit === $trump) {
			return $cards[1];
		} else if (array_search($card_1_rank, $this->_values) > array_search($card_2_rank, $this->_values)) {
			return $cards[0];
		} else if (array_search($card_1_rank, $this->_values) < array_search($card_2_rank, $this->_values)) {
			return $cards[1];
		} else if (array_search($card_1_rank, $this->_values) == array_search($card_2_rank, $this->_values)) {
			return $elements[0];
		}
    }
}

$class = new simpleOrTrump();

foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
    echo $class->getValue($line).PHP_EOL;
}