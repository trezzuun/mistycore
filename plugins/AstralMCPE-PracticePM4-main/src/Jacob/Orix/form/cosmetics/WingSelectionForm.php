<?php

declare(strict_types=1);

namespace Jacob\Orix\form\cosmetics;

use Jacob\Orix\form\NormalForm;
use pocketmine\player\Player;

class WingSelectionForm extends NormalForm
{
    public function __construct()
    {
        parent::__construct("Wings", "Only MVP and up has access to using particles. \nSelect a particle:");
    }

    public function onResponse(Player $player, $data)
    {
        if ($data && $data === "Back" && $this->previous) {
            $player->sendForm($this->previous);
            return;
        }
        parent::onResponse($player, $data); // TODO: Change the autogenerated stub
    }
}
