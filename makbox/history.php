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


 <link rel="stylesheet" type="text/css" href="/css/history.css">


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




<body>



</body>
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
      
     $sql="select id,created,name,type,_from,_to from history
           where _from='".$_SESSION['login']."' or _to='".$_SESSION['login']."'";
     $result=$conn->query($sql);

       
       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

   
    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  

      



          if(!$result)
           {
        echo '<p> Your history is empty </p>';
          }



    else 
     {
    

        echo '<div id=center align=center>
            <table id=table>
  <form action="history_delete.php" method="post" onSubmit="return delete_confirm();"/>
       
            <tr>

              <td colspan=2> <a href="list.php"> <i> <b> Back </b> </i> </a> </td>
              
             <td> <font type="" size="4"> <i> <b> Your history from cloud </b> </i> </font> </td>

        <td > <font color="black"> <b> Check All </b> </font> </td>

     <td>
     <div class="checkbox">
    <input type="checkbox" id="checkbox" onclick="toggle(this);">
    <label for="checkbox"></label>
       </div>
</td>

 <td>
 <button type="submit" name="delete_submit" id="delete"/> <img src="/photos/menu/delete.png" height="25" width="45">
   </button>
 </td>

                </tr>';
     
   
      
        echo ' <tr>
               <td> <hr>  </td>  <td> <hr>  </td> <td> <hr> </td> 
               <td> <hr>  </td> <td> <hr>  </td> <td> <hr>  </td>   
              </tr>';  
            


             
        while($row = $result->fetch_assoc())
          { 

           $from = $row['_from'];
           $to   = $row['_to'];
           $path = $from." "."->"." ".$to;
 
            $date1=substr($row['created'],-11,2);
            $date2=substr($row['created'],-14,2);
            $paula="/";
            $date=$date1.$paula.$date2;
  
          $time = substr($row['created'], -8, 5);


            echo "
                <tr>
                    <td> <font color='black'> $date $time </font> </td>
                     <td> <font color='black'> $path </font> </td>
                    <td> <font color='black'> {$row['name']}  <font> </td>
                    <td> <font color='black'> {$row['type']} </font> </td>
                   <td><input type='checkbox' name='checked_id[]' value='{$row['id']}' </td>
                   <td> <img src='/photos/menu/history.png' height='40' width='40'> </td>
                </tr>";
                }

        echo '</table>
               </div>';
      }


  //echo '<hr>';


 echo "<br>" ."<br>";

         
 

     } // end of else data


 $conn->close();


?>

