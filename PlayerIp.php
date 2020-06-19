<?php

/**
 * @name PlayerIp
 * @api 3.10.0
 * @version 1.0.0
 * @main src\src
 * @author me
 */

namespace src;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class src extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinevent $event){

        if(!file_exists($this->getdataFolder() . $event->getPlayer()->getName() . ".yml")) {
            $config = new Config($this->getDataFolder() . $event->getPlayer()->getName() . ".yml", Config::YAML);

            $config->set("Name: " . $event->getPlayer()->getName());
            $config->set("Adress: " . $event->getPlayer()->getAddress());
            $config->save();
        }
    }
}