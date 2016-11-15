<?php

$try = 0x00FF;
$pack = pack('S', $try);
echo ($try === current(unpack('v', $pack))) ? 'BigEndian' : 'LittleEndian';

?>
