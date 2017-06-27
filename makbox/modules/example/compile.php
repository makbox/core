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

if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }

 else
   {


ini_set('display_errors', 1);
error_reporting(E_ALL);

  $folder=getcwd();

  $current_folder=substr("$folder",9);


 require("/var/www/$current_folder/class_cn.php");

 $obj = new in;
 
 $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

   $conn = new mysqli($host,$user,$pass,$db);

     if ($conn->connect_error)
         {
         die ("Error connect" .$conn->connect_error);
         }
 



   else
    {

   
   $scheme = $_SERVER['REQUEST_SCHEME'] . '://';
   $hostname = getenv('HTTP_HOST');
   $full_host = $scheme.$hostname;



     $api_key="12DEAA2209001287AB00EDFA9902111C";
     $secret_key="99DC1A1C099033779B0C0EF0A9F02F81";
     $user = $_SESSION['login'];


     // give path info from icon (icon.png is module icon)
      $icon = file_get_contents("$full_host/modules/example/icon.png");
      $app_icon = $conn->real_escape_string($icon);


      // give path info from subfolder (subfolder is module name)
     $path = pathinfo("/var/www/$current_folder/modules/example");
     $name = $path['basename'];


     $sql = "select api_key,secret_key from modules_details where user_login='$user'";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();


         if ($row['api_key']==$api_key && $row['secret_key']==$secret_key)
             {
   
             $sql_ins = "insert into modules (api_key,secret_key,app_icon,app_name,blank,enabled,user_login)
                       values ('$api_key','$secret_key','$app_icon','$name','&nbsp;&nbsp;','off','$user')";

            $result_ins = $conn->query($sql_ins);
            

             if($result_ins==true)
               {
            echo "<script type='text/javascript'>alert('Compile module is ok...Activate module from here!');
                   </script>";
                echo ("<script>location.href='/user_modules.php'</script>");
                }


                }
  

              
 


  } // end of else connect


  $conn->close();


 } // end else of session


?>
