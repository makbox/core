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



  if (isset($_POST['submit']))
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

  $to=$_POST['to'];
     
 
    $to = htmlspecialchars($to);
    $to = trim($to);
    $to = stripslashes($to);
    $to = $conn->real_escape_string($to);

  


        $name = $conn->real_escape_string($_FILES['uploaded_file']['name']);
        $type = $conn->real_escape_string($_FILES['uploaded_file']['type']);
        $size = $_FILES['uploaded_file']['size'];
        $data = $conn->real_escape_string(file_get_contents($_FILES ['uploaded_file']['tmp_name']));
       
       $maxsize=16777216;
      


     if (empty(file_get_contents($_FILES ['uploaded_file']['tmp_name'])))
               {
               echo '<script type="text/javascript">alert("Error. your file is empty or than bigest to 2mb ");
            </script>';
         echo ("<script>location.href='box.php'</script>"); 
                }



                
            else
              {   

               $sql="select username from login";
               $result = $conn->query($sql);
               
              while($row = $result->fetch_assoc())
                   {
              if($row['username']==$to)
                     {

               $sql_size="select space_used,space_limit from hard_disk where user='$to'";
               $result_size=$conn->query($sql_size);
                   

                  while($row_size=$result_size->fetch_assoc())
                    {

                   if($row_size['space_used']>=$row_size['space_limit']) // 100 megabytes
                    {
                  echo '<script type="text/javascript">alert("Failed mission. recipients storage space is insufficient!");
                       </script>';
                    echo ("<script>location.href='box.php'</script>"); 
                     }



                    else
                      {
                 $path ="/list_files.php?folder_name=($to)";


                 $sql1="INSERT INTO folder_uploads (file_type,folder_name,name,type,size,data,_from,_to,path,visit_path,created) 
                    VALUES('canonical','($to)','$name','$type','$size','$data','{$_SESSION['login']}','$to','$path','no',NOW())";
                 $result1=$conn->query($sql1);

                    $sql2="INSERT INTO backup_folder_uploads (file_type,folder_name,name,type,size,data,_from,_to,created) 
                    VALUES('canonical','($to)','$name','$type','$size','$data','{$_SESSION['login']}','$to',NOW())";
                   $result2=$conn->query($sql2);

                   $sql3="insert into history (created,_from,_to,name,type)
                          select created,_from,_to,name,type from folder_uploads 
                          where created=NOW()";
                   $result3=$conn->query($sql3);


                   $sql4="update hard_disk set space_used = space_used + $size where user='$to'";            
                   $result4=$conn->query($sql4);


                        echo '<script type="text/javascript">alert("Success your file uploaded");
                        </script>';
                      echo ("<script>location.href='box.php'</script>"); 
                         } // end else size
                         } // end of while size   

                  

                       //else 
                        // {
                      // echo '<script type="text/javascript">alert("This name does not exist!");
                       // </script>';
                      //echo ("<script>location.href='box.php'</script>");
                          //  }


                         }//  end if username


                        } // end of while username

                       } // end of small else


                     } // end of big else
                      
          
  

   echo "<br>";



  echo '<div align="center"> <a href="box.php"><font color="black" size="4"> <b> Go back to box </a> </b> </font> </p>';


  $conn->close();


 }// end fo if sumbmit


?>
