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




</head>




<body id="body" bgcolor="">
 


 <div align="center">
 <p id="menu">
   <table align="center" id="table">
   <form action="upload_folder.php" method="POST" enctype="multipart/form-data">

     <tr>
  <th id="th"> Select folder </th>
  <th id="th"> Name your folder </th>
  <th id="th"> Upload folder </th>
  <th id="th"> Your profile </th>
  </tr>


   <tr>
  <td id="td">  <input type="file" name="uploaded_folder[]" id="file1"  webkitdirectory directory multiple> </td>
   <td>
    <input type="text" name="folder_name" id="folder_name" maxlength="16" placeholder="(old or create new now)" 
       pattern="[A-Za-z0-9_-]+" required> 
      </td>
  <td id="td">  <button type="submit" name="submit_folder" id="upload" ><img src="/photos/menu/cloud-upload.png" height="100%" width="100%"> </button> </td>
  <td id="td">  <a href="list.php" class="css_btn_class"><img src="/photos/menu/profil.png" height="50" width="100"> </a>  </td>
  </tr>

  </form>
  </table>
</p>
</div>





 <script>
  document.getElementById('select_name').onchange = uploadOnChange;

  function uploadOnChange() {
    var filename = this.value;
    var lastIndex = filename.lastIndexOf("\\");
    if (lastIndex >= 0) {
        filename = filename.substring(lastIndex + 1);
    }
    document.getElementById('filename').value = filename;
   }
  </script>
 

     <br><br><br><br><br><br><br><br><br>
  

</body>
</html>











<?php




  //echo "<font color='black'> Welcome your folder <b> $_SESSION[login] <br> <img src='/photos/menu/folder2.png' height='60' width='70'>   </b> </font>
  //<a/> <br> </font>"; 

echo "Welcome your cloud <a href='list_folder.php' id='welcome'> $_SESSION[login] <a/>";

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

 $sql="select id,created,folder_name,sum(size) from folder_uploads 
       where _to='".$_SESSION['login']."' group by folder_name";
 $result=$conn->query($sql);


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

   
    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  

     

//where user='".$_SESSION['login']."'




  //edw ena apradeigma omadopoihshs dedomenwn
 // while($row=$result->fetch_assoc())
   // {
    // $folder=$row['folder_name'];
    //  $size=$row['sum(size)'];
    // }
  



    if(!$result)
       {
        echo '<p> </p>';
          }


    else 
     {

     
        echo '<table width=100% id=table>
  <form action="move_recycle_bin.php" method="post" onSubmit="return delete_confirm();"/>
                <tr>
                    <td id="td"> <font color="black"> <b> Created </b> </font> </td>
                    <td id="td"> <font color="black"> <b> Names Folders </b> </font> </td>
                    <td id="td"> <font color="black"> <b> Size (bytes) </b> </font> </td>
                    <td id="td"> <font color="black"> <b> View </b> </font> </td>
                    <td id="td"> <font color="black"> <b> Download </b> </font> </td>
  
  <td>
 <div class="checkbox">
     <input type="checkbox" id="checkbox" onclick="toggle(this);">
     <label for="checkbox"></label>
       </div>
    </td>


<td>
 <button type="submit"  name="delete_folder" id="delete"/> <img src="/photos/menu/delete.png" height="25" width="45"> </button> 

</td>
  
                </tr>';
 
 //<td> <font color="black"> <b> type </b> </font> </td>

//<td> <font color='black'> <b> {$row['type']} </b> </font> </td>
       
       while($row = $result->fetch_assoc())
         {
         $_SESSION['folder']=$row['folder_name'];
          // echo $_SESSION['folder'];
          //$original_name=substr($row['name'],1);

            $date1=substr($row['created'],-11,2);
            $date2=substr($row['created'],-14,2);
            $paula="/";
            $date=$date1.$paula.$date2;
  
          $time = substr($row['created'], -8, 5);


         
         $folder_name = wordwrap($row['folder_name'], 8, "<br />\n");



           echo "
             <tr>

               <td id=td> <font color='black'> <b> $date $time </b> </font> </td>
              <td id=td> 
               {$row['folder_name']}<br><br>
               <a href='list_files.php?folder_name={$row['folder_name']}' id='directory'>  <a/> 
              </td>

               <td id=td> <font color='black'> <b> {$row['sum(size)']} </b> </font> </td>

           <td id=td>
         <a href='view_folder.php?folder_name={$row['folder_name']}' target='blank'> 
           <img src='/photos/view/view.png' id='img_size'>
            </a>  
            </td> 
  
       <td  id=td>
            &nbsp; &nbsp;
          <a href='download_folder.php?folder_name={$row['folder_name']}' target='blank'> 
         <img src='/photos/menu/download.png' id=img_size>
            </a>  
            </td> 

           <td align='center'><input type='checkbox' name='checked_folder[]' value='{$row['folder_name']}' </td>

                </tr>";
                }
        echo '</table>';


        }


    } //  kleisimo ths else gia thn emfanish twn dedomenwn


$conn->close();


 //echo "<input type=submit name=submit1 id=directory value=$_SESSION[login]> &nbsp; &nbsp;";
    

?>


