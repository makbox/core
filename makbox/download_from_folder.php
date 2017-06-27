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

if(isset($_GET['id']))
   {

    $id = intval($_GET['id']);
 
   
    if($id <= 0) 
   {
        die('The ID is invalid!');
    }

    else 
      {

  require('class_cn.php');

 $obj = new in;
 
  $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];


$conn = new mysqli($host,$user,$pass,$db);

  if($conn->connect_error)
     {
     die ("Cannot connect to server " .$conn->connect_error);
       }

 else
   {

        $sql= " SELECT name, type, size, data FROM folder_uploads 
                WHERE id ='$id' and file_type='canonical'";
        $result = $conn->query($sql);
 
        if($result) 
         {
               while($row = $result->fetch_assoc())
                  {  

                   $name=substr($row['name'],1); // kanei to onoma nea fentai kanonika 
             
                header("Content-Type: ". $row['type']);
                header("Content-Length: ". $row['size']);
                header('Content-Disposition:attachment;filename="' .$name .'"');
 
            
                echo $row['data'];
                }
                  echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>"); 

            }

            else 
            {
              echo '<script type="text/javascript">alert("Error download this file");
                    </script>';
                      echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>");  
                
            }
 
        }//kleisimo ths else gia ta dedoimena
        
       }// kleisimo ths megalhs else

        $conn->close();
    
  }// kleisimos ths megalhs if




?>



