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




if(isset($_POST["submit_contact"]))
{

session_start();


 require('class_cn.php');
 require_once('function.php');


 $obj = new in;
 
  $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

      $conn= new mysqli($host,$user,$pass,$db);

       if ($conn->connect_error)
         {
          die ("Connect error " .$conn->connect_error);
           }  
 $conn->set_charset("utf8");



       else 
         {
           
           //$email=input($_POST['email']);
           $message=input($_POST['message']);


     //$sql="select email from login where username='".$_SESSION['login']."'";
     //$result=$conn->query($sql);
     


    /*
     while ($row=$result->fetch_assoc())
             {

        if   ($row['email'] != $email)
        {
 echo '<script type="text/javascript">alert("Mistake is not your email");
         </script>';
     echo ("<script>location.href='list.php'</script>");
          }         
  */


    if(empty($message))
       {
      echo '<script type="text/javascript">alert("Message is required");
         </script>';
     echo ("<script>location.href='list.php'</script>");
        }


    else 
       {
  $sql2="insert into contact (name,email,message) values('{$_SESSION['login']}','{$_SESSION['mail']}','$message')";
  $result2=$conn->query($sql2);
     echo '<script type="text/javascript">alert("The message was sent successfully");
         </script>';
     echo ("<script>location.href='list.php'</script>");
       }

    //} // kleisimo ths while


     } //kleisimo ths else

$conn->close();

 }// kleisimo ths megalhs if

?>


