<?php

namespace regularlymessage;

use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\Task;
use pocketmine\utils\Config;

class main extends PluginBase{
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
		$this->getScheduler()->scheduleRepeatingTask(new SendTask($this), $sec);
	}
}