<?php

namespace regularlymessage;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
	public function onEnable(){
		$this->getLogger()->info("§aこのプラグインはMITライセンスにより配布されています");
		$this->config = new Config($this->getDataFolder() . "Regularly.yml", Config::YAML,[
			'RepeatSeconds' => 90,
			'Messages' => [
				'RegularlyMessageを使って頂きありがとうございます',
				'メッセージを変更するには、Config.ymlを編集した後に再起動してください',
			]
		]);

		$sec = $this->config->get("RepeatSeconds");
		$sec = $sec * 20;
		$this->getScheduler()->scheduleRepeatingTask(new CallbackTask([$this,"SendTask"]), $sec);
	}

	public function SendTask(){
		$messages = $this->config->get('Messages');
		$message = $messages[array_rand($messages)];
		$this->getServer()->broadcastMessage("§a[定期]§b".$message);
	}
}