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


$host = $_SESSION['host'];
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$db=$_SESSION['db'];

 $conn = new mysqli($host, $user, $pass,$db);


if ($conn->connect_error) 
   {
    die("Error: " . $conn->connect_error);
     } 


else
  {
 
   $scheme = $_SERVER['REQUEST_SCHEME'] . '://';
   $hostname = getenv('HTTP_HOST');
   $full_host = $scheme.$hostname;

    $background = file_get_contents("$full_host/makbox/background_images_random/photograph.jpg");
    $image_background = $conn->real_escape_string($background);


    $man = file_get_contents("$full_host/makbox/background_images_random/man.png");
    $image_man = $conn->real_escape_string($man);

    
    $woman = file_get_contents("$full_host/makbox/background_images_random/woman.png");
    $image_woman = $conn->real_escape_string($woman);



    $sql1="insert into profile_images_random (id,back_name,back_type,back_size,back_data)
           values ('1','text/plain','image/jpeg','39600','$image_background')";
    $result1=$conn->query($sql1);
  

    $sql2="insert into profile_images_random (id,phot_name,phot_type,phot_size,phot_data,phot_gender)
           values ('2','text/plain','image/png','20001','$image_man','male')";
    $result2=$conn->query($sql2);
  

    $sql3="insert into profile_images_random (id,phot_name,phot_type,phot_size,phot_data,phot_gender)
           values ('3','text/plain','image/png','19003','$image_woman','female')";
    $result3=$conn->query($sql3);
  

     if($result1==true && $result2==true && $result3==true)
        {
       header('Refresh: 2;URL=index3.php');
         }




   } // end else of connect


 




?>
