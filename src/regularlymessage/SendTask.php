<?php

namespace regularlymessage;

use pocketmine\Server;
use pocketmine\scheduler\Task;

class SendTask extends Task{
	public function __construct(array $messages, string $prefix){
		$this->msgs = $messages;
		$this->prefix = $prefix;
	}
	
	public function onRun(int $tick){
		$message = $this->msgs[array_rand($this->msgs)];
		Server::getInstance()->broadcastMessage("§a[".$this->prefix."]§b".$message);
	}
}