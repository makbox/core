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


 <link rel="stylesheet" type="text/css" href="/css/profile.css">


</head>



<body id="body">
 
  <div class="verticalLine">
  
     </div>


  <div class="verticalLine2">
  
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

   $profile_url=$_SERVER['REQUEST_URI'];
   $profile_id = substr($profile_url, 24); 


$sql="select profile_id,username,nickname,photo_data,background_data,gender,date_of_birth,description,
          your_interests, is_inside from profile  where profile_id='$profile_id'";
    $result=$conn->query($sql);


       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

    $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
    $result2=$conn->query($sql2);  
 
     


     //echo "<font color=black size=4> <i> $profile_id </i> </font>";
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




    } // end of while


   } // kleisimo ths else gia ta dedomena



    $conn->close();



?>



</body>
</html>
