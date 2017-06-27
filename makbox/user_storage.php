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


 <link rel="stylesheet" type="text/css" href="/css/user_storage.css">

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

 
         // select size for types archives


       $sql1="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='application/x-shellscript'";
      $result1 = $conn->query($sql1);
      $row1 = $result1->fetch_assoc();
 
     $size_shell = $row1['sum(size)']; 
  




      $sql2="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='application/x-apple-diskimage'";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_assoc();
 
     $size_max = $row2['sum(size)']; 




  

       $sql3="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='application/x-ms-dos-executable'";
      $result3 = $conn->query($sql3);
      $row3 = $result3->fetch_assoc();
 
     $size_exe = $row3['sum(size)']; 
  




      $sql4="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='application/vnd.android.package-archive'";
      $result4 = $conn->query($sql4);
      $row4 = $result4->fetch_assoc();
 
     $size_android = $row4['sum(size)']; 







   

       $sql5="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='application/pdf'";
      $result5 = $conn->query($sql5);
      $row5 = $result5->fetch_assoc();
 
     $size_pdf = $row5['sum(size)']; 
  




      $sql6="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' 
         and type='application/msword' or type='application/vnd.openxmlformats-officedocument.wordprocessingml.d'";
      $result6 = $conn->query($sql6);
      $row6 = $result6->fetch_assoc();
 
     $size_word = $row6['sum(size)']; 


  

       $sql7="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='application/vnd.ms-excel'";
      $result7 = $conn->query($sql7);
      $row7 = $result7->fetch_assoc();
 
     $size_excel = $row7['sum(size)']; 
  




      $sql8="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='text/plain'";
      $result8 = $conn->query($sql8);
      $row8 = $result8->fetch_assoc();
 
     $size_text = $row8['sum(size)']; 





  



       $sql9="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' 
         and type='image/jpeg' or type='image/jpg' or type='image/png' or type='image/gif' or type='image/icon'";
      $result9 = $conn->query($sql9);
      $row9 = $result9->fetch_assoc();
 
     $size_image = $row9['sum(size)']; 
  




      $sql10="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='video/mp4'";
      $result10 = $conn->query($sql10);
      $row10 = $result10->fetch_assoc();
 
     $size_video = $row10['sum(size)']; 





     

       $sql11="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='audio/mp3'";
      $result11 = $conn->query($sql11);
      $row11 = $result11->fetch_assoc();
 
     $size_audio = $row11['sum(size)']; 
  




      $sql12="select sum(size) 
          from folder_uploads
          where _to='".$_SESSION['login']."' and type='audio/wav'";
      $result12 = $conn->query($sql12);
      $row12 = $result12->fetch_assoc();
 
     $size_recorder = $row12['sum(size)']; 






   echo "<div align='center'>
          <table border='0' width='60%'>
    

        <tr id='tr1'>

           <td> </td> <td> </td> <td> </td>  <td> </td> <td> </td> <td> </td>
           <td> </td> <td> </td> <td> </td>  <td> </td> <td> </td> <td> </td>
           <td> </td> <td> </td> <td> </td>  <td> </td> <td> </td> <td> </td>
           <td> </td> <td> </td> <td> </td>  <td> </td> <td> </td> <td> </td>
           <td> </td> <td> </td> <td> </td>  <td> </td> <td> </td> 

      <td> <font size='4'> <i> <b> Detailed description Storage data </b> </i> </font> </td>
         </tr>

        <tr id='tr2'>

              <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> 
              <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> <th> </th>
              <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> th> </th>
              <th> </th> th> </th>

          <th> Applications </th> 
            <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> 
            <th> </th> <th> </th> <th> </th> <th> </th>

          <th> Documents </th>
            <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> 
            <th> </th> <th> </th> <th> </th> <th> </th> <th> </th> <th> </th>

          <th> Media </th>
         </tr>


       <tr>
        <td> <img src='/photos/storage/shell.png' height='64' width='64'> <br> ($size_shell bytes) </td> 
        <td align='center'> <img src='/photos/storage/pdf.png' height='64' width='64'> <br> ($size_pdf bytes) </td> 
        <td align='right'> <img src='/photos/storage/images.png' height='64' width='64'> <br> ($size_image bytes) </td>  
       </tr>


        <tr>
         <td> <img src='photos/storage/max.png' height='64' width='64'> <br> ($size_max bytes) </td>
         <td align='center'> <img src='photos/storage/word.png' height='64' width='64'> <br> ($size_word bytes) </td>
         <td align='right'> <img src='photos/storage/videos.png' height='64' width='64'> <br> ($size_video bytes) </td>
        </tr>
       

         <tr>
          <td> <img src='photos/storage/exe.png' height='64' width='64'> <br> ($size_exe bytes) </td>
          <td align='center'> <img src='photos/storage/excel.png' height='64' width='64'> <br> ($size_excel bytes) </td>
          <td align='right'> <img src='photos/storage/audios.png' height='64' width='64'> <br> ($size_audio bytes)</td>
        </tr>

    
         <tr>
          <td> <img src='photos/storage/android.png' height='84' width='70'> <br> ($size_android bytes) </td>
          <td align='center'> <img src='photos/storage/text.png' height='64' width='70'> <br> ($size_text bytes) </td>
          <td align='right'> <img src='photos/storage/microphone.png' height='64' width='74'> <br> ($size_recorder bytes) </td>
        </tr>



     </table>
   </div>";
 

  echo '<div align="center"> <a href="list.php" id="back"> Back your profile </a> </div>';



     }


 
 $conn->close();


?>
