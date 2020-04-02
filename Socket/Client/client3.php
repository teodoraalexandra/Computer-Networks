<?php 

$s = socket_create(AF_INET, SOCK_STREAM, 0);
socket_connect($s, "192.168.211.1", 9999);
socket_send($s, "Client_3", 10, 0);
socket_recv($s, $b, 10, 0);

echo $b;
?>

