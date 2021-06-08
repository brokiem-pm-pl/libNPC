<?php

declare(strict_types=1);

namespace brokiem\libnpc\npcs;

use pocketmine\entity\Entity;
use pocketmine\entity\EntitySizeInfo;
use pocketmine\nbt\tag\CompoundTag;

abstract class MobNPC extends Entity {
    protected $gravity = 0.0;
    protected string $identifier;

    abstract public static function getNetworkTypeId(): string;

    public function getIdentifier(): string {
        return $this->identifier;
    }

    protected function initEntity(CompoundTag $nbt): void {
        $this->identifier = $nbt->getString("Identifier");
        parent::initEntity($nbt);
    }

    abstract protected function getInitialSizeInfo(): EntitySizeInfo;
}