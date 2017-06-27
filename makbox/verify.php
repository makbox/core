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



<html>
<head>

  
   <title> Makbox </title>
 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" /> 


 <link rel="stylesheet" type="text/css" href="/css/verify.css">
 

</head>

<body id="body">


    <div align="center">
      <h2> <font color="purple"> <i> <b> Verification account </b> </i> </font> </h2>
     </div>

       <br>

     <div align="center">
   <img src="/photos/pass_check.png" height="230" width="300">
     </div>  


   
    <br> <br><br>

   <div align="center">
  <form action="" method="POST">
   <input type="text" name="verify_key" id="verify" placeholder="Enter verification code" 
          pattern= "[0-9]{6}"  title= "Verification code 6 digits" autofocus="autofocus">
      <br><br>
    <input type="submit" name="submit" id="sub" value="Verify">
   </form>
   </div>


</body>

</html>



<?php


if (isset($_POST['submit']))
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
 
   if(empty($_POST['verify_key']))
     {
     echo '<script type="text/javascript">alert("This field is require");
         </script>';
     echo ("<script>location.href='verify.php'</script>");
      }





  else
   {
    
     require 'function.php'; 
  

    $verify_key = input($_POST['verify_key']);
    



     if($verify_key==$_SESSION['verify_id'])
        {
          $sql="update login set verify='yes'
                where username='".$_SESSION['verify_name']."'";       
          $result=$conn->query($sql);
         echo '<script type="text/javascript">alert("Sign up seccussfully");
         </script>';
     echo ("<script>location.href='index.php'</script>");
           }


        else
          {
         echo '<script type="text/javascript">alert("Verification error please try again");
         </script>';
     echo ("<script>location.href='verify.php'</script>");
           }




    } //end else data

 

  } // end else connection



   $conn->close();  

 
  } // end if isset


?>
