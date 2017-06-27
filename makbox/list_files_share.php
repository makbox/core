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


</head>


<body>
 
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
   <table id='table1' width='30%' border='0'>

     <tr>
       <td colspan='5'> <font size='4'> <i> <b> File share process! </b> </i> </font> </td>
      </tr>

    <tr>
     <form action='' method='post'>


    <td align='right'> <input type='text' name='name_share' id='name_to_share' placeholder='Userame to share'> </td> 
    <td align='left'> <input type='submit' name='submit_share' value='share file' id='sub_share'> </td>
     <td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; </td>

     </form>
    </tr>

   </table>
  </div>";

   echo "<hr>";


       if(isset($_POST['submit_share']))
          {


     $to=$_POST['name_share'];
     
    $to = htmlspecialchars($to);
    $to = trim($to);
    $to = stripslashes($to);
    $to = $conn->real_escape_string($to);

                      


          $sql="select username from login where username='$to'";
          $result=$conn->query($sql);


         while ($row=$result->fetch_assoc())
                {


              if ($row['username']==$to) 
                   {


          $sql2="select id,file_type,name,type,size,data,_from
                from folder_uploads
                where id='$id' and _from='".$_SESSION['login']."' and file_type='canonical'";
          $result2=$conn->query($sql2);
          

           while ($row2=$result2->fetch_assoc())
             {
              $file_type=$row2['file_type'];
              $name=$row2['name'];
              $type=$row2['type'];
              $size=$row2['size'];
              $data=$row2['data'];
              $from=$_SESSION['login'];
               
         

         $path ="/list_files.php?folder_name=($to)";
      
         $sql3="insert into folder_uploads (file_type,folder_name,name,type,size,data,_from,_to,path,visit_path)
                 values ('$file_type','($to)','$name','$type','$size','$data','$from','$to','$path','no')";
         $result3=$conn->query($sql3);
         


                        if($result3)
                           {


                    $sql4="insert into backup_folder_uploads (file_type,folder_name,name,type,size,data,_from,_to)
                            values ('$file_type','($to)','$name','$type','$size','$data','$from','$to')";
                    $result4=$conn->query($sql4);


                        echo '<script type="text/javascript">alert("Success your file shared");
                        </script>';
                 
                       echo "<div align='right'>
                             <table id='table_share' width='30%' border='0'>


                         <tr>
                     <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                       <td align='right'> Name file: </td>  
                           <td> $name </td>
                         </tr>

 
                         <tr>
                     <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                       <td align='right'> Type file: </td>
                          <td> $type </td>
                         </tr>


                         <tr>
                      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                       <td align='right'> Size file: </td>   
                       <td> $size (bytes) </td>
                         </tr>
'

                         <tr>
                      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                       <td align='right'> From - to: </td>
                         <td> $from --> $to </td>
                        </tr>

                             </table>
                            </div>";

                        header("refresh:3;url=list.php");
                      //echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>"); 
                         }




                   else 
                     {
              echo '<script type="text/javascript">alert("Error share this file");
                    </script>';
                      echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>");  
                       }



                    } // end of while data


                  }// end if username exists



                 else  if ($row['username']!=$to)
                      {
                   echo '<script type="text/javascript">alert("This user not exists");
                    </script>';
                      echo ("<script>location.href='list_files.php?folder_name=$_SESSION[folder]'</script>");  
                       }

 

                 
                    } // end of while username exists


                 } // end of isset sumbit_share

          

          
 echo "<div align='center'> 
   <a href='list_files.php?folder_name=$_SESSION[folder]' id='cancel_share'> Cancel share file </a>
  </div>";



 
        } // end else of data
        
       } // end big else

        $conn->close();
    
   } // end big if for isset id




?>







