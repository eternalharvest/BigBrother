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
	/**
	 * This method do nothing, this method overrideds parent method for just disable it.
	 * According to the comment of `PlayerInventory#setHotbarSlotIndex()`, this method should not be used within plugins.
	 * But this code also disable within PMMP.
	 *
	 * TODO consider well about hotbar link function
	 *
	 * @param int $hotbarSlot not used
	 * @param int $inventorySlot not used
	 */
	public function setHotbarSlotIndex($hotbarSlot, $inventorySlot) : void{
		$this->getHolder()->getServer()->getLogger()->warning("don't call me!! hotbarSlot: $hotbarSlot; inventorySlot: $inventorySlot");
	}

	/**
	 * Sets the item to the specified hotbar slot.
	 * NOTE: I'm not sure why this method is not declared in pmmp but i think this is helpfull
	 *
	 * @param int $hotbarSlotIndex number of the hotbar slot to set
	 * @param Item $item
	 *
	 * @return bool true if set item is succeed else false
	 */
	public function setHotbarSlotItem(int $hotbarSlotIndex, Item $item) : bool{
		$inventorySlot = $this->getHotbarSlotIndex($hotbarSlotIndex);
		if($inventorySlot !== -1){
			return $this->setItem($inventorySlot, $item);
		}else{
			return false;
		}
	}
}
