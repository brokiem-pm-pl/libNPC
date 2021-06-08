<?php

declare(strict_types=1);

namespace brokiem\libnpc\manager;

use brokiem\libnpc\npcs\HumanNPC;
use brokiem\libnpc\npcs\MobNPC;
use brokiem\libnpc\utils\SingletonTrait;
use pocketmine\entity\Location;
use pocketmine\entity\Skin;
use pocketmine\nbt\tag\CompoundTag;
use ReflectionClass;

class NPCManager {
    use SingletonTrait;

    public function spawn(string $class, Location $location, CompoundTag $nbt = null, Skin $skin = null): void {
        if (!class_exists($class)) {
            throw new \RuntimeException("Class $class not found.");
        }

        $ref = new ReflectionClass($class);
        if (!$ref->isAbstract()) {
            if ($nbt === null) {
                $nbt = CompoundTag::create()->setString("Identifier", uniqid("", true));
            } else {
                $nbt->setString("Identifier", uniqid("", true));
            }

            if (is_a($class, MobNPC::class, true)) {
                /** @var MobNPC $npc */
                $npc = new $class($location, $nbt);
            } elseif (is_a($class, HumanNPC::class, true)) {
                /** @var HumanNPC $npc */
                $npc = new $class($location, $skin, $nbt);
            } else {
                throw new \RuntimeException("Class $class doesn't extend the MobNPC or HumanNPC class");
            }

            $npc->spawnToAll();
        }
    }

    /**
     * @param HumanNPC|MobNPC $npc
     */
    public function despawn($npc): bool {
        if (!$npc->isFlaggedForDespawn()) {
            $npc->flagForDespawn();

            return true;
        }

        return false;
    }
}