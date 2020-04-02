<?php
$s = socket_create(AF_INET, SOCK_DGRAM, 0); //create

$size = readline("Size of array= ");
socket_sendto($s, $size, 10, 0, "192.168.211.1", 9999);
$list = array();

for ($x=0; $x < $size; $x++) {
	$number = readline(">>> ");
	array_push($list, $number);
}

foreach ($list as $nb) {
	socket_sendto($s, $nb, 10, 0, "192.168.211.1", 9999); //send
}

socket_recvfrom($s, $b, 10, 0, $client_ip, $client_port); //receive
echo "Sum: ".$b; //print
?>
