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

use Phan\Issue;

return [
	'file_list' => [
		'vendor/pmmp/pocketmine-mp/src/PocketMine.php'
	],
	'directory_list' => [
		'src',
		'vendor/phpseclib/phpseclib',
		'vendor/pmmp/pocketmine-mp/src',
		'vendor/pmmp/raklib',
		'vendor/pmmp/spl'
	],
	'analyzed_file_extensions' => ['php'],
	'exclude_analysis_directory_list' => [
		'vendor/'
	],
	'minimum_severity' => Issue::SEVERITY_LOW,
];
