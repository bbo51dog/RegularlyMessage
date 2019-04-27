<?php

namespace regularlymessage;

use pocketmine\Server;
use pocketmine\scheduler\Task;

class SendTask extends Task{
	public function __construct(array $messages){
		$this->msgs = $messages;
	}
	
	public function onRun(int $tick){
		$message = $this->msgs[array_rand($this->msgs)];
		Server::getInstance()->broadcastMessage("§a[定期]§b".$message);
	}
}