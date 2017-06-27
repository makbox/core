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

 if (isset($_POST['submit']))
  {

   $folder=getcwd();

  $current_folder=substr("$folder",9);


 require 'class_cn.php';
 require "/var/www/$current_folder/classes/mail/PHPMailerAutoload.php";
 
 $obj = new in;
 
  $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

  
 $conn = new mysqli($host,$user,$pass,$db);

if ($conn->connect_error) 
    {
    die("Connect error " .$conn->connect_error);
     } 



 else
   {

  $email = $_POST['email'];

   $email = htmlspecialchars($email);
   $email = trim($email);
   $email = stripslashes($email);
  $email = $conn->real_escape_string($email);



 $sql="select email from login";
 $result=$conn->query($sql);


   $length = 16;
   $rand= substr(str_shuffle("0123456789ABCDEF"),0, $length);


 while ($row=$result->fetch_assoc())
   {
 if($row['email']==$email)
  {
    
$_SESSION['email']=$email;


$sql2 = "update login set forgot_text='$rand' where email='".$_SESSION['email']."'";
$result2=$conn->query($sql2);

  $_SESSION['link'] = time();
  $_SESSION['expires'] = $_SESSION['link'] + (3600); //one day  



 $sql3="select email,forgot_text from login where email='".$_SESSION['email']."'";
 $result3=$conn->query($sql3);
 $row3=$result3->fetch_assoc();
 

$forgot=$row3['forgot_text']; 

    

// ta stoixeia gia thn apotolh email


$message = "

Γλώσσα ελληνικά <br>

Σε περίπτωση που δεν εισέλθετε εντός τριών λεπτών στην πλατφόρμα <br>
επαναφοράς κωδικού το παρόν κλειδί δεν υποστηρίζεται και πρέπει <br>
να ξανα επαναλάβεται την διαδικασία από την αρχή. <br>
Με εκτίμηση η ο ομάδα ασφαλείας του makcloud <br>
Το κλειδί είναι το εξής: <font color=red> $forgot </font>  <br><br>

<br><br>

<img src=cid:recovery>

<br><br>

Language English <br>

Should not enter within three minutes on the platform <br>
password reset this key is not supported and should <br>
again to repeat the process again. <br>
In the assessment of makcloud security group <br>
The key is this: <font color=red> $forgot </font>
";



// apo edw kai katw stelenei to email
		
	
 $sql4="select smtp_server,smtp_user,smtp_pass,smtp_auth,smtp_port from mail ";
 $result4=$conn->query($sql4);
 $row4=$result4->fetch_assoc();

  $mail = new PHPMailer;
  
 $dec=base64_decode($row4['smtp_pass']);

 
$mail->isSMTP();                                 
$mail->Host = $row4['smtp_server'];                   
$mail->SMTPAuth = true;                        
$mail->Username = $row4['smtp_user'];            
$mail->Password = $dec;            
$mail->SMTPSecure = $row4['smtp_auth'];                
$mail->Port = $row4['smtp_port'];                   

$from=$row4['smtp_user'];

$mail->setFrom($from,'makbox');
$mail->FromName = 'makbox';

$mail->addAddress($email);                                

$mail->isHTML(true);                                  

$mail->AddEmbeddedImage('/var/www/makbox/photos/mail/recovery.jpg', 'recovery' ,'recovery.jpg');


$mail->Subject = 'Recovery password';
$mail->Body  = $message;
//$mail->AltBody = $message;


 if(!$mail->send()) 
    {   
      echo "<script language='javascript'>alert('This email can not be send');</script>";
     echo 'Mailer Error: ' .$mail->ErrorInfo;
      }        
      

   else
    {
    echo '<script type="text/javascript">alert("Forgot acces chech your email for recovery password");
         </script>';
     echo ("<script>location.href='forgot_link.php'</script>");
     }
    
			   

   } // end if equal from email


  } // end of while



  }//  end of else connect





 $conn->close();

 } // end of if submit

?>

