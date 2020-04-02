<?php

$s = socket_create(AF_INET, SOCK_STREAM, 0);
socket_connect($s, "192.168.211.1", 9999);
$v = readline("Send something: ");
socket_send($s, $v, 1024, 0);
socket_recv($s, $b, 1024, 0);

echo $b;
?>

