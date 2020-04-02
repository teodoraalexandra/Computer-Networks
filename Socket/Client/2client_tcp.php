//create
<?php
$s = socket_create(AF_INET, SOCK_STREAM, 0);
//connect
socket_connect($s, "192.168.211.1", 9999);
$sentence = readline("Enter a sentence: ");

//send
socket_send($s, $sentence, 1024, 0);

//receive
socket_recv($s, $buff, 1024, 0);
echo $buff;

?>
