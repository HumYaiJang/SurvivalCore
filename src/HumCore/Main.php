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
    $this->getServer()->registerEvents(($this), $this))
}
