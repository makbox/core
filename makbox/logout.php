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


session_start();
 
 require('class_cn.php');

 $obj = new in;
 
  $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

  
 $conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) 
    {
    die("Connect error " .$conn->connect_error);
     } 


     else
       {
    $sql="update profile set is_inside='no' where username='".$_SESSION['login']."'";
    $result=$conn->query($sql); 

    $sql2="update users_activities set log_out_time=NOW() 
           where username='".$_SESSION['login']."' and fingerprint='".$_SESSION['fingerprint']."'";
    $result2=$conn->query($sql2);


    session_destroy();
    header('Location: index.php');  
    }

?>
