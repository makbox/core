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

 <link rel="stylesheet" type="text/css" href="/css/messages.css">



</head>



<body id="body">

 
                        
           <div align="center">
         <a href="list.php" id="back"> Back your profile </a> 
           </div>





       <div id="footer" align="center">
     <form action="" method="POST">
       <input type="text" id="chat_name" name="chat_name" maxlength="16" autofocus="autofocus" placeholder="To" required> 
          <br>
         <input type="text"  id="chat_text" name="chat_text" maxlength="255" placeholder="Message"required> 
           <br>
     <input type="submit" name="chat_submit" value="Send" id="button">
     </form>
    </div>


 

</body>
</html>


<?php


  if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }

 
else
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


  
      
  echo '<iframe  src="messages_show.php" width="100%" height="550" align="center" 
    style="background-color:transparent; box-shadow:none;" frameBorder="0">
  </iframe>';



       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql0="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result0=$conn->query($sql0);  




// send messages

  if(isset($_POST['chat_submit']))   
    {
  
   require 'function.php';

  $chat_name=$_POST['chat_name'];
  $chat_text=$_POST['chat_text'];


     $chat_name = input($chat_name);
     $chat_text = input($chat_text);
     $chat_name = $conn->real_escape_string($chat_name);
     $chat_text = $conn->real_escape_string($chat_text); 


    

   $sql3="select username from login";
   $result3=$conn->query($sql3);

   
 

                   while($row3=$result3->fetch_assoc())
                        {    
                if($chat_name==$row3['username'])
                    {  
               if($chat_name==$_SESSION['login']) 
                    { 
               echo '<script type="text/javascript">alert("You can not send message to yourself");
              </script>';
               ("<script>location.href='messages.php'</script>"); 
                          }  


                     else
                        {

                  $path ="/messages_show.php";

                 $sql2="INSERT INTO messages (_from,_to,message,path,visit_path) 
                       VALUES('{$_SESSION['login']}','$chat_name','$chat_text','$path','no')";

                 $result2=$conn->query($sql2);


                 $sql4="insert into backup_messages (created,_from,_to,message) 
                        select created,_from,_to,message from messages where created=NOW()";  
                 $result4=$conn->query($sql4);
     
                   

                 // echo '<script type="text/javascript">alert("Message sent");
                // </script>';
                          }

                         } // end of if username



                      /*
                   if($chat_name!=$row3['username'])
                    {  
               echo '<script type="text/javascript">alert("Error! Can not be sent message");
              </script>';
                 ("<script>location.href='messages.php'</script>");
                          }  
                          */
               

 
                        } // end of while usernames
                     

                       
              
                     
        } // end of submit message 






}// kleisimo ths else gia ta dedomena


    $conn->close();



 } // end of else session


?>


