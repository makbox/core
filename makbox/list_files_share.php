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
       <td colspan='5'> <font size='4'> <i> <b> Share to email! </b> </i> </font> </td>
      </tr>

    <tr>
     <form action='' method='post'>


    <td align='right'> <input type='email' name='name_share' id='name_to_share' placeholder='Userame to share'> </td> 
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
     
                   
          $sql2="select id,file_type,name,type,size,data
                from folder_uploads
                where id='$id' and _to='".$_SESSION['login']."' and file_type='canonical'";
          $result2=$conn->query($sql2);
          

           while ($row2=$result2->fetch_assoc())
             {
              $file_type=$row2['file_type'];
              $name=$row2['name'];
              $type=$row2['type'];
              $size=$row2['size'];
              $data=$row2['data'];
              $your_folder=$_SESSION['login'];
              



         $folder=getcwd();

       $current_folder=substr("$folder",9);
 
       require "/var/www/$current_folder/classes/mail/PHPMailerAutoload.php";



//$message = "Ok";

  $sql9="select smtp_server,smtp_user,smtp_pass,smtp_auth,smtp_port from mail";
 $result9=$conn->query($sql9);
 $row9=$result9->fetch_assoc();

  $mail = new PHPMailer;
  
 $dec=base64_decode($row9['smtp_pass']);

 
$mail->isSMTP();                                 
$mail->Host = $row9['smtp_server'];                   
$mail->SMTPAuth = true;                        
$mail->Username = $row9['smtp_user'];            
$mail->Password = $dec;            
$mail->SMTPSecure = $row9['smtp_auth'];                
$mail->Port = $row9['smtp_port'];                   

$from=$row9['smtp_user'];

$mail->setFrom($from,'Makbox');
$mail->FromName = 'Makbox';

$mail->addAddress($to);                                


$mail->isHTML(true);


$mail->Subject = 'Makbox: shared file';


$message = 'Makbox: shared your file';


$path = "shared_to_email/$your_folder/$name"; 

$mail->addAttachment($path);  





$mail->Body = $message;



//$mail->AltBody = $message;


 if(!$mail->send()) 
    {   
      echo "<script language='javascript'>alert('Error file cannot shared');</script>";
     echo 'Mailer Error: ' .$mail->ErrorInfo;
      }        
      

   else
    {
    echo "<script type='text/javascript'>alert('Success: your file shared to email');
         </script>";
 
                 
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
         }




                    } // end of while data



                 } // end of isset sumbit_share

          

          
 echo "<div align='center'> 
   <a href='list_files.php?folder_name=$_SESSION[folder]' id='cancel_share'> Cancel share file </a>
  </div>";



 
        } // end else of data
        
       } // end big else

        $conn->close();
    
   } // end big if for isset id




?>







