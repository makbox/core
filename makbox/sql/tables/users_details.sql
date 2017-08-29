/*
 * Copyright (c) 2016-2017 Barchampas Gerasimos <http://makbox.co.nf/>
 * Makbox is a personal (staas) cloud.
 *
 * Makbox is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * Makbox is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */





SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `php_start` varchar(8) NOT NULL,
  `class` varchar(8) NOT NULL,
  `agg1` varchar(8) NOT NULL,
  `public` varchar(32) NOT NULL,
  `public_func` varchar(64) NOT NULL,
  `agg2` varchar(8) NOT NULL,
  `array0` varchar(128) NOT NULL,
  `array1` varchar(128) NOT NULL,
  `array2` varchar(128) NOT NULL,
  `array3` varchar(128) NOT NULL,
  `agg3` varchar(8) NOT NULL,
  `agg4` varchar(8) NOT NULL,
  `php_end` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `time` (`time`),
  UNIQUE KEY `php_start` (`php_start`),
  UNIQUE KEY `class` (`class`),
  UNIQUE KEY `agg1` (`agg1`),
  UNIQUE KEY `public` (`public`),
  UNIQUE KEY `public_func` (`public_func`),
  UNIQUE KEY `agg2` (`agg2`),
  UNIQUE KEY `array0` (`array0`),
  UNIQUE KEY `array1` (`array1`),
  UNIQUE KEY `array2` (`array2`),
  UNIQUE KEY `array3` (`array3`),
  UNIQUE KEY `agg3` (`agg3`),
  UNIQUE KEY `agg4` (`agg4`),
  UNIQUE KEY `php_end` (`php_end`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


