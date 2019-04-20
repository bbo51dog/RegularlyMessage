<?php

namespace regularlymessage;

use pocketmine\Server;
use pocketmine\scheduler\Task;

class SendTask extends Task{
	public function __construct(Main $main){
		$this->main = $main;
	}
	
	public function onRun(int $tick){
		$messages = $this->main->config->get('Messages');
		$message = $messages[array_rand($messages)];
		Server::getInstance()->broadcastMessage("§a[定期]§b".$message);
	}
}