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

?>

<html>
<head> 

<title> Makbox </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />


 <link rel="stylesheet" type="text/css" href="/css/forgot.css">


  <script>
  function myFunction()
   {
    document.getElementById('foo').setAttribute("class", "style1");
    }
   </script> 



</head>

<body id="body">



   <!--
 <div align="center"> <img src="/photos/footer/cloud_footer3.png" height="250" width="800" id="img-grey"> </div>
    --> 



 <div id="header" align="center">


  <h1 id="h">
  <font color=""> Mak </font> box
   </h1>

  <h1 id="hh">
  Forgot your password of Mak box
   </h1>


  </div>




  <br><br><br><br><br><br><br><br>

    <div align="center">
   <form action="forgot2.php" method="POST" id="form1"> 
       <br>
    <img src="/photos/menu/forgot_pass.png" height="300" width="310" id="img">
       <br>
   &nbsp;  &nbsp;   <input type="email" name="email" id="email" minlength="6" maxlength="50" placeholder="Email" required>
      <br> 
 &nbsp; &nbsp;  <input type="submit" name="submit" id="submit" value="Forgot password">
    <br> 
 &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;  
 <div align="center"> <a href="index.php" id="a"> <b>  Back to login </b> </a> </div>

   </form>
    </div>



   
 
 <div class="footer">

   </div>


 


</body>
</html>
