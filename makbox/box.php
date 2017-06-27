<html>
<head>

<title> Makbox </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />


    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" type="text/css" href="/css/box.css">

</head>


<body id="body">

 

     

  
 <div align="center">
 <p id="menu">
   <table align="center" id="table">
<form action="upload.php" method="post" enctype="multipart/form-data" id="form">

      <tr>
<h2 align="center"> Online files transfer </h2>
       </tr>


     <tr>
 <th> Transfer file </th> 
 <th> Enter a name  </th> 
 <th> Upload file </th>
 <th> Your profile </th>
  </tr>

   <tr>
  <td id="td">  <input type="file" name="uploaded_file" id="file" required> </td> 
  <td id="td">  <input type="text" name="to" size="17" placeholder="Name" id="name" required> </td>
  <td id="td">  <button type="submit" name="submit" id="upload" ><img src="/photos/menu/cloud-upload.png" height="100%" width="100%"> </button> </td>
  <td id="td">  <a href="list.php" id="button"><img src="/photos/menu/profil.png" height="50" width="70"> </a>  </td>
  </tr>

  </table>
</p>
</div>




<div class="footer">

</div>




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


 require('class_cn.php');

 $obj = new in;
 
 $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

  
 $conn = new mysqli ($host,$user,$pass,$db);

if ($conn->connect_error) 
    {
    die("Connect error " .$conn->connect_error);
   } 

 else
   {


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

   
    $sql="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result=$conn->query($sql);  
  
     

   } // end of big else 



?>
 

</body>
</html>



     
