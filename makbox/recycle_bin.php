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
 
 <link rel="stylesheet" type="text/css" href="/css/recycle_bin.css">


<script type="text/javascript">

function restore_delete_confirm()
    {
	var result = confirm("Are you sure you want to continue?");
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

<body id="body">




</html>
</html>




<?php


if (!isset($_SESSION['login']))
    {
      header("Location: index.php");
      }
   

   echo  "<div id=header1 align=center> 
           <font size='5'> <i> Recycle bin for your archives! </i> </font> <br><br>
              <a href='list.php' id='back'> Back to profile </a>
          </div>"; 


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

  $sql="select id,created,name,type,size,_from,folder_name from recycle_bin_folder where _to='".$_SESSION['login']."'";
  $result=$conn->query($sql);


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

     $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
     $result2=$conn->query($sql22);  
     


    if(!$result && !$result2)
       {
        echo '<p> </p>';
    }


    

    else 
     {
       

        echo '<div align=center>
            <table id=table1 cellspacing="0"> 
 
<form action="restore_delete.php" method="post" onSubmit="return restore_delete_confirm();"/>
 

           <tr id="tr1">
                    <td> <b> From </b>  </td>
                    <td> <b> Created </b> </td>
                    <td> <b> Folder </b> </td>
                    <td> <b> Name </b> </td>
                    <td> <b> type </b>  </td>
                    <td> <b> Size (bytes) </b> </td>

   
<td> 
<div class="checkbox">
    <input type="checkbox" id="checkbox" onclick="toggle(this);">
    <label for="checkbox"></label>
       </div>
</td>      


 <td>
 <input type="submit" title="Restore" name="restore_submit" id="restore" value=""/> 
&nbsp;
<input type="submit"  title="Delete forever" name="delete_submit" id="delete" value=""/> 
 </td>
                </tr>';
    
//<form action="delete_forever.php" method="post" onSubmit="return delete_confirm();"/>
    
        while($row = $result->fetch_assoc())
          {
            echo "
                <tr>
                    <td>  <b> {$row['_from']} </b>  </td>
                    <td>  <b> {$row['created']} </b>  </td>
                    <td>  <b> {$row['folder_name']} </b>  </td>
                    <td>  <b> {$row['name']} </b>  </td>
                    <td>  <b> {$row['type']} </b>  </td>
                    <td>  <b> {$row['size']} </b>  </td>
                    <td> <input type='checkbox' name='checked_id[]' value='{$row['id']}' </td>
              
                </tr>";
              }

       
        while($row2 = $result2->fetch_assoc())
          {
         //$original_name2=substr($row2['name'],1);
            echo "
                <tr>
                    <td> <b> $_SESSION[login] </b> </td>
                    <td> <b> {$row2['created']} </b>  </td>
                    <td> <b> {$row2['folder_name']} </b>  </td>
                    <td> <b> {$row2['name']} </b>  </td>
                    <td> <b> {$row2['type']} </b>  </td>
                   <td>  <b> {$row2['size']} </b> </td>
                   <td> <input type='checkbox' name='checked_id[]' value='{$row2['id']}' </td>
              
                </tr>";
        }
       

        
 

        echo '</table></div>';
    
  





    }

 echo "<br>" ."<br>" ."<br>" ."<br>" ."<br>";


 

    $conn->close();

}// kleisimo ths else gia ta dedomena



/*
      <td> <input type='checkbox' name='checked_id2[]' value='{$row['id']}' </td>

*/

?>



