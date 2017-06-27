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


  <div align="center" bgcolor="#123863">
    <font color="#123863" size="6"> <b> Makbox </b> </font> 
     <hr id="hr1">
     </div>

  <div id="header">

  </div>
   

  <div align="center">
  <h3> <font color="black" size="5"> <b> Installation step by step </b> </font> </h3> 
   </div>

    <br>



    <div id="but">
    <div align="center">
      <br><br><br>
    <form action="" method="post">
 <input type="submit" name="submit_start" id="start" value="Next">   
     </form>
   </div>
   </div>
   



  <div class="footer">
   </div>






<br><br>

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



session_start();


if(isset($_POST['submit_start']))
  {
 $_SESSION['start']=true;  
header('Refresh: 2;URL=index2.php'); 
echo '<div align=center> <font size=4> Please wait... </font> <br> <img src="wait.gif"> </div>';
//@ob_flush(); //flush the output buffer
//flush(); //flush anything else
//sleep(6); //wait
  // header('Location: index2.php');
   }




?>




