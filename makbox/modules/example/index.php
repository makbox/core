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
 
<title> Mak cloud </title>
 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" /> 


 <link rel="stylesheet" type="text/css" href="index.css">


 <meta http-equiv="refresh" content="10">


</head>




<body>


</body>
</html>




<?php



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

     echo "<div align='center'> <u> Welcome your profile $_SESSION[login] </u> </div> .'<br>'";



      $sql ="select instant,ip_addr,browser,username from login_error_attempts 
             where username='".$_SESSION['login']."'";
      $result = $conn->query($sql);     
      


     while ($row = $result->fetch_assoc())
          {
           echo "<div align='center'>";
           echo $row['instant'] ." " .$row['ip_addr'] ." " .$row['browser'] ." " .$row['username'] ."<br>" ."<br>";
           echo "</div>";
          }



       echo "<div align='center'> <a href='/list.php'> Back your profile </a> </div>";
 




  } // end of else connect


  $conn->close();


?>
