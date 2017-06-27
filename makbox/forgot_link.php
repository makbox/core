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

   if (isset($_POST['submit']))
     {
   

  require('class_cn.php');

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

    
  else
    {

     $forgot_text=$_POST['forgot_text'];
     $new_password=md5($_POST['new_password']);
     $repeat_password=md5($_POST['repeat_password']);


   $forgot_text = htmlspecialchars($forgot_text);
   $forgot_text = trim($forgot_text);
   $forgot_text = stripslashes($forgot_text);
   $forgot_text = $conn->real_escape_string($forgot_text);

   $new_password = htmlspecialchars($new_password);
   $new_password = trim($new_password);
   $new_password = stripslashes($new_password);
   $new_password = $conn->real_escape_string($new_password);

   $repeat_password = htmlspecialchars($repeat_password);
   $repeat_password = trim($repeat_password);
   $repeat_password = stripslashes($repeat_password);
   $repeat_password = $conn->real_escape_string($repeat_password);

    if (empty($_POST['forgot_text'] || $_POST['new_password'] || $_POST['repeat_password']))
             {
          $message = "<div align='center'> <font color='red'> This fields are required <font> </div>";
             }
   
  else
   {

  $sql="SELECT password,forgot_text FROM login WHERE binary forgot_text='$forgot_text'";
  $result=$conn->query($sql); 
  $row=$result->fetch_assoc();

       
 
 

      if ($row['forgot_text']==$forgot_text)
           {
         if  ($new_password==$repeat_password) 
           {
            // edw epanaferw ton kwdiko
           $sql2="UPDATE login SET password='$new_password' WHERE forgot_text='$forgot_text' and email='".$_SESSION['email']."'";
           $result2=$conn->query($sql2);

         // edw diagrafw thn leskh kleidi
      $sql3="update login set forgot_text=' '";
           $result3=$conn->query($sql3);

          echo '<script type="text/javascript">alert("Your password forgot seccessfully");
         </script>';
     echo ("<script>location.href='logout.php'</script>");

             }


          else if ($new_password!=$repeat_password)
           {
echo '<script type="text/javascript">alert("New password and repeat password dont match");
         </script>';
     echo ("<script>location.href='forgot_link.php'</script>");
        }  

       }
       


       else if ($row['forgot_text']!=$forgot_text)
       {
 echo '<script type="text/javascript">alert("The key word do not match");
         </script>';
     echo ("<script>location.href='forgot_link.php'</script>");
       }
      
 



   }//klesimo ths else gia ton lenxo tou kwdikou

   }// kleisimo ths else gia ta dedomena
     
  $conn->close();
  
  }// kleisimo ths megalhs if



?>





<?php

 if (!isset($_SESSION['expires']))
    {
      header("Location: index.php");
      }
   
    else
      {
$nows=time();

   if ($nows >= $_SESSION['expires'])
      {  

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
    $sql4="update login set forgot_text=' ' where email='".$_SESSION['email']."'";
    $result4=$conn->query($sql4); 
 
session_destroy();
 echo '<script type="text/javascript">alert("Your attempt ended please try again");
         </script>';
     echo ("<script>location.href='index.php'</script>");
        } // kleisimo ths else gia thn digrafh tou kleidiou

      } // kleisimo ths if gia ton elenxo tou xronou

    } //  kleisimo ths else gia ton elenxo ths swsths sundeshs
?>












<html>
<head>

<title> Makbox </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />

 <link rel="stylesheet" type="text/css" href="/css/forgot_link.css">


</head>

<body id="body">

 

 





<div class="center">
 <p id="menu">
   <table align="center">
<form action="" method="POST">

 
   <img src="/photos/menu/forgot_pass.png" height="300" width="300">
 
    <br><br>

   <tr>
  <td id="td"> 
  <input type="text" name="forgot_text" id="key"  placeholder="Enter the key word" minlength="16" maxlength="16" required> </td> 
    </tr>

  <tr><td></td></tr> <tr><td></td></tr>

      <tr>
  <td id="td"> 
   <input type="password" name="new_password" id="pass" placeholder="Enter new password" minlength="6" maxlength="20"  required> 
  </td>
   </tr>

  <tr><td></td></tr> <tr><td></td></tr>

    <tr> 
 <td id="td"> 
 <input type="password" name="repeat_password" id="pass" placeholder="Enter retype password" minlength="6" maxlength="20" required> </td>
   </tr>
 
  
     <tr><td></td></tr> <tr><td></td></tr>

    <tr>
 <td id="td"> <input type="submit" name="submit" id="submit" value="Choose password"></td>
    </tr>
  
   <tr><td></td></tr> <tr><td></td></tr>


   <tr>
<td id="td">  <a href='logout_forgot.php' id='back'> Cancel reset </a>  </td>
  </tr>

  </form>
  </table>
</p>
</div>






</body>
</html>



