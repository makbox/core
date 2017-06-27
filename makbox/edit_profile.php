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

if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }

?>


<html>
<head>
 
<title> Makbox </title>
 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" /> 


 <link rel="stylesheet" type="text/css" href="/css/edit_profile.css">




<!--  gia thn forma -->
<script src="js/my_js.js"></script>
<link href="css/elements2.css" rel="stylesheet" type="text/css">




  
     <script>
   function div_show2() 
     {
        document.getElementById('abc2').style.display = "block";
       }
     function div_hide2()
      {
      document.getElementById('abc2').style.display = "none";
        }
     </script>





     <script>
   function div_show3() 
     {
        document.getElementById('abc3').style.display = "block";
       }
     function div_hide3()
      {
      document.getElementById('abc3').style.display = "none";
        }
     </script>




</head>


 <body id="body">




  <div class="verticalLine">
  
     </div>


  <div class="verticalLine2">
  
     </div>




  <div id="abc">

<!-- Popup Div Starts Here -->
<div id="popupContact">

<!-- Contact Us Form -->
<form action="edit_profile_settings.php" id="form_contact" method="post">
<img id="close" src="images/close2.png" height="32" width="32" onclick ="div_hide()">
<h2>Edit profile</h2>
<hr>
<input type="text" id="nick" name="nickname" placeholder="Nickname">
  <br>
<input type="text" id="descr" name="descr" placeholder="Description">
  <br>
<input type="text" id="inter" name="inter" placeholder="Interests">
  <br><br><br>
<input type="submit" name="update_profile" id="submit" value="Update profile">
</form>
<br><br>
</div>

<!-- Popup Div Ends Here -->
</div>






  <div id="div_background">
 <button onclick="div_show3()" class="css_btn_class"> <img src="/photos/background.png" height="120" width=180">
   </button> 
    </div>
  <div id=abc3>
   <div id=popup3>
   <form action="edit_background_profile.php" id="form_back" method="post" enctype="multipart/form-data">  
     <img  src="/photos/close.png" id="close3" height="50" width="70" onclick="div_hide3()">
     <input type="file" id="file_back" name="background" accept="image/*">
     <input type="submit" id="sub_back" name="submit_background" value="Set#photo#background"> 
     </form>
  </div>
   </div>







<?php
  

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


    $sql="select profile_id,username,nickname,photo_data,background_data,gender,date_of_birth,description,
          your_interests, is_inside from profile  where username='".$_SESSION['login']."'";
    $result=$conn->query($sql);


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  


     //echo '<font color="black" size="4"> <i> Cloud users </i> </font>';
    // echo '<hr>';


//bin2hex($str)

     while ($row=$result->fetch_assoc())
      {


  $username_uppercase=strtoupper($row['username']);

  $your_interests = wordwrap($row['your_interests'], 50,"<br>\n");

  $description = wordwrap($row['description'], 50,"<br>\n");



   echo "<div align=center>
         <table width=30%>

 <img id=foo src='data:image/jpeg;base64," .base64_encode($row['background_data'])  ."'/> 

         <tr>
  <td > <font size=4> $username_uppercase </font>  </td>
        </tr>

    
         <tr>
  <td > <font size=3> ({$row['nickname']}) </font>  </td>
        </tr>


     <tr> <td> </td> </tr>


      <tr> 
       <td>
   <img src='data:image/jpeg;base64," .base64_encode($row['photo_data'])  ."' .height=80  width=300/> 
      </td>

   <tr>

  <td> 
   <button  onclick=div_show2() class=css_btn_class> <img src=/photos/camera.png height=40 width=60> </button> 
  <div id=abc2>
   <div id=popup2>
     <form action=edit_image_profile.php id=form_image method=post enctype=multipart/form-data>  
     <img  src=/photos/close.png id=close2 height=50 width=70 onclick=div_hide2()>
     <input type=file id=file_photo name=photo accept=image/*>
     <input type=submit id=submit_photo name=submit_image value=Set#photo#profile> 
     </form>
      </div>
      </div>
        
        &nbsp; &nbsp; &nbsp;
 
       <button onclick=div_show() class=css_btn_class> 
      <img src=/photos/profiles/pencil.ico height=40 width=60>  
       </button>
           </td>

   </tr>
      </tr>
      
 
         <tr> <td> </td> </tr> 
         <tr> <td> </td> </tr> 


         <tr>
         <td> 
         <img src=/photos/profiles/gender.png height=40 width=60>
            &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
             <img src=/photos/profiles/birth.png height=40 width=60>
             <br>

          <font size=4> <i> <b> {$row['gender']} </b> </i> </font>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; 
       <font size=4> <i> <b> {$row['date_of_birth']} </b> </i> </font>
           </td>
          </tr>


   <tr> <td> </td> </tr>

     
            <tr>
             <td> 
            <img src=/photos/profiles/description.png height=60 width=80>
            $description 
            </td>
             </tr>

        
      <tr> <td> </td> </tr>
       <tr> <td> </td> </tr>


             <tr>  
              <td> 
             <img src=/photos/profiles/interests.png height=60 width=80>
 
              $your_interests
               </td>    
              </tr>  
 

          <tr>  
              <td align=center> 
           <a href=list.php id=back>  
               Back your profile 
             </a>
               </td>
                 
             <td> </td>

              </tr>  

     </table>
      </div>";



//echo  '<img src="data:image/jpeg;base64,' .base64_encode($row['background_data'])  .'" .height="80"  width="120"/>';


    } // end of while



   } // kleisimo ths else gia ta dedomena




    $conn->close();

 //}  // end of isset get


?>





</body>
</html>
