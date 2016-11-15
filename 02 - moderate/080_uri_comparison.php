<?php

class uriComparison {
    public function getValue($input) {		
		$elements = explode(';', $input);

		$uri1 = parse_url($elements[0]);
		$uri2 = parse_url($elements[1]);

		$path1 = rawurldecode($uri1['path']);
		$path2 = rawurldecode($uri2['path']);

		return ((strcasecmp($uri1['scheme'], $uri2['scheme']) == 0) && (strcasecmp($uri1['host'], $uri2['host']) == 0) && ($path1 == $path2)) ? 'True' : 'False';
    }
}

$class = new uriComparison();
foreach (explode(PHP_EOL, trim(file_get_contents($argv[1]))) as $line) {
	echo $class->getValue($line).PHP_EOL;
}

?>
