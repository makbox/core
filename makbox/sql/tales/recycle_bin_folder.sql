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



CREATE TABLE IF NOT EXISTS `recycle_bin_folder` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_type` varchar(16) NOT NULL,
  `folder_name` varchar(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` varchar(64) NOT NULL DEFAULT 'text/plain',
  `size` bigint(20) unsigned NOT NULL,
  `data` longblob NOT NULL,
  `_from` varchar(16) NOT NULL,
  `_to` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

