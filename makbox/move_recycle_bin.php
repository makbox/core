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
         die ("Error connect" .$conn->connect_error);
         }
 

else
{


if(isset($_POST['delete_submit']))
      {
    $idar1 = $_POST['checked_id'];

    foreach($idar1 as $id)
     {
      
      $sql1="insert into recycle_bin select *  from transfer_uploads where id='$id'";
      $result1=$conn->query($sql1);  

        $sql2="DELETE FROM transfer_uploads WHERE id='$id'";
        $result2=$conn->query($sql2);
 
        }

   // $_SESSION['success_msg'] = 'File have been deleted successfully.';
    header("Location: list.php");
     }




if (isset($_POST['delete_files']))
      {
    $idar2 = $_POST['checked_id'];

    foreach($idar2 as $id2)
     {
      
      $sql3="insert into recycle_bin_folder (id,created,file_type,folder_name,name,type,size,data,_from,_to)
             select id,created,file_type,folder_name,name,type,size,data,_from,_to  from folder_uploads
             where id='$id2' and file_type='canonical'";
      $result3=$conn->query($sql3);  

        $sql4="DELETE FROM folder_uploads 
               WHERE id='$id2' and file_type='canonical'";
        $result4=$conn->query($sql4);
 
        }

    //$_SESSION['success_msg'] = 'Files have been deleted successfully.';
          header("Location: list_files.php?folder_name=$_SESSION[folder]");
         echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>"); 
     }




 
  
if (isset($_POST['delete_folder']))
      {
    $folders = $_POST['checked_folder'];

    foreach($folders as $folder)
     {
      
      $sql5="insert into recycle_bin_folder (id,created,file_type,folder_name,name,type,size,data,_from,_to)
             select id,created,file_type,folder_name,name,type,size,data,_from,_to  from folder_uploads
             where folder_name='$folder' and file_type='canonical'";
      $result5=$conn->query($sql5);  

        $sql6="DELETE FROM folder_uploads 
               WHERE folder_name='$folder' and file_type='canonical'";
        $result6=$conn->query($sql6);
 
        }

    //$_SESSION['success_msg'] = 'Folder have been deleted successfully.';
          header("Location: list_folder.php");
        }

   



   }// end of else connection

  



?>
