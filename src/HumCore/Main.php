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
  
  public function checkFormAPI() : bool {
    if($this->getServer()->getPluginManager()->getPlugin("FormAPI") === null || $this->getServer()->getPluginManager()->getPlugin("FormAPI")->isDisabled()){
      $this->getServer()->getPluginLoader()->disable($this);
      $this->getLogger()->error("[Error] กรุณาลง ปลั้กอิน 'FormAPI' เพื่อดำเนินการทำงานของปลั้กอินนี้แบบสมบูรณ์");
      return false;
    }
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
  
  public function ruleUI($sender){
    $formapi = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
    $form = $formapi->createSimpleForm(function(Player $sender, $data){
      $result = $data;
      if($result === null){
      }
      switch($result){
        case 0:
          $sender->addTitle("§aขอบคุณได้รับฟัง", "§eกรุณาทำตามข้อตกลงของเซิฟเวอร์!");
          break;
      }
    });
    $form->setTitle("§7§lRuleUI");
    $form->setContent($this->getConfig()->get("rule-content"));
    $form->addButton("Submit");
  }
}
