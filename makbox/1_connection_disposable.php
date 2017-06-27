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

   if (isset($_POST['connection']))
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
      require_once('function.php');
     $one_connection=input($_POST['one_connection']);
     $one_connection = $conn->real_escape_string($one_connection);

    if (empty($_POST['one_connection']))
             {
          $message = "<div align='center'> <font color='red'> This field is required <font> </div>";
             }
   

  else
   {

  $sql="SELECT one_connection FROM login WHERE binary one_connection='$one_connection'";
  $result=$conn->query($sql); 
  $rows=$result->fetch_assoc();

       
 
 
      if ($rows['one_connection']==$one_connection)
           {
            $sql2="select username from login where one_connection='$one_connection'";
            $result2=$conn->query($sql2);
            $rows2=$result2->fetch_assoc();
            $username=$rows2['username']; 
       $_SESSION['login']=$username;
       header("Location: list.php"); 
   $sql3="update login set one_connection=' ' where email='".$_SESSION['email_connection']."'";
    $result3=$conn->query($sql3); 
             }


       


       else if ($row['one_connection']!=$one_connection)
       {
 echo '<script type="text/javascript">alert("The key word do not match");
         </script>';
     echo ("<script>location.href='1_connection_disposable.php'</script>");
       }
      
 



   }//klesimo ths else gia ton elenxo ths lekksh kleidi

   }// kleisimo ths else gia ta dedomena
     
  $conn->close();
  
  }// kleisimo ths megalhs if


?>















<?php

 if (!isset($_SESSION['expires2']))
    {
      header("Location: index.php");
      }
   
    else
      {
$nows=time();


   if ($nows >= $_SESSION['expires2'])
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
    die("Connect error " .$conn->connect_error);
     } 

     else
       {
    $sql4="update login set one_connection=' ' where email='".$_SESSION['email_connection']."'";
    $result4=$conn->query($sql4); 
session_destroy();
 echo '<script type="text/javascript">alert("Your attempt ended please try again");
         </script>';
     echo ("<script>location.href='index.php'</script>");
        } // kleisimo ths else gia thn digrafh tou kleidiou

      } // kleisimo ths if gia ton lenxo tou xronou

    } //  kleisimo ths else gia ton elenxo ths swsths sundeshs
?>











<html>
<head>

 <title> Mak cloud </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />


 <link rel="stylesheet" type="text/css" href="/css/forgot_link.css">


</head>

<body id="body">



<div align="center">
 <p id="menu">
   <table align="center" id="table">
<form action="" method="POST" id="form1">

   <img src="/photos/menu/one_connection.png" height="400" width="500">
 
    <br><br>

     <tr>
 <th> <font size="4" color=""> Key word for connection disposable: </font> </th>
  </tr>



   <tr>
  <td id="td"> <input type="text" name="one_connection" id="key_word2"  placeholder="Enter the key word" required> </td> 
   </tr>


     <tr><td></td></tr> <tr><td></td></tr> 


   <tr>
  <td id="td">
    <input type="submit" name="connection" id="submit2" value="Connection now">
     </td>
   </tr> 

    <tr><td></td></tr> <tr><td></td></tr> 

       <tr>
<td id="td">  <a href='logout_forgot.php' id='back2'> Cancel one connection </a>  </td>
  </tr>

  </form>
  </table>
</p>
</div>






</body>
</html>
