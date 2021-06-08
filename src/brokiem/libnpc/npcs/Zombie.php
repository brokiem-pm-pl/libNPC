<?php

declare(strict_types=1);

namespace brokiem\libnpc\npcs;

use pocketmine\entity\EntitySizeInfo;
use pocketmine\network\mcpe\protocol\types\entity\EntityIds;

class Zombie extends MobNPC {

    public static function getNetworkTypeId(): string {
        return EntityIds::ZOMBIE;
    }

    protected function getInitialSizeInfo(): EntitySizeInfo {
        return new EntitySizeInfo(1.8, 0.6);
    }
}