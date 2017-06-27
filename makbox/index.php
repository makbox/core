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


?>


<!DOCTYPE html>
<html>
<head> 

<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="description" content="Free programmers community" />
<meta name="google-site-verification" content="hh915M86TDAFCv-hw0wsyiDpKBTUcfzkBbFuakhVqVU" />


<title> Makbox </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />

<meta name="keywords" content="freeproc,freproc,free proc,free programmers,free programmers community,mak cloud,free transfer files,filemania,filemania transfer" />

  


 <link rel="stylesheet" type="text/css" href="/css/index.css">


<script>
 function coo()
 {
if 
(location.href.indexOf('reload')==-1) 
location.replace(location.href+'?reload'+alert('The mak cloud uses cookies for a better user safety'))
 }
</script>





<style>
.alert {
    padding: 20px;
    background-color:#283B4C;
    opacity:0.8;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>






</head>

<body id="body" bgcolor="white" onload="co()">






   <!--
 <div align="center"> <img src="/photos/footer/cloud_footer3.png" height="200" width="800" id="img-grey"> </div>
   --> 



    <div id="header" align="center">
      The <strong> mak box </strong> is one cloud computing for files transfer and storage.
     </div>




    <br><br><br><br>

 <div align="center">
 <div class="demo">
  <h1 id="h">
  <font color=""> Mak </font> box
   </h1>


  <h1 id="hh">
  Sign in to continue to Mak box
   </h1>
  </div>
  </div>


    <div align="center">
   <form action="login.php" method="POST" id="form1">
       <br><br>
     <img src="/photos/menu/user_login3.png" height="160" width="180" id="img-grey">     
        <br> <br>
&nbsp;  <input type="text" name="username" id="name"  placeholder="Username" maxlength="16" required> 
         <br> 
  &nbsp;    <input type="password" name="password" id="pass" placeholder="Password" maxlength="32" required>
       <br> 
  &nbsp;    <input type="submit" name="submit" id="submit" value="Sign in">
        <br> <br>
 &nbsp;   <a href="signup.php" id="a"> <b> Sign up </b> </a>
 &nbsp;  <a href="forgot.php" id="forgot"> <b> Forgot your password? </b> </a>
     <br><br>
 &nbsp; <a href="1_connection.php" id="one_use"> <b> New service: Connection disposable </b> </a>
    </form>
    </div>





   <div class="footer">
 <div class="alert" align="center">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <strong>Safe!</strong> The mak box uses cookies for a better user safety.
   </div>
  </div>



</body>
</html>





<?php

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


  $sql="select ip_address from block_ip";
  $result=$conn->query($sql);

       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql2="insert log_file (username,ip_addr,path,connect) values('$username','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  

    while ($row=$result->fetch_assoc())
       {

        if($row['ip_address']==$_SERVER['REMOTE_ADDR']) 
         {
          header("location:/error");
              exit();
           }

         

   else
   {   

/*
//pernwntas ip kai mac
$ip=$_SERVER['REMOTE_ADDR'];
$mac_string = shell_exec("arp -a $ip");
$mac_array = explode(" ",$mac_string);
$mac = $mac_array[3];
*/

//pernwntas ta apotupwmata twn cookies

    $length = 30;
   $cookie_id= substr(str_shuffle
   ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+|-=[]{};./:?>< "),0, $length);
   
     $cookie_name="user_cloud";

     setcookie($name,$cookie_id,time() + (3600),"/",false,true);

     


 } // kleisimo ths else gia ton elenxo ths ip

 } // kleisimo ths while gia ton elenxo ths ip

  $conn->close();

 }

?>
