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

	
       <script type="text/javascript"> window.location.href="index.php"; </script>
	 <meta http-equiv="refresh" content="0; URL=index.php"> 


</head>

<body>




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
 
   if(empty($_POST['username'] || $_POST['password']))
     {
     echo '<script type="text/javascript">alert("This fields are requireds");
         </script>';
     echo ("<script>location.href='index.php'</script>");
      }

else
{

$username=$_POST['username'];
$password=md5($_POST['password']);


     $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);
   $username = trim($username);
   $password = trim($password);
   $username = stripslashes($username);
  $password = stripslashes($password);
  $username = $conn->real_escape_string($username);
  $password = $conn->real_escape_string($password); 





  $sql ="select username,password,email,verify from login 
         where binary username='$username' and password='$password' and verify='yes'";
  $result=$conn->query($sql);
  $rows = $result->num_rows;



   if ($rows == 1) 
    {

    $sql2="update profile set is_inside='yes' where username='$username'";
    $result2=$conn->query($sql2);

       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql3="insert log_file (username,ip_addr,path,connect) values('$username','$ip_addr','$path',NOW())";
    $result3=$conn->query($sql3);    

    

     $finger = substr(str_shuffle(str_repeat("0123456789ABCDEF", 32)), 0, 32);
    
    $length = 30;
   $cookie_id= substr(str_shuffle
   ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+|-=[]{};./:?>< "),0, $length);
   
     $cookie_name="user_cloud";

     setcookie($name,$cookie_id,time() + (3600),"/",false,true);


     require ('browser_user.php');

     $sql4="insert into users_activities (username,ip_addr,browser,log_in_time,fingerprint,cookies)
            values('$username','$ip_addr','$yourbrowser',NOW(),'$finger','$cookie_id')";
     $result4=$conn->query($sql4);

   
     //all sessions
    $_SESSION['fingerprint']=$finger;

    $_SESSION['start'] = time();

    $_SESSION['expire'] = $_SESSION['start'] + (3600);


   $_SESSION['login']=$username;



while ($row=$result->fetch_assoc())
       {
   $_SESSION['mail']=$row['email'];
         }


      $rand = 64;
      $redirect= substr(str_shuffle
   ("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+|-=[]{};./:?>< "),0, $rand);   
 

  header("Location: login2.php?=$redirect"); 
    } // end id




   // log file for login error atempts
  else 
   { 

       require ('browser_user.php');
       $ip_addr2 = $_SERVER['REMOTE_ADDR'];


    $sql5="insert login_error_attempts (ip_addr,browser,username,password) 
           values('$ip_addr2','$yourbrowser','$username','$password')";
    $result5=$conn->query($sql5);   
  header('Location: index.php');
   } 



  }//kleisimo ths else gia ton elenxo

 }// kleisimo ths else gia ta dedomena

 $conn->close(); 

}// kleisimo ths megalhs if


?>
