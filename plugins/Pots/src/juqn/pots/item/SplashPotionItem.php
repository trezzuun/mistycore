<?php

declare(strict_types=1);

namespace juqn\pots\item;

use juqn\pots\entity\SplashPotion;
use pocketmine\data\bedrock\PotionTypeIdMap;
use pocketmine\entity\Location;
use pocketmine\entity\projectile\Throwable;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemIds;
use pocketmine\item\ItemUseResult;
use pocketmine\item\PotionType;
use pocketmine\item\ProjectileItem;
use pocketmine\math\Vector3;
use pocketmine\player\Player;

class SplashPotionItem extends ProjectileItem
{
    
    /**
     * SplashPotionItem construct.
     * @param PotionType $type
     */
    public function __construct(
        private PotionType $type
    ) {
        parent::__construct(new ItemIdentifier(ItemIds::SPLASH_POTION, PotionTypeIdMap::getInstance()->toId($type)), $type->getDisplayName());
    }
    
    public function getPotionType(): PotionType
    {
        return $this->type;
    }
    
    /**
     * @param Location $location
     * @param Player $thrower
     * @return Throwable
     */
    protected function createEntity(Location $location, Player $thrower): Throwable
    {
        return new SplashPotion($location, $thrower, $this->type);
    }
    
    /**
     * @return float
     */
    public function getThrowForce(): float
    {
        return 0.5;
    }
    
    /**
     * @return int
     */
    public function getMaxStackSize(): int
    {
        return 1;
    }
}