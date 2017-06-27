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


 <link rel="stylesheet" type="text/css" href="/css/user_notice.css">


 <link rel="stylesheet" type="text/css" href="/modules/example/index.css">

 <meta http-equiv="refresh" content="10">




  <script>
   function firewall() 
    {
    alert("Your firewall is disabled!");
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
  
     $sql="select count(visit_path) 
          from folder_uploads
          where visit_path='no' and _to='".$_SESSION['login']."' ";
     $result = $conn->query($sql);
     $row = $result->fetch_assoc();

     $files = $row['count(visit_path)']; 


     $sql2="select count(visit_path) 
          from messages
          where visit_path='no' and _to='".$_SESSION['login']."' ";
     $result2 = $conn->query($sql2);
     $row2 = $result2->fetch_assoc();


     $messages = $row2['count(visit_path)'];


     $sql3="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' ";
     $result3 = $conn->query($sql3);
     $row3 = $result3->fetch_assoc();
 
     $kilobytes = $row3['sum(size)']/1024; //convert to kilobytes
     $megabytes = $kilobytes/1024; // convert to megabytes  
     $megabytes = substr($megabytes, 0, -11);
     $storage   = $megabytes;    


  

     $sql_mod = "select app_name,blank from modules 
               where user_login='".$_SESSION['login']."'
               and enabled='on'";
     $result_mod = $conn->query($sql_mod);         
     $row_mod = $result_mod->fetch_assoc();
     $name_mod = $row_mod['app_name'];
     $blank_mod = $row_mod['blank'];




     echo"<table>

           <tr>
           <td align='left'> <font color='black' size='4'> <i> Notices of $_SESSION[login] </i> </font> </td>
           </tr>

          <tr>
        <td> <hr> </td>
         </tr>

          
           <tr>
         <td> 
        <a href='/list_files.php?folder_name=($_SESSION[login])' target='_parent' id='inbox_file'> 
          &nbsp; &nbsp; &nbsp; &nbsp; Files ($files)
          </a>  
           </td>
            </tr> 



           <tr>
         <td> 
        <a href='/messages.php' target='_parent' id='inbox_message'> 
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Messages ($messages)
          </a>  
           </td>
            </tr> 


             <tr>
         <td> 
        <a href='list.php' target='_parent' id='inbox_storage'> 
          &nbsp; &nbsp;  Using ($storage mb)
          </a>  
           </td>
            </tr> 


         <tr>
         <td> 
        <a href='list.php' target='_parent' id='inbox_firewall'> 
          enabled &nbsp;
          <a/>
           </td>
            </tr> 



        <!--  
          create a new tr and new td in tr
          and insert module path with link or not
           example
           -->

        <tr>
         <td> 
        <a href='/modules/example' target='_parent' id='example'> 
         $blank_mod  $name_mod
          <a/>
           </td>
            </tr> 



            </table>";      



   } // end of else isset



 $conn->close();


?>

