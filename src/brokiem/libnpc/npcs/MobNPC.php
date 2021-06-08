<?php

declare(strict_types=1);

namespace brokiem\libnpc\npcs;

use pocketmine\entity\Entity;
use pocketmine\entity\EntitySizeInfo;

abstract class MobNPC extends Entity {
    protected $gravity = 0.0;

    abstract public static function getNetworkTypeId(): string;

    abstract protected function getInitialSizeInfo(): EntitySizeInfo;
}