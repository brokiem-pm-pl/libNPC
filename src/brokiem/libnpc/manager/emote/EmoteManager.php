<?php

declare(strict_types=1);

namespace brokiem\libnpc\manager\emote;

use brokiem\libnpc\npcs\HumanNPC;
use brokiem\libnpc\utils\SingletonTrait;
use pocketmine\network\mcpe\protocol\EmotePacket;

class EmoteManager {
    use SingletonTrait;

    public function sendEmote(HumanNPC $npc, string $emoteId, int $flags = EmotePacket::FLAG_SERVER): void {
        $emotePacket = EmotePacket::create($npc->getId(), $emoteId, $flags);

        foreach ($npc->getViewers() as $player) {
            $player->getNetworkSession()->sendDataPacket($emotePacket);
        }
    }
}