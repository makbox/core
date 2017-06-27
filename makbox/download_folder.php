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


if(isset($_GET['folder_name']))
   {

    $folder_name =$_GET['folder_name'];
   
    if(!$folder_name) 
   {
        die('The files not exists');
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


 
   
        $user_login=$_SESSION['login'];
 
        $sql = "select name,type,size,data from folder_uploads 
                where _to='$user_login' and folder_name='$folder_name'";
        $result = $conn->query($sql);

        if ($result) 
               {
         
            if ($result->num_rows > 1)
                  {
               
                while ($row = $result->fetch_assoc())
                  {

                //ziparontas ta arxeia


               

                $zip = new ZipArchive();
                $filename = "$folder_name"  ."_" .date('Y.m.d H.i.s') .".zip";

                if ($zip->open($filename, ZIPARCHIVE::CREATE | ZIPARCHIVE::OVERWRITE) !== true) 
                    {
                    echo "Cannot Open for writing";
                    } 

                $array_name[] = $row["name"];
                $array_data[] = $row["data"];
                

                
              foreach(array_combine($array_name, $array_data) as $file_name => $file_data) 
                  {  
                $ext = $file_name; 
                $zip->addFromString($ext, $file_data); 
                     }

                //$ext = $row['name']; // taking file name from DB and adding extension separately
               // $zip->addFromString($ext, $row['data']); //adding blob data from DB
                $zip->close();
                   

             header("Content-disposition: inline; filename=$filename");
             //header("Content-Length: ". $row['size']);
            header('Content-type: application/zip');
            readfile($filename);
            unlink($filename);
            
              } // end of while


             } // end of num rows

           } // end of result





 } // kleisimo ths else gia ta dedomena

$result->free_result();
$conn->close();

}

}

?>
