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


$conn = new mysqli ($host,$user,$pass,$db);

if($conn->connect_error)
  {
  die("Database connection failed: " .$conn->connect_error);
   }


 else
 
  {

   


if(isset($_POST['restore_submit']))
      {
    $idarr = $_POST['checked_id'];


    foreach($idarr as $id)
     {


        $sql4="insert into folder_uploads (id,created,file_type,folder_name,name,type,size,data,_from,_to)
               select id,created,file_type,folder_name,name,type,size,data,_from,_to from recycle_bin_folder where id='$id'";
        $result4=$conn->query($sql4);

        $sql5="DELETE FROM recycle_bin_folder WHERE id='$id'";
        $result5=$conn->query($sql5);
      
      
        }






    $_SESSION['success_msg'] = 'File have been restore successfully.';
    header("Location: recycle_bin.php");
     }


else if(isset($_POST['delete_submit']))
      {
    $idarr = $_POST['checked_id'];

    foreach($idarr as $id)
     {

        $sql2="DELETE FROM recycle_bin_folder WHERE id='$id'";
        $result2=$conn->query($sql2);


       $sql3="update hard_disk set space_used = (select sum(size) from folder_uploads where  _to= hard_disk.user)";            
       $result3=$conn->query($sql3);

        }

    $_SESSION['success_msg'] = 'File have been delete successfully.';
    header("Location: recycle_bin.php");
     }



  } // end else of connect


?>
  
