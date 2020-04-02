<?php

class AsyncOperation extends Thread {
	public function __construct($arg) {
		$this->arg = $arg;
	}

	public function run() {
        	if($this->arg) {
			$r1 = rand(1, 10);
        		$s = socket_create(AF_INET, SOCK_STREAM, 0);
        		socket_connect("192.168.211.1", 9999);
        		socket_write($s, 'Hello world ' + $r1);
                		$data = socket_recv(1024);
        		echo ('Received ' . $data);
	`	}
	}
}

$stack = array();

foreach (range("A", "D") as $i) {
        $stack = new AsyncOperation($i);
}

foreach($stack as $t) {
	$t->start();
}

echo 'done';
?>

