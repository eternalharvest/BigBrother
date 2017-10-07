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

declare(strict_types=1);

namespace shoghicp\BigBrother\item;

use pocketmine\item\Item;

/**
 * this class behave like Item class but type is not compatible
 */
class DesktopItem{
	/** @var Item */
	protected Item $item;

	/**
	 * @var int    $id
	 * @var int    $meta
	 * @var string $name
	 */
	public function __construct(int $id, int $meta=0, string $name="Unknown"){
		$this->item = new Item($id, $meta, $name);
	}

	/**
	 * @var string $name
	 * @return mixed
	 */
	public function __get(string $name){
		return $this->item->$name;
	}

	/**
	 * @var string $name
	 * @var mixed  $value
	 */
	public function __set(string $name, $value){
		$this->item->$name = $value;
	}

	/**
	 * @var string $name
	 * @var array  $args
	 * @return mixed
	 */
	public function __call(string $name, array $args){
		return $this->item->$name(...$args);
	}

	public function toPE() : Item{
		$item = clone $this->item;
		//TODO convert item data
		return $item;
	}

	/**
	 * @var int    $id
	 * @var int    $meta
	 * @var int    $count
	 * @var string $nbt
	 * @return DesktopItem
	 */
	public static function get(int $id, int $meta=0, int $count=1, string $nbt="") : DesktopItem{
		$item = new DesktopItem($id, $meta);
		$item->setCount($count);

		//TODO convert item data
		//TODO convert nbt data

		return $item;
	}
}
