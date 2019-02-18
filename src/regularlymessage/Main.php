<?php

namespace regularymessage;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\scheduler\Task;
use pocketmine\utils\Utils;
use pocketmine\utils\Config;

class main extends PluginBase{
    public function onEnable(){
        
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,[
          'RepeatSeconds' => '90',
          'Number of messages' => '5',
          '1' => 'message1',
          '2' => 'message2',
          '3' => 'message3',
          '4' => 'message4',
          '5' => 'message5',
          ]);
        
        $sec = $this->config->get("RepeatSeconds");
        $sec = $sec*20;
      
        $this->getScheduler()->scheduleRepeatingTask(new CallbackTask([$this,"SendTask"]), $sec);
    }
    
    public function SendTask(){
        $message_num = $this->config->get("Number of messages");
        $rand = mt_rand(1, $message_num);
        $message = $this->config->get("$rand");
        $this->getServer()->broadcastMessage("§a[定期]§b{$message}");


    }
}