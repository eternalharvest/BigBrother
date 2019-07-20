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

namespace shoghicp\BigBrother\network;

use ErrorException;

abstract class OutboundPacket extends Packet{

	//Play
	const SPAWN_OBJECT_PACKET = 0x00;
	const SPAWN_EXPERIENCE_ORB_PACKET = 0x01;
	const SPAWN_GLOBAL_ENTITY_PACKET = 0x02;
	const SPAWN_MOB_PACKET = 0x03;
	const SPAWN_PAINTING_PACKET = 0x04;
	const SPAWN_PLAYER_PACKET = 0x05;
	const ANIMATE_PACKET = 0x06;
	const STATISTICS_PACKET = 0x07;
	const BLOCK_BREAK_ANIMATION_PACKET = 0x08;
	const UPDATE_BLOCK_ENTITY_PACKET = 0x09;
	const BLOCK_ACTION_PACKET = 0x0a;
	const BLOCK_CHANGE_PACKET = 0x0b;
	const BOSS_BAR_PACKET = 0x0c;
	const SERVER_DIFFICULTY_PACKET = 0x0d;
	const CHAT_PACKET = 0x0e;
	//Multi Block Change
	const TAB_COMPLETE_PACKET = 0x10;
	//Declare Commands
	const CONFIRM_TRANSACTION_PACKET = 0x12;
	const CLOSE_WINDOW_PACKET = 0x13;
	const OPEN_WINDOW_PACKET = 0x14;
	const WINDOW_ITEMS_PACKET = 0x15;
	const WINDOW_PROPERTY_PACKET = 0x16;
	const SET_SLOT_PACKET = 0x17;
	//TODO SET_COOLDOWN_PACKET = 0x18;
	const PLUGIN_MESSAGE_PACKET = 0x19;
	const NAMED_SOUND_EFFECT_PACKET = 0x1a;
	const PLAY_DISCONNECT_PACKET = 0x1b;
	const ENTITY_STATUS_PACKET = 0x1c;
	//TODO NBT_QUERY_RESPONSE_PACKET = 0x1d;
	const EXPLOSION_PACKET = 0x1e;
	const UNLOAD_CHUNK_PACKET = 0x1f;
	const CHANGE_GAME_STATE_PACKET = 0x20;
	const KEEP_ALIVE_PACKET = 0x21;
	const CHUNK_DATA_PACKET = 0x22;
	const EFFECT_PACKET = 0x23;
	const PARTICLE_PACKET = 0x24;
	const JOIN_GAME_PACKET = 0x25;
	const MAP_PACKET = 0x26;
	const ENTITY_PACKET = 0x27;
	//TODO ENTITY_RELATIVE_MOVE_PACKET = 0x28;
	//TODO ENTITY_LOOK_AND_RELATIVE_MOVE_PACKET = 0x29;
	const ENTITY_LOOK_PACKET = 0x2a;
	//TODO VEHICLE_MOVE_PACKET = 0x2b;
	const OPEN_SIGN_EDITOR_PACKET = 0x2c;
	const CRAFT_RECIPE_RESPONSE_PACKET = 0x2d;
	const PLAYER_ABILITIES_PACKET = 0x2e;
	//TODO COMBAT_EVENT_PACKET = 0x2f;
	const PLAYER_INFO_PACKET = 0x30;
	//Face Player
	const PLAYER_POSITION_AND_LOOK_PACKET = 0x32;
	const USE_BED_PACKET = 0x33;
	const UNLOCK_RECIPES_PACKET = 0x34;
	const DESTROY_ENTITIES_PACKET = 0x35;
	const REMOVE_ENTITY_EFFECT_PACKET = 0x36;
	//TODO RESOURCE_PACK_SEND_PACKET = 0x37;
	const RESPAWN_PACKET = 0x38;
	const ENTITY_HEAD_LOOK_PACKET = 0x39;
	const SELECT_ADVANCEMENT_TAB_PACKET = 0x3a;
	//TODO WORLD_BORDER_PACKET = 0x3b;
	//TODO CAMERA_PACKET = 0x3c;
	const HELD_ITEM_CHANGE_PACKET = 0x3d;
	//TODO DISPLAY_SCOREBOARD_PACKET = 0x3e;
	const ENTITY_METADATA_PACKET = 0x3f;
	//TODO ATTACH_ENTITY_PACKET = 0x40;
	const ENTITY_VELOCITY_PACKET = 0x41;
	const ENTITY_EQUIPMENT_PACKET = 0x42;
	const SET_EXPERIENCE_PACKET = 0x43;
	const UPDATE_HEALTH_PACKET = 0x44;
	//TODO SCOREBOARD_OBJECTIVE_PACKET = 0x45;
	//TODO SET_PASSENGERS_PACKET = 0x46;
	//TODO TEAMS_PACKET = 0x47;
	//TODO UPDATE_SCORE_PACKET = 0x48;
	const SPAWN_POSITION_PACKET = 0x49;
	const TIME_UPDATE_PACKET = 0x4a;
	const TITLE_PACKET = 0x4b;
	//TODO STOP_SOUND_PACKET = 0x4c;
	const SOUND_EFFECT_PACKET = 0x4d;
	//TODO PLAYER_LIST_HEADER_AND_FOOTER_PACKET = 0x4e;
	const COLLECT_ITEM_PACKET = 0x4f;
	const ENTITY_TELEPORT_PACKET = 0x50;
	const ADVANCEMENTS_PACKET = 0x51;
	const ENTITY_PROPERTIES_PACKET = 0x52;
	const ENTITY_EFFECT_PACKET = 0x53;
	//TODO DECLARE_RECIPES_PACKET = 0x54;
	//TODO TAGS_PACKET = 0x55;

	//Status

	//Login
	const LOGIN_DISCONNECT_PACKET = 0x00;
	const ENCRYPTION_REQUEST_PACKET = 0x01;
	const LOGIN_SUCCESS_PACKET = 0x02;

	/**
	 * @deprecated
	 * @throws
	 */
	protected final function decode() : void{
		throw new ErrorException(get_class($this) . " is subclass of OutboundPacket: don't call decode() method");
	}
}
