<?php

namespace bbo51dog\regularlymessage;

use pocketmine\Server;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;

class SendTask extends Task {

    /** @var string[] */
    private array $messages;

    private string $prefix;

    public function __construct(array $messages, string $prefix) {
        $this->messages = $messages;
        $this->prefix = $prefix;
    }

    public function onRun(): void {
        $message = $this->messages[array_rand($this->messages)];
        Server::getInstance()->broadcastMessage(TextFormat::GREEN . "[{$this->prefix}]" . TextFormat::AQUA . $message);
    }
}