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

 <link rel="stylesheet" type="text/css" href="/css/list_files_share.css">


 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>


<body>
 

   <br>
   
  <div align="center" id="footer"> 
     </div>
      


</body>
</html>







<?php



if(isset($_GET['id']))
   {

    $id = intval($_GET['id']);
 
   
    if($id <= 0) 
     {
        die('The ID is invalid!');
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

  
 echo"    
 <div align='center'>
   <form action='' method='post'>

     <div class='input-group custom_mail'>
      <span class='input-group-addon primary'><i class='glyphicon glyphicon-user'></i></span>
      <input id='text' type='text' name='name_share' class='form-control' placeholder='User to share' required>
    </div>


 <br>


 <button type='submit' name='submit_share' class='btn btn-primary custom_submit'>
   Share file
 <span class='glyphicon glyphicon-share-alt'></span>
  </button>

 

     </form>

  </div>";

   
   echo "<hr>";
   echo "<br><br>";  


       if(isset($_POST['submit_share']))
          {

          $to=$_POST['name_share'];


        $sql1 = "select username from login";
        $result1 = $conn->query($sql1);

          
          while ($row1 = $result1->fetch_assoc())
           { 

            if ($row1['username'] == $to)
             {


             shell_exec('shell/./unlock.sh');

                   
          $sql2="select id,file_type,name,type,size,data
                from folder_uploads
                where id='$id' and _to='".$_SESSION['login']."' and file_type='canonical'";
          $result2=$conn->query($sql2);
          

           while ($row2=$result2->fetch_assoc())
             {
              $file_type = $row2['file_type'];
              $name=$row2['name'];
              $type=$row2['type'];
              $size=$row2['size'];
              $data=$row2['data'];
              


            $path ="/list_files.php?folder_name=($to)";


            $sql3="INSERT INTO folder_uploads (file_type,folder_name,name,type,size,data,_from,_to,path,visit_path,created) 
                  VALUES('$file_type','($to)','$name','$type','$size','{$row2['data']}','{$_SESSION['login']}','$to','$path','no',NOW())";
            $result3=$conn->query($sql3);




    if($result3 == true ) 
        {   


             // execute queries

            $sql4="INSERT INTO backup_folder_uploads (file_type,folder_name,name,type,size,data,_from,_to,created) 
                   VALUES('$file_type','($to)','$name','$type','$size','$data','{$_SESSION['login']}','$to',NOW())";
            $result4=$conn->query($sql4);


            $sql5="insert into history (created,_from,_to,name,type)
                   select created,_from,_to,name,type from folder_uploads 
                 where created=NOW()";
            $result5=$conn->query($sql5);


            $sql6="update hard_disk set space_used = space_used + $size where user='$to'";            
            $result6=$conn->query($sql6);



               // echo details            
 
              echo "<p class='text-center'>

                       <font size='4'> Success: your file shared to user $to </font> <br>

                        Name file: $name  <br> 

                        Type file: $type <br>

                        Size file: $size (bytes) <br>

                        From - to: {$_SESSION['login']} --> $to <br>

                           </p>";

                       shell_exec('shell/./lock.sh');

                       header("refresh:5;url=list_folder.php");

                        exit();

                    }        
      


       
             else
                {
                echo "<p class='text-center'>
                      <font size='4' color='red'> Failed: your file cannot be shared to user $to </font> <br>
                       </p>";
                     header("refresh:5;url=list_folder.php");
                    exit();
                   }




                   } // end of while data


                   } // end if of username exist




            else  if ($row1['username'] != $to)
                {
                echo "<p class='text-center'>
                      <font size='4' color='red'> This user does not exist: please try again </font> <br>
                       ";
                    header("refresh:5;url=list_folder.php");
                    exit();
                 }


                  } // end while of username exist


                 } // end of isset sumbit_share

          

          
 echo "<div align='center'> 
   <a href='list_files.php?folder_name=$_SESSION[folder]' id='cancel_share'> Cancel share file </a>
  </div>";




 
        } // end else of data
        
       } // end big else

        $conn->close();
    
   } // end big if for isset id




?>






