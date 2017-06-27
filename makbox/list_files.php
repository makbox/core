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



 <link rel="stylesheet" type="text/css" href="/css/list_folder.css">



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






<style>
#popup-form 
{
display: none;
position: absolute;

background-color:#ff4d4d;
color:#fff;
top:50%;
left:50%;
padding:15px;
-ms-transform: translateX(-50%) translateY(-50%);
-webkit-transform: translate(-50%,-50%);
transform: translate(-50%,-50%);
}   

  }
</style>




</head>




<body id="body" bgcolor="">
 


 <div align="center">
 <p id="menu">
   <table align="center" id="table">
   <form action="upload_file.php" method="POST" enctype="multipart/form-data">

     <tr>
  <th id="th"> Back to folder </th>
  <th id="th"> Select file </th>
  <th id="th"> Upload file </th>
  </tr>

 <tr>
  <td id="td"> <a href="list_folder.php" class="css_btn_class"><img src="/photos/menu/back.png" height="46" width="100"> </a> </td>
  <td id="td"> <input type="file" name="uploaded_my_file" id="file2"> </td>
  <td id="td"> <button type="submit" name="submit_file" id="upload" ><img src="/photos/menu/cloud-upload.png" height="100%" width="100%"> </button> </td>
  </tr>

  </form>
  </table>
</p>
</div>





     <br><br><br><br><br><br><br>
  





<?php

 session_start();

if(isset($_GET['folder_name']))
   {

    $folder_name =$_GET['folder_name'];
   
    if(!$folder_name) 
    {
        die('The files not exists');
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

$sql= "select id,folder_name,created,name,type,size,data,_from,visit_path from folder_uploads 
       where _to='".$_SESSION['login']."' and folder_name ='$folder_name'";
$result=$conn->query($sql);


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

       $date_now = date("Y-m-d H:i:s"); 

    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $resul2t=$conn->query($sql2);  




    if(!$result)
       {
        echo '<p> </p>';
          }


    else 
     {
         

     $sql4="update folder_uploads set visit_path='yes'
            where path='$path' and created<'$date_now' and _to='".$_SESSION['login']."'";
     $result4=$conn->query($sql4);


       echo "<br>";
     
        echo '<table width=100% id=table1>
           
                <tr>
                    <td> <font color="black"> <b> Created </b> </font> </td>
                     <td> <font color="black"> <b> From </b> </font> </td>
                    <td> <font color="black"> <b> Name </b> </font> </td> 
                    <td> <font color="black"> <b> Size (bytes) </b> </font> </td>
                    <td> <font color="black"> <b> Type </b> </font> </td>
                    <td> <font color="black"> <b> View &nbsp; </b> </font> </td>
                    <td align="center"> <font color="black"> <b> Share </b> </font> </td>
                    <td align="center"> <font color="black"> <b> Download </b> </font> </td>

   <td>
 <div class="checkbox">
     <input type="checkbox" id="checkbox" onclick="toggle(this);">
     <label for="checkbox"></label>
       </div>
    </td>


<td>
  <form action="move_recycle_bin.php" method="post" onSubmit="return delete_confirm();"/>
 <button type="submit"  name="delete_files" id="delete"/> <img src="/photos/menu/delete.png" height="25" width="45"> </button> <br>
</td>

                </tr>';
 
 //<td> <font color="black"> <b> type </b> </font> </td>

//<td> <font color='black'> <b> {$row['type']} </b> </font> </td>
       


        while($row = $result->fetch_assoc())
          {
           $_SESSION['folder']=$row['folder_name'];
           //$original_name=substr($row['name'],1);

            $date1=substr($row['created'],-11,2);
            $date2=substr($row['created'],-14,2);
            $paula="/";
            $date=$date1.$paula.$date2;
  
          $time = substr($row['created'], -8, 5);


             if($row['visit_path']=='no')
                {

                $new_archive = "<font color='red'> new </font>";


               echo "
                <tr id='tr_list_new'>
                    <td id='td_list_new'> <font color='black'> <b> $new_archive $date $time </b> </font> </td>
                    <td id='td_list_new'> <font color='black'> <b> {$row['_from']} </b> <font> </td>
                    <td id='td_list_new'> <font color='black'> <b> {$row['name']}  </b> <font> </td>
                    <td id='td_list_new'> <font color='black'> <b> {$row['size']} </b> </font> </td>
                    <td id='td_list_new'> <font color='black'> <b> {$row['type']} </b> </font> </td>

                    <td id='td_list_new'>
          <a href='view_files.php?id={$row['id']}' target='_blank'> <img src='/photos/view/view.png' id='img_size'> </a>
              </a>  
              </td> 

                  <td align='center' id='td_list_new'> 
                    <a href='list_files_share.php?id={$row['id']}'>
                     <img src='/photos/menu/share.png' id='img_size'>
                   </a>
                 </td> 

                  <td align='center' id='td_list_new'>
       <a href='download_from_folder.php?id={$row['id']}'> <img src='/photos/menu/download.png' id='img_size'> </a>  
                 </td> 

                   <td align='center' id='td_list_new'><input type='checkbox' name='checked_id[]' value='{$row['id']}' </td>
                </tr>";


                 }



              else
               {
            echo "
                <tr id='tr_list'>
                    <td> <font color='black'> <b> $date $time </b> </font> </td>
                    <td> <font color='black'> <b> {$row['_from']} </b> <font> </td>
                    <td> <font color='black'> <b> {$row['name']}  </b> <font> </td>
                   <td> <font color='black'> <b> {$row['size']} </b> </font> </td>
                   <td> <font color='black'> <b> {$row['type']} </b> </font> </td>
                    <td>
          <a href='view_files.php?id={$row['id']}' target='_blank'> <img src='/photos/view/view.png' id='img_size'> </a>
              </a>  
              </td> 
                  <td align='center'> 
                    <a href='list_files_share.php?id={$row['id']}'>
                     <img src='/photos/menu/share.png' id='img_size'>
                   </a>
                 </td> 
                  <td align='center'>
       <a href='download_from_folder.php?id={$row['id']}'> <img src='/photos/menu/download.png' id='img_size'> </a>  
                 </td> 
                   <td align='center'><input type='checkbox' name='checked_id[]' value='{$row['id']}' </td>
                </tr>";
                  }

                }
        echo '</table>';


        }

    } //  kleisimo ths else gia thn emfanish twn dedomenwn

   } // kleisimo ths megalhs else gia ton elenxo ths sundeshs

 
  $conn->close(); 



 } // kleisimo ths if isset  

?>




</body>
</html>
