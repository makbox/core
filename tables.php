<?php


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




  // makbox database tables structure

 // (all users details)
$sql1="CREATE TABLE IF NOT EXISTS `all_users_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(32) NOT NULL,
  `mac_address` varchar(32) NOT NULL,
  `folder` varchar(64) NOT NULL,
  `cookies` varchar(128) NOT NULL,
  `name` varchar(32) NOT NULL,
  `visit_profile` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
 



      //(backup_folder_uploads)
   $sql2="CREATE TABLE IF NOT EXISTS `backup_folder_uploads` (
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
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";  




       // (backup_login)
    $sql3="CREATE TABLE IF NOT EXISTS `backup_login` (
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";


       
      // (backup messages)
    $sql4="CREATE TABLE IF NOT EXISTS `backup_messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_from` varchar(16) NOT NULL,
  `_to` varchar(16) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;";




     // (block ip)
   $sql5="CREATE TABLE IF NOT EXISTS `block_ip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(32) NOT NULL,
  `user` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_address` (`ip_address`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
 

       
      // (contact)
    $sql6="CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";



     
      // (deleted accounts)
    $sql7="CREATE TABLE IF NOT EXISTS `deleted_accounts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `deleted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `ip_addr` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";



     
      // (details)
    $sql8="CREATE TABLE IF NOT EXISTS `details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_addr` varchar(32) NOT NULL,
  `mac_addr` varchar(32) NOT NULL,
  `folder` varchar(15) NOT NULL,
  `cookies` varchar(32) NOT NULL,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";



     
      // (folder uploads)
    $sql9="CREATE TABLE IF NOT EXISTS `folder_uploads` (
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
  `path` varchar(128) NOT NULL,
  `visit_path` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";



     // (forgot)
   $sql10="CREATE TABLE IF NOT EXISTS `forgot` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `when_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `result` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";




     
      // (hard disk)
    $sql11="CREATE TABLE IF NOT EXISTS `hard_disk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(32) NOT NULL,
  `space_used` varchar(128) NOT NULL,
  `space_limit` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";



     
      // (history)
    $sql12="
  CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `_from` varchar(32) NOT NULL,
  `_to` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(64) NOT NULL DEFAULT 'text/plain',
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";




       // (login)
    $sql13="CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(32) NOT NULL DEFAULT 'NOT NULL',
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `forgot_text` varchar(32) NOT NULL,
  `one_connection` varchar(32) NOT NULL,
  `verify` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";




       // (login error attempts)
    $sql14="CREATE TABLE IF NOT EXISTS `login_error_attempts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `instant` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_addr` varchar(64) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";




       // (log file)
    $sql15="CREATE TABLE IF NOT EXISTS `log_file` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `ip_addr` varchar(32) NOT NULL,
  `path` varchar(128) NOT NULL,
  `connect` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";




    // (mail)
    $sql16="CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `smtp_server` varchar(32) NOT NULL,
  `smtp_user` varchar(32) NOT NULL,
  `smtp_pass` varchar(32) NOT NULL,
  `smtp_auth` varchar(8) NOT NULL,
  `smtp_port` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `smtp_user` (`smtp_user`),
  UNIQUE KEY `smtp_pass` (`smtp_pass`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";





    // (messages)
    $sql17="CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `_from` varchar(16) NOT NULL,
  `_to` varchar(16) NOT NULL,
  `message` varchar(255) NOT NULL,
  `path` varchar(32) NOT NULL,
  `visit_path` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `message` (`message`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";





    // (modules)
    $sql18="CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_login` varchar(16) NOT NULL,
  `api_key` varchar(32) NOT NULL,
  `secret_key` varchar(32) NOT NULL,
  `app_icon` longblob NOT NULL,
  `app_name` varchar(16) NOT NULL,
  `blank` varchar(20) NOT NULL,
  `enabled` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";





    // (modules details)
    $sql19="CREATE TABLE IF NOT EXISTS `modules_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_login` varchar(16) NOT NULL,
  `api_key` varchar(32) NOT NULL,
  `secret_key` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `secret_key` (`secret_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";





    // (profile)
    $sql20="CREATE TABLE IF NOT EXISTS `profile` (
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
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";






      // (profile images random)
    $sql21="CREATE TABLE IF NOT EXISTS `profile_images_random` (
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
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";




     // (recycle bin folder)
    $sql22="CREATE TABLE IF NOT EXISTS `recycle_bin_folder` (
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
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";





    // (users activities)
    $sql23="CREATE TABLE IF NOT EXISTS `users_activities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `ip_addr` varchar(64) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `log_in_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_out_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `fingerprint` varchar(32) NOT NULL,
  `cookies` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=376 ;";






    // (users details)
    $sql24="CREATE TABLE IF NOT EXISTS `users_details` (
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
  ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";



?>
