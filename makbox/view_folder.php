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
 
 <link rel="stylesheet" type="text/css" href="/css/view_folder.css">

</head>


<body id="body">


      
  <a href="javascript:close_window();" id="close_tab"><img src="/photos/menu/close.gif" id="img_size"></a>



  <script>
    function close_window() 
      {
     if (confirm("Do you want to close these files?"))
        {
    close();
       }
     }
 </script>






</body>


</html>




<?php


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

  if($conn->connect_error)
     {
     die ("Cannot connect to server " .$conn->connect_error);
       }

 else
   {

//$friendsArray = array("1apanthsh","chat1");
//$friendsArray2 = implode("','",$friendsArray); 

        $sql= "SELECT name, type, size,data,folder_name FROM folder_uploads 
               where _to='".$_SESSION['login']."' and folder_name='$folder_name'";
        $result = $conn->query($sql);
      

       $ip_addr = $_SERVER['REMOTE_ADDR'];
       $path = $_SERVER['REQUEST_URI'];

       $sql2="insert log_file (username,ip_addr,path,connect) values('".$_SESSION['login']."','$ip_addr','$path',NOW())";
       $result2=$conn->query($sql2);  

     

// folder_name='".$_SESSION['folder']."'
// group by folder_name    


  
       echo '<div id="left"></div>';
       echo '<div id="right"></div>';
       echo '<div id="top"></div>';
       echo '<div id="bottom"></div>';


    echo '<div id="see_files">';

   
      echo '<div id="center_eye"> 
               <div align="center"> <font size="4" color="black"> <i> <b> <u> Online view file! </u> </b> </i> </font> </div>               
                <img src="/photos/menu/view_online.png" height="150" width="200">
                 <br><br>
               </div>';


   while ($row=$result->fetch_assoc())
    {
     

     //$datas= array();
    // $datas[]=$row['data'];

      $images = array("image/jpeg","image/jpg","image/png");
      $audios = array("audio/wav","audio/mp3");
      $videos= array ("video/mp4");
      $texts = array("text/plain","application/octet-stream");
      $htmls = array ("text/html");
      $css = array ("text/css");
      $pdfs = array ("application/pdf");
      $words = array ("application/vnd.openxmlformats-officedocument.wordprocessingml.d");
      $exels = array ("application/vnd.ms-excel");
      $powerpoints = array ("application/vnd.ms-powerpoint");
     
      

       if (in_array($row['type'],$images)=== true)
             {
            echo  '<img id=vertical src="data:image/jpeg;base64,'. base64_encode($row['data']) .'"  title="'.$row['name'].'" height=150 width=200  onclick="this.width=450;this.height=400"/>';
            echo "&nbsp;" ."&nbsp;";
                }
               

        echo "&nbsp";   


        if (in_array($row['type'],$audios)=== true)
            {
     echo '<audio controls id=vertical src="data:audio/wav;base64,' .base64_encode($row['data']) .'"  title="'.$row['name'].'" />';
       echo "&nbsp;" ."&nbsp;";
             }

             echo "&nbsp";   

      

       if (in_array($row['type'],$videos)=== true)
          {
    echo '<video controls id=vertical src="data:video/mp4;base64,' .base64_encode($row['data']) .'"  title="'.$row['name'].'" height=450 width=300/>';
             echo "&nbsp;" ."&nbsp;";
           }




       if (in_array($row['type'],$texts)=== true)
          {
           echo "<img id=vertical src='/makbox/photos/view/text.png' height=150 width=200 title=$row[name]> ";
             echo "&nbsp;" ."&nbsp;";    
           }    

          echo "&nbsp";   
            


           if (in_array($row['type'],$htmls)=== true)
          {
           echo "<img id=vertical src='/photos/view/html.png' height=150 width=200 title=$row[name]> ";
             echo "&nbsp;" ."&nbsp;";
           }


         echo "&nbsp";   


         if (in_array($row['type'],$css)===true)
           {
            echo "<img id=vertical src='/photos/view/css.png' height=150 width=200 title=$row[name]> ";
             echo "&nbsp;" ."&nbsp;";
             }
 

          echo "&nbsp";   
 

 
          if (in_array($row['type'],$pdfs)===true)
           {
            echo "<img id=vertical src='/photos/view/pdf.png' height=150 width=200 title=$row[name]> ";
             echo "&nbsp;" ."&nbsp;";
             }
 

 
        echo "&nbsp";
  


         if (in_array($row['type'],$powerpoints)===true)
           {
            echo "<img id=vertical src='/photos/view/powerpoint.png' height=150 width=200 title=$row[name]> ";
             echo "&nbsp;" ."&nbsp;";
             }
 
      
         
        echo "&nbsp";
  


         if (in_array($row['type'],$words)===true)
           {
            echo "<img id=vertical src='/photos/view/word.png' height=150 width=200 title=$row[name]> ";
             echo "&nbsp;" ."&nbsp;";
             }
 

            
        echo "&nbsp";
  


         if (in_array($row['type'],$exels)===true)
           {
            echo "<img id=vertical src='/photos/view/exel.png' height=150 width=200 title=$row[name]> ";
             echo "&nbsp;" ."&nbsp;";
             }
 


      // echo '<embed src="" height="500" width="600">'; 

 
            
  } // kleisimo ths while 

    echo '</div>';





 } // kleisimo ths else gia ta dedomena

$result->free_result();
$conn->close();

}

}

?>









