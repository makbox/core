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


 <link rel="stylesheet" type="text/css" href="/css/users_online.css">

                                                                                                                                                                                                                                                                                                                                
                                                    
 <meta http-equiv="refresh" content="10">

</head>



<body id="body">
 

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
  
    $sql="select profile_id,username,photo_data,is_inside from profile";
    $result=$conn->query($sql);

     echo '<font color="black" size="4"> <i> Cloud users </i> </font>';
     echo '<hr>';




     while ($row=$result->fetch_assoc())
      {
 
  if($row['is_inside']=='yes')
      {

   echo "<table>
         <tr>

   <td> 
   <img src='data:image/jpeg;base64," .base64_encode($row['photo_data'])  ."' .height=60  width=50/>
        </td>

  <td> <font size=3> <a href=profile.php?profile_id={$row['profile_id']} target=_parent> {$row['username']} <a> </font> </td>
           
        <td>
       <img src=/photos/menu/online.png height=10 width=12>
        </td>

         </tr>
     </table>";


//exit;

  }

 if($row['is_inside']=='no')
      {

    echo "<table>
         <tr>

   <td> 
   <img src='data:image/jpeg;base64," .base64_encode($row['photo_data'])  ."' .height=40  width=50/>
        </td>

       <td>
 <font size=3> <a href=profile.php?profile_id={$row['profile_id']} target=_parent> {$row['username']} <a> <font>    
     </td>
           
        <td>
       <img src=/photos/menu/ofline.png height=10 width=12>
        </td>

         </tr>
        </table>";


      }

    } // end of while



    $conn->close();

}// kleisimo ths else gia ta dedomena


?>



