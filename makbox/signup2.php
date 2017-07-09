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

 require('class_cn.php');
 require('function.php');

 $obj = new in;
 
  $host=$obj->connect[0];
 $user=$obj->connect[1];
 $pass=$obj->connect[2];
 $db=$obj->connect[3];

  
 $conn = new mysqli($host,$user,$pass,$db);

if (!$conn) 
    {
    die("Connect error " .$conn->connect_error);
   } 

else
  {

 //elenxos gia tuxon kena pedia
  if (empty($_POST['username'] || $_POST['password'] || $_POST['email']
            || $_POST['day'] || $_POST['month'] || $_POST['year']))
     {
 echo '<script type="text/javascript">alert("The fields are requireds");
         </script>';
     echo ("<script>location.href='index.php'</script>");
      }

    else
      {


  $username = input($_POST['username']);
  $password = md5(input($_POST['password']));
  $email = input($_POST['email']);
  $day = input($_POST['day']);
  $month = input($_POST['month']);
  $year = input($_POST['year']);
  $gender = input ($_POST['gender']);

  $p="-";
  $date_of_birth = $day.$p.$month.$p.$year;
 
   

$sql1="SELECT * FROM login WHERE username='$username'";
$result1=$conn->query($sql1);
$sql2="SELECT * FROM login WHERE email='$email'";
$result2=$conn->query($sql2);

  if($result1->num_rows>0)
     {
    echo '<script type="text/javascript">alert("This name exists. Please choose an another name");
         </script>';
     echo ("<script>location.href='signup.php'</script>");
       }

    else if($result2->num_rows>0)
     {
    echo '<script type="text/javascript">alert("This email exists. Please isnert an another email");
         </script>';
     echo ("<script>location.href='signup.php'</script>");
       }

     else
    {
$sql3 = "INSERT INTO login (username,password,email) VALUES ('$username','$password','$email')";
$result3=$conn->query($sql3);

if (($result3) === TRUE) 
      {
 
      // back up account
     $sql4="insert into backup_login (username,password,email) values ('$username','$password','$email')";
     $result4=$conn->query($sql4);

 
       //insert api key  
     $api_key_user="12DEAA2209001287AB00EDFA9902111C";
     $length_sec_key = 32;
     $secret_key_user= substr(str_shuffle("ABCDEF0123456789ABCDEF0123456789"),0, $length_sec_key);
   

     $sql_api="insert into modules_details (user_login,api_key,secret_key)
               values ('$username','$api_key_user','$secret_key_user')";
     $result_api=$conn->query($sql_api);
    

 
    // insert photo profile
   $rand_id=mt_rand(0000000000000000,9999999999999999);


    $desc="Please inside here one description for us";
    $inte="Update your interests to complete your profile";


    $sql5="insert into profile (profile_id,username,nickname,gender,date_of_birth,description,your_interests,is_inside) 
           values('$rand_id','$username','unknown','$gender','$date_of_birth','$desc','$inte','no')";
    $result5=$conn->query($sql5);
 


    $sql6="update profile , profile_images_random 
           set profile.background_name = profile_images_random.back_name,
           profile.background_type = profile_images_random.back_type,
           profile.background_size = profile_images_random.back_size,
           profile.background_data = profile_images_random.back_data
           where profile.background_name = profile_images_random.back_name";
    $result6=$conn->query($sql6);    


      



         if($gender=='male')
            {
  $sql7="update profile , profile_images_random 
           set profile.photo_name = profile_images_random.phot_name,
           profile.photo_type = profile_images_random.phot_type,
           profile.photo_size = profile_images_random.phot_size,
           profile.photo_data = profile_images_random.phot_data
           where profile.gender = profile_images_random.phot_gender
           and  profile.photo_name = profile_images_random.phot_name";
    $result7=$conn->query($sql7);  
            }



   else if($gender=='female')
            {
    $sql8="update profile , profile_images_random 
           set profile.photo_name = profile_images_random.phot_name,
           profile.photo_type = profile_images_random.phot_type,
           profile.photo_size = profile_images_random.phot_size,
           profile.photo_data = profile_images_random.phot_data
           where profile.gender = profile_images_random.phot_gender
           and  profile.photo_name = profile_images_random.phot_name";
    $result8=$conn->query($sql8);  
          }


   
       

      $sql_default="insert into folder_uploads (file_type,folder_name,name,type,size,_from,_to) 
                   values ('default','($username)','makcloud','text','100','makcloud','$username')";
      $result_default=$conn->query($sql_default);



      $sql_space="insert into hard_disk (user,space_used,space_limit) 
                   values ('$username','100','100000000')";
      $result_space=$conn->query($sql_space);


       shell_exec('shell/./unlock.sh');

       $uploads_dir  = $_SERVER['DOCUMENT_ROOT'];

       mkdir("$uploads_dir/shared/$username", 0777);

       shell_exec('shell/./lock.sh');


       // verify acount using email

       
        $folder=getcwd();

       $current_folder=substr("$folder",9);
 
       require "/var/www/$current_folder/classes/mail/PHPMailerAutoload.php";


       $length = 6;
       $verify_id= substr(str_shuffle
       ("0123456789"),0, $length);


      $_SESSION['verify_name']=$username;
      $_SESSION['verify_id']=$verify_id;



      $message = "

Γλώσσα ελληνικά <br>

Το κλειδί για την επαλήθευση του λογαριασμού σας <br>
είναι το εξής: $verify_id <br><br>
Με εκτίμηση η ο ομάδα ασφαλείας του Mak Cloud <br>


<br><br>

<img src=cid:verify>

<br><br>

Language English <br>

The key to verify your account <br>
is as follows: $verify_id <br> <br>
Yours is the security group of Mak Cloud <br>
";


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

$mail->setFrom($from,'Mak Cloud');
$mail->FromName = 'Mak Cloud';

$mail->addAddress($email);                                


$mail->isHTML(true);


$mail->AddEmbeddedImage("/var/www/$current_folder/photos/mail/verify.png", "verify" ,"verify.png");

$mail->Subject = 'Verification account';

$mail->Body = $message;

//$mail->AltBody = $message;


 if(!$mail->send()) 
    {   
      echo "<script language='javascript'>alert('This email can not be send');</script>";
     echo 'Mailer Error: ' .$mail->ErrorInfo;
      }        
      

   else
    {
    echo '<script type="text/javascript">alert("Chech your mail for verification code");
         </script>';
     echo ("<script>location.href='verify.php'</script>");
     }
 


   // end verify account




      }  // end is seccussfully sign up



    else 
     {
      echo '<script type="text/javascript">alert("Sign up error. please try again");
         </script>';
     echo ("<script>location.href='signup.php'</script>");
     }

   }

  
 }// kleisimo ths else gia tis eggrafes


} // kleisimo ths megalhs else

  $conn->close();
 
 
}// kleisimo tis megalhs if
 

?>
