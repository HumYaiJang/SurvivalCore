<?php

namespace HumCore;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use jojoe77777\FormAPI;

Class Main extends PluginBase{
  
  public function onEnable(){
    $this->saveDefaultConfig();
    $this->getServer()->registerEvents(new ListenerEvent($this), $this));
    $this->getLogger()->notice("§e§lSurvivalCore ENABLE");
  }
  
  public function onCommand(CommandSender $sender, Command $command, String $label, array $args) : bool {
    switch($command->getName()){
      case "ruleui":
        $this->ruleUI();
        break;
      case "spawn":
      case "hub":
      case "lobby":
        $spawn = $this->getServer()->getDefaultLevel()->getSafeSpawn();
        $sender->teleport($spawn);
        $sender->sendMessage("§eคุณได้รับการกลับ Spawn แล้ว!");
        break;
        case "gms"
          $sender->setGamemode(0);
        $sender->sendMessage("§eChange gamemode §aSurvival mode §eor §agamemode 0");
        break;
        case "gmc"
          $sender->setGamemode(1);
        $sender->sendMessage("§eChange gamemode §aCretive mode §eor §agamemode 1");
        break;
        case "gma"
          $sender->setGamemode(2);
        $sender->sendMessage("§eChange gamemode§a Adventure mode §eor §agamemode 2");
    }
  }
}
