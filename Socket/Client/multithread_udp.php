<?php

class MultiThreadExample extends Thread {
        private $threadId;

        public function __construct(int $id) {
                $this->threadId = $id;
        }

        public function run() {
                $s = socket_create(AF_INET, SOCK_DGRAM, 0);
                //socket_connect($s, "192.168.211.1", 9999);
		echo 'Client ' .$this->threadID . "started guessing...\n";
                $password = readline("Please enter a password: ");

		socket_sendto($s, $password, 1024, 0, "192.168.211.1", 9999);
                sleep(3);
                socket_recvfrom($s, $b, 10, 0, $client_ip, $client_port);
                echo 'Client ' .$this->threadId . " is a " .$b. "\n";
		echo "\n";
	}
}

$threads = [];
$i = 0;

do {
        $i++;
        $threads[$i] = new MultiThreadExample($i);
        $threads[$i]->start();
        $threads[$i]->join();
} while($i < 5);

