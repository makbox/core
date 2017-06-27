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






<?php
  


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

  
    $sql_img="select photo_name, photo_type, photo_size, photo_data from profile 
              where username='".$_SESSION['login']."'";
  $result_img=$conn->query($sql_img);
  $row_img=$result_img->fetch_assoc();



    echo "<div align='center' id='header1'>";
    echo  '<img id="account_img" src="data:image/jpeg;base64,' .base64_encode($row_img['photo_data'])  
          .'" .height=""  width=""/>';
    echo  "</div>";



        if (isset($_POST['submit']))
         {
  

     $old_password=md5($_POST['old_password']);
     $new_password=$_POST['new_password'];
     $repeat_password=$_POST['repeat_password'];


   $old_password = htmlspecialchars($old_password);
   $old_password = trim($old_password);
   $old_password = stripslashes($old_password);
   $old_password = $conn->real_escape_string($old_password);

   $new_password = htmlspecialchars($new_password);
   $new_password = trim($new_password);
   $new_password = stripslashes($new_password);
   $new_password = $conn->real_escape_string($new_password);

   $repeat_password = htmlspecialchars($repeat_password);
   $repeat_password = trim($repeat_password);
   $repeat_password = stripslashes($repeat_password);
   $repeat_password = $conn->real_escape_string($repeat_password);

    if (empty($_POST['old_password'] || $_POST['new_password'] || $_POST['repeat_password']))
             {
          $message = "<div align='center'> <font color='red'> This fields are required <font> </div>";
             }
   
  else
   {


  $sql="SELECT password FROM login WHERE username='" .$_SESSION['login'] ."'";
  $result=$conn->query($sql); 
  $row=$result->fetch_assoc();
       

 $sql2="UPDATE login SET password='".md5($new_password)."' WHERE username='" .$_SESSION['login'] ."'";

 
      if ($old_password==$row['password'])
           {
         if  ($new_password==$repeat_password && $new_password!=$row['password'] && $repeat_password!=$row['password']) 
           {
           $result2=$conn->query($sql2);
          $message= "<div align='center'> 
        <img src='photos/account/message0.png' height='60' width='60'> <br><br>
          <font size='4'> <b> Your password updates sucesfuly </b> </font> <br><br>"
            ."<a href='list.php' id='mes1'> <b> I want to stay connected </b> </a> <br><br>"
             ."OR <br><br>" 
            ."<a href='logout.php' id='mes2'>  <b> I want to disconnect </b>  <a/> </div>";
             }
     if ($new_password==$repeat_password && $new_password==$row['password'] && $repeat_password==$row['password'])
          {
         $message ="<div align='center'> 
         <img src='photos/account/message0.png' height='60' width='60'> <br><br>
      <font color='red' size='4'> <b> The new password must differ from the previous </b> </font> 
        </div>";
          }
   


        
       else if ($new_password==$row['password'])
             {
          $message = "<div align='center'> 
        <img src='photos/account/message0.png' height='60' width='60'> <br><br>
     <font color='red' size='4'> The new password must differ from the previous <font>
         </div>";
             }

        else if ($repeat_password==$row['password'])
             {
          $message = "<div align='center'> 
          <img src='photos/account/message0.png' height='60' width='60'> <br><br>
        <font color='red' size='4'> <b> The new password must differ from the previous </b> </font> 
       </div>";
             }


          else if ($new_password!=$repeat_password)
           {
       $message = "<div align='center'>
       <img src='photos/account/message0.png' height='60' width='60'> <br><br>
    <font color='red' size='4'> <b> New password and repeat password dont match </b> <font> 
     </div>";
        }
    
       }
       


    else
    {
     $message = "<div align='center'>
        <img src='photos/account/message0.png' height='60' width='60'> <br><br>
      <font color='red' size='4'> <b> Old password do not match </b> <font> 
     </div>";
     }
 

     } // end of else for success passsword


   
    } // end of if isset



   }// end fo else for data
     

  $conn->close();
  

?>






<html>
<head>

<title> Mak cloud </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />


 <link rel="stylesheet" type="text/css" href="/css/account.css">
</head>

<body id="body">


<div align="center" id="">
   <table align="center" id="table">
<form action="" method="POST">


    <tr>
  <td id="td"> <input type="password" name="old_password" id="pass"  placeholder="Old password" required>  </td> 
    </tr>


   <tr><td></td></tr>  <tr><td></td></tr>  <tr><td></td></tr>


     <tr>
  <td id="td"> <input type="password" name="new_password" id="pass" placeholder="New password" minlength="6" maxlength="20"  required> </td>
    </tr>


   <tr><td></td></tr>  <tr><td></td></tr>  <tr><td></td></tr>

     <tr>
  <td id="td"> <input type="password" name="repeat_password" id="pass" placeholder="Repeat Password" minlength="6" maxlength="20" required> </td>
    </tr>

  <tr><td></td></tr>  <tr><td></td></tr>  <tr><td></td></tr>


    <tr>
  <td id="td"> <input type="submit" name="submit" id="submit" value="Choose password"></td>
    </tr>

   <tr><td></td></tr>  <tr><td></td></tr>  <tr><td></td></tr>

     <tr>
  <td id="td">  <a href='list.php' id="back"> Back to profile </a>  </td>
  </tr>
 
  
  <tr><td></td></tr>  <tr><td></td></tr>  <tr><td></td></tr>
  <tr><td></td></tr>  <tr><td></td></tr>  <tr><td></td></tr>

  
   <tr>
  <td id="td"> <?php if (isset($message)) {echo $message;} ?> </td>
   </tr>
  

  </form>
  </table>
</div>


   




<script language="javascript" type="text/javascript">
var day_of_week = new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

//  DECLARE AND INITIALIZE VARIABLES
var Calendar = new Date();

var year = Calendar.getFullYear();     // Returns year
var month = Calendar.getMonth();    // Returns month (0-11)
var today = Calendar.getDate();    // Returns day (1-31)
var weekday = Calendar.getDay();    // Returns day (1-31)

var DAYS_OF_WEEK = 7;    // "constant" for number of days in a week
var DAYS_OF_MONTH = 31;    // "constant" for number of days in a month
var cal;    // Used for printing

Calendar.setDate(1);    // Start the calendar day at '1'
Calendar.setMonth(month);    // Start the calendar month at now


/* VARIABLES FOR FORMATTING
NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
      tags to customize your caledanr's look. */

var TR_start = '<TR>';
var TR_end = '</TR>';
var highlight_start = '<TD WIDTH="30"><TABLE CELLSPACING=0 BORDER=0 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC><TR><TD WIDTH=20><B><CENTER>';
var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
var TD_start = '<TD WIDTH="30"><CENTER>';
var TD_end = '</CENTER></TD>';

/* BEGIN CODE FOR CALENDAR
NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
tags to customize your calendar's look.*/

cal =  '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0 BORDERCOLOR=BBBBBB><TR><TD>';
cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><CENTER><B>';
cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
cal += TR_start;

//   DO NOT EDIT BELOW THIS POINT  //

// LOOPS FOR EACH DAY OF WEEK
for(index=0; index < DAYS_OF_WEEK; index++)
{

// BOLD TODAY'S DAY OF WEEK
if(weekday == index)
cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;

// PRINTS DAY
else
cal += TD_start + day_of_week[index] + TD_end;
}

cal += TD_end + TR_end;
cal += TR_start;

// FILL IN BLANK GAPS UNTIL TODAY'S DAY
for(index=0; index < Calendar.getDay(); index++)
cal += TD_start + '  ' + TD_end;

// LOOPS FOR EACH DAY IN CALENDAR
for(index=0; index < DAYS_OF_MONTH; index++)
{
if( Calendar.getDate() > index )
{
  // RETURNS THE NEXT DAY TO PRINT
  week_day =Calendar.getDay();

  // START NEW ROW FOR FIRST DAY OF WEEK
  if(week_day == 0)
  cal += TR_start;

  if(week_day != DAYS_OF_WEEK)
  {

  // SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
  var day  = Calendar.getDate();

  // HIGHLIGHT TODAY'S DATE
  if( today==Calendar.getDate() )
  cal += highlight_start + day + highlight_end + TD_end;

  // PRINTS DAY
  else
  cal += TD_start + day + TD_end;
  }

  // END ROW FOR LAST DAY OF WEEK
  if(week_day == DAYS_OF_WEEK)
  cal += TR_end;
  }

  // INCREMENTS UNTIL END OF THE MONTH
  Calendar.setDate(Calendar.getDate()+1);

}// end for loop

cal += '</TD></TR></TABLE></TABLE>';

//  PRINT CALENDAR
document.write(cal);

//  End -->
</script>










 <div id="clock">
<canvas id="canvas" width="200" height="150"
style="background-color:white">
</canvas>

<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
</div>







   <div id="notice">

      <p>

<script>

function AddZero(num) 
{
    return (num >= 0 && num < 10) ? "0" + num : num + "";
}



window.onload = function() {
    var now = new Date();
    var strDateTime = [[AddZero(now.getDate()), 
        AddZero(now.getMonth() + 1), 
        now.getFullYear()].join("/"), 
        [AddZero(now.getHours()), 
        AddZero(now.getMinutes())].join(":"), 
        now.getHours() >= 12 ? "μ.μ" : "π.μ"].join(" ");
    document.getElementById("Console").innerHTML = "Mac cloud account services";
};
</script>



  <marquee behavior="scroll"> 
   <div class="blink" id="Console">

         </div>
         </marquee>
        
           </p>
        </div>





</body>
</html>



