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



CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `photo_name` varchar(64) NOT NULL DEFAULT 'text/plain',
  `photo_type` varchar(32) NOT NULL,
  `photo_size` bigint(20) NOT NULL,
  `photo_data` longblob NOT NULL,
  `background_name` varchar(64) NOT NULL DEFAULT 'text/plain',
  `background_type` varchar(32) NOT NULL,
  `background_size` bigint(20) NOT NULL,
  `background_data` longblob NOT NULL,
  `gender` varchar(8) NOT NULL,
  `date_of_birth` varchar(16) NOT NULL,
  `description` varchar(64) NOT NULL,
  `your_interests` varchar(255) NOT NULL,
  `is_inside` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


