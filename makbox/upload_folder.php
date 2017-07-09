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



?>


<html>
<head>


<title> Makbox </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />


 <link rel="stylesheet" type="text/css" href="/css/upload.css"> 

</head>

<body id="body">
 
 
 <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
 
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br>  

</body>

</html>



<?php


  if (isset($_POST['submit_folder']))
      {

  define('KB', 1024);
  define('MB', 1048576);
  define('GB', 1073741824);
  define('TB', 1099511627776);

     require('class_cn.php');

 $obj = new in;
 
  $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];


       $conn = new mysqli($host,$user,$pass,$db);
         

        if ($conn->connect_error)
           {
            die ("Connect error " .$conn->connect_error);
            }
 



   else
      {

       // if(isset($_POST['uploaded_folder']))
             //   {
     
	foreach($_FILES['uploaded_folder']['tmp_name'] as $key => $tmp_name)
             {    
		$name = $conn->real_escape_string($_FILES['uploaded_folder']['name'][$key]);
		$size = $conn->real_escape_string($_FILES['uploaded_folder']['size'][$key]);
                $type = $_FILES['uploaded_folder']['type'][$key];
		$data = $conn->real_escape_string(file_get_contents($_FILES['uploaded_folder']['tmp_name'][$key]));
			  
	       $folder_name=$conn->real_escape_string($_POST['folder_name']);


             if (empty(file_get_contents($_FILES ['uploaded_folder']['tmp_name'][$key])))
               {
               echo '<script type="text/javascript">alert("Error. your file is empty or than bigest to 4mb ");
            </script>';
         echo ("<script>location.href='list_folder.php'</script>"); 
                }


     
       else
         {

               $sql_size="select space_used,space_limit from hard_disk where user='".$_SESSION['login']."'";
               $result_size=$conn->query($sql_size);
                   

                  while($row_size=$result_size->fetch_assoc())
                    {

                   if($row_size['space_used']>=$row_size['space_limit']) // 100 megabytes
                  {
                echo '<script type="text/javascript">alert("Failed mission. your storage space is insufficient!");
                      </script>';
                 echo ("<script>location.href='list_folder.php'</script>"); 
                   }


          else
            {
 
       $sql2="insert into folder_uploads (folder_name,file_type,name,type,size,data,created,_from,_to) 
       VALUES('$folder_name','canonical','$name','$type','$size','$data',NOW(),'{$_SESSION['login']}','{$_SESSION['login']}')";
       $result2=$conn->query($sql2);

         $sql3="insert into backup_folder_uploads (folder_name,file_type,name,type,size,data,created,_from,_to) 
       VALUES('$folder_name','canonical','$name','$type','$size','$data',NOW(),'{$_SESSION['login']}','{$_SESSION['login']}')";
        $result3=$conn->query($sql3);

    
                 $sql4="update hard_disk set space_used = space_used + $size where user='".$_SESSION['login']."'";            
                 $result4=$conn->query($sql4);


            shell_exec('shell/./unlock.sh');

            $uploads_dir  = $_SERVER['DOCUMENT_ROOT'];
            $your_folder  = $_SESSION['login'];
            $copy = copy($_FILES['uploaded_folder']['tmp_name'][$key], "$uploads_dir/shared/$your_folder/" . $name);
 
            shell_exec('shell/./lock.sh');


        // echo '<script type="text/javascript">alert("Success your file uploaded");
                       // </script>';
                      sleep(2);
                      echo ("<script>location.href='list_folder.php'</script>"); 
             
             } // end of else size

            }// end of while size
 
            }// end of else upload folder

          } // end of foreach

         }  //end of else for connect


    $conn->close();


   } // end of if isset


?>
