<?php
/**
 *  ______  __         ______               __    __
 * |   __ \|__|.-----.|   __ \.----..-----.|  |_ |  |--..-----..----.
 * |   __ <|  ||  _  ||   __ <|   _||  _  ||   _||     ||  -__||   _|
 * |______/|__||___  ||______/|__|  |_____||____||__|__||_____||__|
 *             |_____|
 *
 * BigBrother plugin for PocketMine-MP
 * Copyright (C) 2014-2015 shoghicp <https://github.com/shoghicp/BigBrother>
 * Copyright (C) 2016- BigBrotherTeam
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * @author BigBrotherTeam
 * @link   https://github.com/BigBrotherTeam/BigBrother
 *
 */

namespace shoghicp\BigBrother\inventory;

use pocketmine\inventory\PlayerInventory;
use pocketmine\entity\Human;
use pocketmine\item\Item;

class DesktopPlayerInventory extends PlayerInventory{
	public function __construct(Human $player){
		parent::__construct($player);

		// force link the hotbar slot to fixed index
		for($i = 0; $i < $this->getHotbarSize(); ++$i){
			parent::setHotbarSlotIndex($i, 27 + $i);
		}
	}

	/**
	 * This method do nothing, this method overrideds parent method for just disable it
	 *
	 * @param int $hotbarSlot not used
	 * @param int $inventorySlot not used
	 */
	public function setHotbarSlotIndex($hotbarSlot, $inventorySlot){
		$this->getHolder()->getServer()->getLogger()->warning("don't call me!! what do you think of me??");
	}

	/**
	 * Sets the item to the specified hotbar slot
	 * NOTE: I'm not sure why this method is not declared in pmmp but i think this is helpfull
	 *
	 * @param int hotbarSlotIndex number of the hotbar slot to set
	 * @param Item $item
	 *
	 * @return bool if return true if set item was successful, false if not
	 */
	public function setHotbarSlotItem(int $hotbarSlotIndex, Item $item){
		$slot = $this->getHotbarSlotIndex($hotbarSlotIndex);
		if($slot !== -1){
			return $this->setItem($slot, $item);
		}else{
			// something wrong if this code is executed
			return false;
		}
	}
}
