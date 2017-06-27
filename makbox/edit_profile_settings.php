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


 <link rel="stylesheet" type="text/css" href="/css/your_profile.css">


</head>


<body id="body_image_profile">

</body>
</html>



<?php

    if(isset($_POST['update_profile']))
     {


 require('class_cn.php');
 require('function.php');

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


      $nickname = input($_POST['nickname']);
      $descr = input($_POST['descr']);
      $inter = input($_POST['inter']);


       $sql="update profile set nickname='$nickname', description='$descr', your_interests='$inter'
             where username='".$_SESSION['login']."'";
       $result=$conn->query($sql);;

           if($result==true)
             {
         echo '<script type="text/javascript">alert("Your profile updated!");
         </script>';
        echo ("<script>location.href='edit_profile.php'</script>");
           }


      else
        {
      echo '<script type="text/javascript">alert("Something went wrong!");
         </script>';
     echo ("<script>location.href='edit_profile.php'</script>");
         }



  } // end of else



 } // end of isset


?>
