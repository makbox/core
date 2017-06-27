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
 



 <meta http-equiv="refresh" content="10">




<title> Makbox </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />

 <link rel="stylesheet" type="text/css" href="/css/messages.css">

   


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



 <body>

 </body>










</head>
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


   $sql1="select id,created,_from,_to,message,visit_path from messages 
          where _to='".$_SESSION['login']."' or _from='".$_SESSION['login']."'
          order by created desc";
   $result1=$conn->query($sql1);

  



 
     $to=$_SESSION['login'];

   
                  $path = $_SERVER['REQUEST_URI'];

                  $date_now = date("Y-m-d H:i:s"); 

                 $sql2="update messages set visit_path='yes'
                     where path='$path' and created<'$date_now' and  _to='".$_SESSION['login']."'";
                 $result2=$conn->query($sql2);




         echo  '<table id=table3>
           <form action="messages_delete.php" method="post" onSubmit="return delete_confirm();"/>

             

                <tr>

             <td align="left"> <font color="white"> <b> Instant </b> </font> </td>
            <td align="center"> <font color="white"> <b> From </b> </font> </td> 
           <td id="td" align="center"> <font color="white"> <b> Message </b> </font> </td>

             <td align="center">
   <button type="submit"  name="delete_submit" id="delete"/> <img src="/photos/menu/delete.png" height="25" width="45">
   </button> 
     <br>
   <input type="checkbox" id="all" onclick="toggle(this);"> <font color="white"> <b> All </b> </font>
  </td>

        </tr>


              <tr>
               <td>   </td>  <td>  </td> <td>  </td> 
              <td>  </td> 
              </tr>';


   

       while($row1=$result1->fetch_assoc())
           {

          $_from=$row1['_from'];
          
    $sql3="select photo_data from profile where username='$_from'";
    $result3=$conn->query($sql3);
    $row3=$result3->fetch_assoc();



            $date1=substr($row1['created'],-11,2);
            $date2=substr($row1['created'],-14,2);
            $paula="/";
            $date=$date1.$paula.$date2;
  
          $time = substr($row1['created'], -8, 5);

         $message = wordwrap($row1['message'], 40, "<br>", true);

        $pattern = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

        //example text 
       $text= $row1['message'];

     // convert URLs into Links
      $text= preg_replace($pattern, "<a href=\"\\0\" target=_blank rel=\"nofollow\">\\0</a>", $text);


             if($row1['visit_path']=='no' && $row1['_to']=$to)
                {

                $new_archive = "<font color='red'> new </font>";



           echo "<tr> 
                    <td id='td1' align='left'> <font color='white'> <b> $new_archive $date $time </b> </font> </td>
                     <td id='td2' align='center'>  
                       <font color='white'> <b> {$row1['_from']} </b> </font> <br>
       <img id='img_from' src='data:image/jpeg;base64," .base64_encode($row3['photo_data'])  ."' .height=80  width=80/>
                     </td>
                    <td id='td3' align='center'> <font color='white'> <b> $text </b> </font> </td>
                    <td id='td4' align='left'>  <input type='checkbox' name='checked_id[]' value='{$row1['id']}' </td>
                </tr>";

               }
       
     


           else
             {

 
           echo "<tr> 
                    <td id='td1' align='left'> <font color='white'> <b> $date $time </b> </font> </td>
                    <td id='td2' align='center'>
                   <font color='white'> <b> {$row1['_from']} </b> </font> <br>
     <img id='img_from' src='data:image/jpeg;base64," .base64_encode($row3['photo_data'])  ."' .height=80  width=80/> 
                  </td>
                    <td id='td3' align='center'> <font color='white'> <b> $text </b> </font> </td>
                    <td id='td4' align='left'> <input type='checkbox' name='checked_id[]' value='{$row1['id']}' </td>
                </tr>";
  

              }          
 
       
            } // end of while


      echo '</table>'; 


    
    } // end else data


   $conn->close();

   } // end else session


?>        
      

