<?php

declare(strict_types=1);

namespace brokiem\libnpc\npcs;

use pocketmine\entity\Human;
use pocketmine\nbt\tag\CompoundTag;

class HumanNPC extends Human {
    protected $gravity = 0.0;
    protected string $identifier;

    public function getIdentifier(): string {
        return $this->identifier;
    }

    protected function initEntity(CompoundTag $nbt): void {
        $this->identifier = $nbt->getString("Identifier");
        parent::initEntity($nbt);
    }
}