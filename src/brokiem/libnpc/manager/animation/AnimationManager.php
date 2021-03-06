<?php

declare(strict_types=1);

namespace brokiem\libnpc\manager\animation;

use brokiem\libnpc\npcs\HumanNPC;
use brokiem\libnpc\utils\SingletonTrait;
use pocketmine\network\mcpe\protocol\AnimatePacket;
use pocketmine\Server;

class AnimationManager {
    use SingletonTrait;

    /**
     * @param HumanNPC $npc
     * @param int $action The action that will broadcasted (eg. AnimatePacket::SWING_ARM)
     */
    public function sendAnimaton(HumanNPC $npc, int $action): void {
        $animatePacket = new AnimatePacket();
        $animatePacket->entityRuntimeId = $npc->getId();
        $animatePacket->action = $action;

        Server::getInstance()->broadcastPackets($npc->getViewers(), [$animatePacket]);

    }
}