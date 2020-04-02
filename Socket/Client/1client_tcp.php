<?php
$s = socket_create(AF_INET, SOCK_STREAM, 0);

socket_connect($s, "192.168.211.1", 9999);
$size = readline("Size of array: ");
socket_send($s, $size, 10, 0);
$list = array();

for ($x = 0; $x < $size; $x++) {
	$number = readline(">>> ");
	array_push($list, $number);
	socket_send($s, $number, 10, 0);
}

socket_recv($s, $b, 10, 0);
echo "sum is: ".$b;

?>
