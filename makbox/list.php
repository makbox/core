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


 <link rel="stylesheet" type="text/css" href="/css/list.css">


  <!--
 <meta http-equiv="refresh" content="600">
   -->


<script type = "text/javascript">

function hideMessage() {
document.getElementById("message").style.display="none"; 
}

function startTimer() {
var tim = window.setTimeout("hideMessage()", 10000);  // 10000 milliseconds = 10 seconds
}

</script>




<script type="text/javascript">

function delete_confirm()
    {
	var result = confirm("Are you sure to delete?");
	if(result){
		return true;
	}else{
		return false;
	}
    }

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});
</script>



<script type="text/javascript">

function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

</script>





 <!-- autocomplete search user -->
 <!-- 
   <script>
         function showResult(str) {
			
            if (str.length == 0) {
               document.getElementById("livesearch").innerHTML = "";
               document.getElementById("livesearch").style.border = "0px";
               return;
            }
            
            if (window.XMLHttpRequest) {
               xmlhttp = new XMLHttpRequest();
            }else {
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            
            xmlhttp.onreadystatechange = function() {
				
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
                  document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
               }
            }
            
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
         }
      </script>
   -->











<!--  gia thn forma -->
<script src="js/my_js.js"></script>
<link href="css/elements.css" rel="stylesheet" type="text/css">




</head>




<body id="body" onload="startTimer()"  style="overflow:hidden;">
 

<div id="abc">

<!-- Popup Div Starts Here -->
<div id="popupContact">

<!-- Contact Us Form -->
<form action="contact.php" id="form_contact" method="post">
<img id="close" src="images/close2.png" height="30" width="30" onclick ="div_hide()">
<h2>Contact Us</h2>
<hr>
<input id="name" name="name" placeholder="Name" type="text" value="<?php echo $_SESSION['login']?>" disabled>
<input id="email" name="email" placeholder="Email" type="text" value="<?php echo $_SESSION['mail']?>" disabled>
<textarea id="msg" name="message" placeholder="Message" required>
</textarea>
<input type="submit" name="submit_contact" id="submit" value="Send">
 <br><br>
</form>
</div>

<!-- Popup Div Ends Here -->
</div>







 <div align="center">
 <p id="menu">
   <table align="center" id="table">
     <tr>
 <th> Transfer </th> 
 <th> Your cloud </th>
 <th> Edit profile  </th> 
 <th> Messages </th> 
 <th> Contact </th>
 <th> Acount  </th>
 <th> Recycle bin </th>
 <th> History </th>
 <th> Sign out </th>
  </tr>

   <tr>

<td id="td"> <a href="box.php" class="css_btn_class"> <img src="/photos/menu/upload.png" height="40" width="60"> <a/> </td> 
  <td id="td">  <a href="list_folder.php" class="css_btn_class"> <img src="/photos/menu/your_folder.png" height="40" width="60"><a/></td>


 <td id="td">  <a href="edit_profile.php" class="css_btn_class"> <img src="/photos/menu/profile.png" height="40" width="60"> <a/> </td>


  <td id="td">  <a href="messages.php" class="css_btn_class"> <img src="/photos/menu/mes.png" height="40" width="60"> <a/> </td>
  <td id="td"> <button  onclick="div_show()" class="css_btn_class"> <img src="/photos/menu/contact.png" height="40" width="60"> </button> </td>
  <td id="td">  <a href="account.php" class="css_btn_class"> <img src="/photos/menu/user.png" height="40" width="60"> </a>  </td>
  <td id="td">  <a href="recycle_bin.php" class="css_btn_class"> <img src="/photos/menu/recycle.png" height="40" width="60"> </a>  </td>
 <td id="td">  <a href="history.php" class="css_btn_class"> <img src="/photos/menu/history.png" height="40" width="60"> </a>       </td>
  <td id="td">  <a href="logout.php" class="css_btn_class"> <img src="/photos/menu/logout.png" height="40" width="60"> </a>  </td>
  </tr>
<script>
     window.setInterval("reloadIFrame();", 3000);

     function reloadIFrame()
     {
          document.frames["frameNameHere"].location.reload();
     }
</script>
  </table>

    <br>




    <iframe  src="users_online.php" width="180" height="500" align="right" 
    style="background-color:white; opacity:1; box-shadow:none;" frameBorder="0" scolling="yes">
 </iframe>




   <iframe  src="user_notice.php" width="300" height="500" align="left" 
    style="background-color:white; opacity:1; box-shadow:none;" frameBorder="0" scolling="yes">
  </iframe>
 


  
   <!--
   <div id="search_user">
   <form>
         <input type = "text" id="search_text" onkeyup = "showResult(this.value)">
         <div id = "livesearch"></div>
      </form>
   </div>
   -->
  




</p>
</div>


 <div align="center" id="bottom">
     <table id="table_bott" align="center">
      <tr id="tr_bott">


      
       <td id="td_bott">
      <a href="delete_account.php" id="delete_account"> &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; Delete account </a> 
       </td>

  
       <td id="td_bott">
      <a href="user_backup.php" id="backup"> Back up &nbsp; </a> 
       </td>


  
       <td id="td_bott">
      <a href="user_modules.php" id="modules">  Modules </a> 
      </td>



       <td id="td_bott">
      <a href="user_storage.php" id="storage"> Storage </a> 
      </td>


       <td id="td_bott">
      <a href="/android/makbox.apk" id="android"> &nbsp; &nbsp; Android app </a> 
      </td>


   </tr>
    </table>   

</div>


     <br><br><br><br><br><br>
  

<body id=body>
</html>




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

 $sql_img="select photo_name, photo_type, photo_size, photo_data from profile where username='".$_SESSION['login']."'";
 $result_img=$conn->query($sql_img);
  $row_img=$result_img->fetch_assoc();

 

  echo "<div align='center'>
        <font color=''> Welcome your profile <a href='edit_profile.php' id='a'> <b> <i> $_SESSION[login] </i> </b> </a> 
        </font>
         </div>
            <br>";


  echo "<div align='center'>";
  echo  '<img id="list_img" src="data:image/jpeg;base64,' .base64_encode($row_img['photo_data'])  .'" .height=""  width=""/>';
  echo  "</div>";
  echo  "<br>"."<br>" ."<br>" ."<br>";


     // for graph storage data (usage and free space) 

     $sql2="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' ";
     $result2 = $conn->query($sql2);
     $row2 = $result2->fetch_assoc();
 
     $kilobytes = $row2['sum(size)']/1024; //convert to kilibytes
     $megabytes = $kilobytes/1024; // convert to megabytes  
     $megabytes = substr($megabytes, 0, -11);
     $storage   = $megabytes;    



  echo "<div align='center'>
         <table id='table_storage'>
 
          <tr>
           <td colspan='3'>   
           Using space: ($storage% of 100%)
          </td>
        </tr>
 

         <tr>
          <td colspan='3'>
 <svg height='30' width='400'>
  <defs>
    <linearGradient id='solids' x1='0%' y1='0%' x2='100%' y2='0%'>
      <stop offset='0%' style='stop-color:rgb(0,255,0);stop-opacity:1' />
      <stop offset='$storage%' style='stop-color:rgb(0,255,0);stop-opacity:1' />
      <stop offset='99.5%' style='stop-color:rgb(52,52,203);stop-opacity:1' />
      <stop offset='99.5%' style='stop-color:rgb(52,52,203);stop-opacity:1' />  
      <stop offset='100%' style='stop-color:rgb(255,0,0);stop-opacity:1'/>
    </linearGradient>
  </defs>
  <rect width='400' height='30' fill='url(#solids)' />
</svg>
    </td>
      </tr>


          <tr>
           <td> Usage space data: </td> 
           <td> Free space data: </td>
           <td> End space: </td>
          </tr>

    
    <tr>
     <td>
 <svg height='30' width='130'>
  <defs>
    <linearGradient id='solids' x1='0%' y1='0%' x2='100%' y2='0%'>
      <stop offset='0%' style='stop-color:rgb(0,255,0);stop-opacity:1' />
    </linearGradient>
  </defs>
  <rect width='130' height='30' fill='url(#solids)' />
</svg>
 </td>


       <td>
 <svg height='30' width='120'>
  <defs>
    <linearGradient id='solids' x1='0%' y1='0%' x2='100%' y2='0%'>
      <stop offset='0%' style='stop-color:rgb(52,52,203);stop-opacity:1' />
    </linearGradient>
  </defs>
  <rect width='120' height='30' fill='url(#solids)' />
</svg>
  </td>
      

       <td>
  <svg height='30' width='80'>
  <defs>
    <linearGradient id='solids' x1='0%' y1='0%' x2='100%' y2='0%'>
      <stop offset='0%' style='stop-color:rgb(255,0,0);stop-opacity:1' />
    </linearGradient>
  </defs>
  <rect width='80' height='30' fill='url(#solids)' />
</svg>
  </td>
      


   </tr>

   </table>
   </div>";





  $name_location=$_SESSION['login'];
  $ip=$_SERVER['REMOTE_ADDR'];

   $sql3="update everything_for_users.details set name='$name_location',visit_profile='yes' 
          where ip_address='$ip' and cookies='".$_SESSION['cookies']."'";
   $result3=$conn->query($sql3);



   $username_image=$_SESSION['login'];
 
   $sql4="insert into profile_image (username) values('$username_image')";
   $result4=$conn->query($sql4);




       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql5="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result5=$conn->query($sql5);  



    $conn->close();


  require ('auto_logout.php');


}// kleisimo ths else gia ta dedomena

echo "<br>" ."<br>";

?>



