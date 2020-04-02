<?php

class MultiThreadExample extends Thread {
	private $threadId;

	public function __construct(int $id) {
		$this->threadId = $id;
	}

	public function run() {
		$s = socket_create(AF_INET, SOCK_STREAM, 0);
		socket_connect($s, "192.168.211.1", 9999);
		$nr = mt_rand(1, 10);

		echo 'Client ' .$this->threadId . " started guessing...\n";
		socket_send($s, $nr, 10, 0);
		sleep(3);
		socket_recv($s, $b, 10, 0);
		echo 'Client ' .$this->threadId . " is a " .$b. "\n"; 
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
