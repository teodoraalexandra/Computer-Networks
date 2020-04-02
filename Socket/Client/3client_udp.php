//create
<?php
$s = socket_create(AF_INET, SOCK_DGRAM, 0);
$sentence = readline("Enter sentence: ");

//send
socket_sendto($s, $sentence, 1024, 0, "192.168.211.1", 9999);

//recv
socket_recvfrom($s, $reverse, 1024, 0, $client_ip, $client_port);

echo $reverse;

?>
