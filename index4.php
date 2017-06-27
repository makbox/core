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

  include_once 'common.php';


?>



<html>
<head>

 <title> Makbox </title>
 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />

  <link rel="stylesheet" type="text/css" href="index.css">

 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">


<script type = 'text/javascript' >
function changeHashOnLoad() 
{
     window.location.href += '#';
     setTimeout('changeHashAgain()', '50'); 
}
 
function changeHashAgain()
 {
  window.location.href += '1';
}
 
var storedHash = window.location.hash;
window.setInterval(function () 
{
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);
window.onload=changeHashOnLoad;
</script> 



</head>


<body id="body" onload="doLogout(); return false;">


  <div align="center">
    <font color="#123863" size="6"> <b> Makbox </b> </font> 
     </div>


 <div id="header">

  </div>


 
   
  <div align="center">  
 <a href="index4.php?lang=en" id="flag_en"><img src="/makbox/photos/menu/english_flag.png" height="54" width="50"></a>
 <a href="index4.php?lang=gr" id="flag_gr"><img src="/makbox/photos/menu/greece_flag.png" height="50" width="63"></a>
  </div>

 



 <div align="center">
 <h3> <?php echo $lang['TITLE4']; ?> </h3> 
   <hr id="hr1">
   </div>


   

   <div align="center">
  <form action="" method="post">
     <h3 id="text">
      <?php echo $lang['MESSAGE4']; ?>
      </h3>
   &nbsp;  
  <?php echo $lang['SMTP_SERVER']; ?> 
   <input type="text" name="smtp_server" id="mail" placeholder="e.x smtp.gmail.com">  
       <br><br>
    <?php echo $lang['SMTP_USERNAME']; ?> 
   <input type="text" name="smtp_user" id="mail" placeholder="e.x mak@gmail.com"> 
       &nbsp; &nbsp; <?php echo $lang['NBSP4']; ?>
          <br><br>  
        &nbsp; &nbsp; &nbsp; &nbsp;
       <?php echo $lang['SMTP_PASSWORD']; ?> 
   <input type="password" name="smtp_pass" id="mail" placeholder="Your smtp password">  
            &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp;&nbsp; <?php echo $lang['NBSP4.1']; ?>
           <br><br>   
    
     &nbsp; &nbsp;  
        <?php echo $lang['SMTP_ENCRYPTION']; ?> 
       <select id="list" name="smtp_auth">
       <option value="auth">AUTH</option>
       <option value="ssl">SSL</option>
       <option value="tls">StartTLS</option>
      </select>
    
    <?php echo $lang['NBSP4.2']; ?>

       <br><br>   
     &nbsp; &nbsp; &nbsp; 
         <?php echo $lang['SMTP_TCP_PORT']; ?>  
     <select id="list" name="smtp_port">
       <option value="25">25</option>
       <option value="465">465</option>
       <option value="587">587</option>
      </select>

       <?php echo $lang['NBSP4.3']; ?>

       <br><br>

    <input type="reset" value="Clear" name="reset" id="reset">  
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="submit" value="Next" name="submit4" id="submit"> 
   </form>




  <div class="footer">

   </div>




</body>
</html>






<?php

 

 if(!isset($_SESSION['start']))
    {
     header('Location: index.php');
      }



else if(!isset($_SESSION['step2']))
    {
     header('Location: index.php');
      }



 else if(!isset($_SESSION['step3']))
    {
     header('Location: index.php');
      }




  else
    {

 echo '<meta http-equiv="cache-control" content="no-cache">';

   if(isset($_POST['submit4']))
     {

  $host=$_SESSION['host'];
  $user=$_SESSION['user'];
  $pass=$_SESSION['pass'];
  $db=$_SESSION['db'];


   $conn = new mysqli($host,$user,$pass,$db);


    if($conn->connect_error)
      {
      die ("Error " .$conn->connect_error);
        }



   else
     {
     require_once('function.php'); 

      $smtp_server=input($_POST['smtp_server']);
      $smtp_user=input($_POST['smtp_user']);
      $smtp_pass=input($_POST['smtp_pass']);
      $smtp_auth=input($_POST['smtp_auth']);
      $smtp_port=input($_POST['smtp_port']);

     // $smtp_server=$conn->real_escape_string($smtp_server);
     // $smtp_user=$conn->real_escape_string($smpt_user);
     // $smtp_pass=$conn->real_escape_string($smpt_pass);
     // $smtp_auth=$conn->real_escape_string($smtp_auth);
     // $smtp_port=$conn->real_escape_string($smpt_port);


           
       if(empty($smtp_server || $smtp_user || $smtp_pass || $smtp_auth || $smtp_port))
            {
        echo '<script type="text/javascript">alert("This filed are required");
         </script>';
         echo ("<script>location.href='index4.php'</script>");
             }
           

         else
           {

     //$enc = $smtp_pass;
      $enc=base64_encode($smtp_pass);

            $sql="insert into mail (smtp_server,smtp_user,smtp_pass,smtp_auth,smtp_port)
                   values('$smtp_server','$smtp_user','$enc','$smtp_auth','$smtp_port')";
            $result=$conn->query($sql);
             
           if($result)
              {
     $_SESSION['step4']=true;
      header('Refresh: 2;URL=index5.php'); 
    echo '<div align=center> <img src="wait.gif"> </div>';
              }
            
           else 
              {
               echo $conn->error;
               }
 

          } //end of else for data

 


       } //end of else for connect

        $conn->close();

      }//  end of isset submit4
   

     } //end big else 



?>

