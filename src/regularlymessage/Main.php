<?php

namespace regularlymessage;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
	public function onEnable(){
		$this->getLogger()->info("§aこのプラグインはMITライセンスにより配布されています");
		$config = new Config($this->getDataFolder() . "Regularly.yml", Config::YAML,[
			'RepeatSeconds' => 90,
			'Messages' => [
				'RegularlyMessageを使って頂きありがとうございます',
				'メッセージを変更するには、Regularly.ymlを編集した後に再起動してください',
			]
		]);

		$sec = $config->get("RepeatSeconds");
		$sec = $sec * 20;
		$messages = $config->get('Messages');
		$this->getScheduler()->scheduleRepeatingTask(new SendTask($messages), $sec);
	}
}