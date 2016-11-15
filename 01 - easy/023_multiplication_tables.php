 <?php

class multiplicationTables {
    public function getValue($input) {
		$value = NULL;
		for ($i = 1; $i <= 12; $i++) {
			$value .= str_pad($i * $input, 4, ' ', STR_PAD_LEFT);
		}
		return $value;
    }
}

$class = new multiplicationTables();

for ($i = 1; $i <= 12; $i++) {
	echo $class->getValue($i).PHP_EOL;
}

?>