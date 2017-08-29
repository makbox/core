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



CREATE TABLE IF NOT EXISTS `profile_images_random` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `back_name` varchar(64) NOT NULL DEFAULT 'text/plain',
  `back_type` varchar(32) NOT NULL,
  `back_size` int(20) NOT NULL,
  `back_data` longblob NOT NULL,
  `phot_name` varchar(64) NOT NULL DEFAULT 'text/plain',
  `phot_type` varchar(32) NOT NULL,
  `phot_size` bigint(20) NOT NULL,
  `phot_data` longblob NOT NULL,
  `phot_gender` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

