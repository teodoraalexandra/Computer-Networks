<?php
class test extends Threaded {
	private $server;
	public function __construct(&$server) {
		$this->server = $server;
	}

	public function run() {
		echo $this->server->request('INFO 1-10');
	}
}

class socket extends Threaded {
	private $socket;
	public function __construct($host, $port) {
		$this->socket = fsockopen($host, $port, $errno, $errstr, 10);
	}

	public function request($out) {
		fwrite($this->socket, $out . "\r\n" );
		return fgets($this->socket);
	}
}


class main {
	private $server;
	public function __construct() {
		$this->server = new socket('192.168.211.1',9999);
	}

	public function main() {
		$sock = new sock ($this->server);
		$sock->request();
	}
}
