<?php

namespace Azalee;

use pocketmine\block\Element;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;

class JoinQuit extends PluginBase implements Listener
{
    public function onEnable(): void
    {
        $this->getLogger()->info("Le plugin de JoinQuit by Azalee a bien démarer avec succée !");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onJoin(PlayerJoinEvent $ev)
    {
        $player = $ev->getPlayer();
        $playername = $player->getName();

        if($player->hasPlayedBefore())
        {
            Server::getInstance()->broadcastMessage("Le joueur {$playername} à bien rejoint pour la première fois sur le serveur !");
            Server::getInstance()->broadcastPopup("§a[§2+§a] §2{$playername}");
        }else{
            Server::getInstance()->broadcastPopup("§a[§2+§a] §2{$playername}");
        }
    }

    public function onQuit(PlayerQuitEvent $ev)
    {
        $playername = $ev->getPlayer()->getName();
        Server::getInstance()->broadcastPopup("§c[§4-§c] §4{$playername}");
    }
}