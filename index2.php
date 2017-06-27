<?php

 session_start();
 
 include_once 'common.php';

?>


<html>
<head>

 <title> Makbox </title>
 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />
 

 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

  <link rel="stylesheet" type="text/css" href="index.css">


 
<script type = 'text/javascript'>
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


<body id="body">


  
  <div align="center">
    <font color="#123863" size="6"> <b> Makbox </b> </font> 
     </div>



 <div id="header">

</div>



  <div align="center">  
 <a href="index2.php?lang=en" id="flag_en"><img src="/makbox/photos/menu/english_flag.png" height="54" width="50"></a>
 <a href="index2.php?lang=gr" id="flag_gr"><img src="/makbox/photos/menu/greece_flag.png" height="50" width="63"></a>
  </div>



  <div align="center">
 <h3> <?php echo $lang['TITLE']; ?> </h3> 
   <hr id="hr2">
   </div>


  <div align="center">
  <form action="" method="post">
     <h3 id="text">
        <?php echo $lang['MESSAGE']; ?>
      </h3>
   &nbsp;  
  <?php echo $lang['DATABASE_HOST']; ?>
  <input type="text" name="database_host" id="host" placeholder="(e.x localhost)"    minlength="1" maxlength="24" required>  
       <br><br>
      <?php echo $lang['DATABASE_NAME']; ?>
 <input type="text" name="database_name" id="database" placeholder="(e.x test_db)" minlength="1" maxlength="24"  required> 
       <br><br>
    <?php echo $lang['DATABASE_USER']; ?>
     <input type="text" name="username" id="user" placeholder=" (e.x test_user)" minlength="1" maxlength="24"  required>   
        <br><br> 
     <?php echo $lang['DATABASE_PASS']; ?>
    <input type="password" name="password" id="pass" placeholder="(e.x test_pass)" minlength="1" maxlength="32"  required>  
          <br><br>     
    <input type="reset" value="<?php echo $lang['RES']; ?>" name="reset" id="reset">  
      &nbsp; &nbsp; &nbsp; &nbsp; 
    <input type="submit" value="<?php echo $lang['SUB']; ?>" name="submit2" id="submit"> 
   </form>
   </div>


  <div class="footer">
   </div>



</body>

</html>












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





  if(!isset($_SESSION['start']))
    {
     header('Location: index.php');
      }


else
{

 if(isset($_POST['submit2']))
  {
   require_once('function.php'); 

  $database_host=input($_POST['database_host']);
  $database_name=input($_POST['database_name']);
  $username=input($_POST['username']);
  $password=input($_POST['password']);



  $host=$database_host;
  $user=$username;
  $pass=$password;
  $db=$database_name;

   $conn = new mysqli($host,$user,$pass,$db);
      
     if($conn->connect_error)
       {
        die ("Connect error " .$conn->connect_error);
         }

  
    else
     {

     require('tables.php');

   
    $result1=$conn->query($sql1);
    $result2=$conn->query($sql2);
    $result3=$conn->query($sql3);
    $result4=$conn->query($sql4);
    $result5=$conn->query($sql5);
    $result6=$conn->query($sql6);
    $result7=$conn->query($sql7);
    $result8=$conn->query($sql8);
    $result9=$conn->query($sql9);  
    $result10=$conn->query($sql10);
    $result11=$conn->query($sql11);
    $result12=$conn->query($sql12);
    $result13=$conn->query($sql13);
    $result14=$conn->query($sql14);
    $result15=$conn->query($sql15);
    $result16=$conn->query($sql16);
    $result17=$conn->query($sql17);
    $result18=$conn->query($sql18);
    $result19=$conn->query($sql19);
    $result20=$conn->query($sql20);
    $result21=$conn->query($sql21);
    $result22=$conn->query($sql22);
    $result23=$conn->query($sql23);
    $result14=$conn->query($sql24);




     if($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7 && $result8
        && $result9 && $result10 && $result11 && $result12 && $result13 && $result14 && $result15)
       {

         
         // get current folder name      

          $folder=getcwd();

          $current_folder=substr("$folder",9);
 
    
        chmod("/var/www/$current_folder/core/class_cn.php", 0777);


       $class_core = fopen("/var/www/$current_folder/core/class_cn.php", "w") or die("Unable to open file!");
       $class_core_lines = '<?php' .PHP_EOL
                  .'class in' .PHP_EOL
                  .'{' .PHP_EOL
                  .'public $connect = array();' .PHP_EOL
                  .'public function __construct()' .PHP_EOL
                  .'{' .PHP_EOL
                  .'$this->connect[0]'  .'='  .'"'  .$host  .'"'  .';'  .PHP_EOL
                  .'$this->connect[1]'  .'='  .'"'  .$user  .'"'  .';'  .PHP_EOL
                  .'$this->connect[2]'  .'='  .'"'  .$pass  .'"'  .';'  .PHP_EOL
                  .'$this->connect[3]'  .'='  .'"'  .$db    .'"'  .';'  .PHP_EOL
                  .'}' .PHP_EOL
                  .'}' .PHP_EOL
                  .'?>';
       fwrite($class_core, $class_core_lines);
       fclose($class_core);




         $_SESSION['host']=$host;
         $_SESSION['user']=$user;
         $_SESSION['pass']=$pass;
         $_SESSION['db']=$db;


   

        $_SESSION['step2']=true;
        header('Refresh: 2;URL=db1.php'); 
      echo '<div align=center>  <img src="wait.gif"> </div>';
         }

      else
       {
       echo '<script type="text/javascript">alert("Fail install makbox. Please try again");
         </script>';
         echo ("<script>location.href='index2.php'</script>");
         }



   } // close else for connection to database


  $conn->close();

  } // close if isset




 } // klose else for iseet start 




?>











