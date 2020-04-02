//create
<?php
$s = socket_create(AF_INET, SOCK_DGRAM, 0);

$sentence = readline("Enter a sentence: ");

//send
socket_sendto($s, $sentence, 1024, 0, "192.168.211.1", 9999);

//receive
echo "Number of spaces: ";
socket_recvfrom($s, $nr, 10, 0, $client_ip, $client_port);
echo $nr;
?>
