<?php

namespace antbag\trash;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;
use muqsit\invmenu\type\InvMenuTypeIds;

use pocketmine\utils\TextFormat;

class Main extends PluginBase {
  
  /**
  * @return void
  */
  public function onEnable(): void {
    if(!InvMenuHandler::isRegistered()) {
      InvMenuHandler::register($this);
    }
  }
  
  public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool {
  if($command->getName() === "trashcan") {
    if($sender instanceof Player) {
       $menu = InvMenu::create(InvMenuTypeIds::TYPE_CHEST);
       $menu->setName("Trash Can");
  
      $menu->send($sender);
      } else {
        $sender->sendMessage(TextFormat::DARK_RED . "Please run this command in-game.");
        }
    }
    return true;
  }
}
