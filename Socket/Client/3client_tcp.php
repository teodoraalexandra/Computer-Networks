<?php
$s = socket_create(AF_INET, SOCK_STREAM, 0);
socket_connect($s, "192.168.211.1", 9999);
$sentence = readline("Enter a sentence: ");

socket_send($s, $sentence, 1024, 0);
socket_recv($s, $reverse, 1024, 0);
echo $reverse;
?>
