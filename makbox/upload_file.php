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


  if (isset($_POST['submit_file']))
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


        $name = $conn->real_escape_string($_FILES['uploaded_my_file']['name']);
        $type = $conn->real_escape_string($_FILES['uploaded_my_file']['type']);
        $size = $_FILES['uploaded_my_file']['size'];
        $data = $conn->real_escape_string(file_get_contents($_FILES ['uploaded_my_file']['tmp_name']));
       
       $maxsize=16777216;
       


 

     if (empty(file_get_contents($_FILES ['uploaded_my_file']['tmp_name'])))
               {
               echo '<script type="text/javascript">alert("Error. your file is empty or than bigest to 4mb ");
            </script>';
         echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>"); 
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
                    echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>"); 
                     }


                    else
                      {

              $sql="INSERT INTO folder_uploads (name,type,size,data,folder_name,file_type,_from,_to,created) 
                    VALUES(' $name','$type','$size','$data','{$_SESSION['folder']}',
                    'canonical','{$_SESSION['login']}','{$_SESSION['login']}',NOW())";


                   $result=$conn->query($sql);

                  $sql2="INSERT INTO backup_folder_uploads (name,type,size,data,folder_name,file_type,_from,_to,created) 
                        VALUES(' $name','$type','$size','$data','{$_SESSION['folder']}',
                       'canonical','{$_SESSION['login']}','{$_SESSION['login']}',NOW())";

                   $result2=$conn->query($sql2);
                        //echo '<script type="text/javascript">alert("Success your file uploaded");
                       // </script>';
                        sleep(2);
                      echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>"); 

                       } // end ekse size
                       
                      } // end while size

                      } // end else empty or bigest

                     } // kleisimo ths megalhs else
                      
          
  

   echo "<br>";



 $conn->close();

}// kleisimo ths megalhs if

?>
