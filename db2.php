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

    $folder=getcwd();

   $current_folder=substr("$folder",9);

 

   $sql="select php_start,class,agg1,public,public_func,agg2,array0,array1,array2,array3,agg3,agg4,php_end
        from users_details where id=1";
    $result=$conn->query($sql);

      if($result)
      {
     $file = fopen("/var/www/$current_folder/makbox/class_cn.php", "w");
       while ($row=$result->fetch_assoc())
          {

          foreach ($row as $line)
         {
        fwrite($file, $line."\n");
          }

           }// end of while

          fclose($file);
    header('Location: db3.php');
      } // end of result


  else
   {
    header('Location: index2.php');
     }


 } // end fo else 

$conn->close();


 

?>
