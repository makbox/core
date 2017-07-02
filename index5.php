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
 

 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

  <link rel="stylesheet" type="text/css" href="index.css">



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


<body id="body">


      
  <div align="center">
    <font color="#123863" size="6"> <b> Makbox </b> </font> 
     </div>




 <div id="header">

</div>

  <div align="center">
 <h3>  End of installation </h3> 
   <hr id="hr">
   </div>


 

    <div id="but">
    <div align="center">
      <br><br><br>
    <form action="" method="post">
 <input type="submit" name="submit_end" id="end" value="End" onmouseover="big(this)" onmouseout="normal(this)">   
     </form>
   </div>
   </div>
   



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


else if(!isset($_SESSION['step4']))
    {
     header('Location: index.php');
      }




else
{

 if (isset($_POST['submit_end']))
   {

header('Refresh: 2;URL=end.php'); 
echo '<div align=center> <font size=4> Please wait... </font> <br> <img src="wait.gif"> </div>';
    } // end of submit end


} // end of submit start


?>

