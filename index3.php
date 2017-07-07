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
 
 include_once 'common.php';

?>





<html>
<head>


 <title> Makbox </title>
 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />


  <link rel="stylesheet" type="text/css" href="index.css">

 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">


<script type = 'text/javascript' >
function changeHashOnLoad() 
{
     window.location.href += '#';
     setTimeout('changeHashAgain()', '50'); 
}
 
function changeHashAgain()
 {
  window.location.href += '1';
}
 
var storedHash = window.location.hash;
window.setInterval(function () 
{
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);
window.onload=changeHashOnLoad;
</script> 



</head>


<body id="body" onload="doLogout(); return false;">


    
  <div align="center">
    <font color="#123863" size="6"> <b> Makbox </b> </font> 
     </div>



 <div id="header">

  </div>



   <div align="center">  
 <a href="index3.php?lang=en" id="flag_en"><img src="/makbox/photos/menu/english_flag.png" height="54" width="50"></a>
 <a href="index3.php?lang=gr" id="flag_gr"><img src="/makbox/photos/menu/greece_flag.png" height="50" width="63"></a>
  </div>


 <div align="center">
 <h3> <?php echo $lang['TITLE3']; ?> </h3> 
   <hr id="hr2">
   </div>


   

   <div align="center">
  <form action="" method="post">
     <h3 id="text">
    <?php echo $lang['MESSAGE3']; ?>
      </h3>
   &nbsp; 
   <?php echo $lang['USERNAME']; ?>
  <input type="text" name="username" id="username" placeholder="Your username" required>  
       <br><br>
   &nbsp;  
    <?php echo $lang['PASSWORD']; ?>
 <input type="password" name="password" id="password" placeholder="Your password" required>  
          <br><br>  
         <?php echo $lang['PASSWORD_RETYPE']; ?>
     <input type="password" name="retype_password" id="password" placeholder="Your password again" required>  
            &nbsp;   &nbsp;   &nbsp;   &nbsp;   &nbsp; &nbsp;
           <br><br>   
     &nbsp; &nbsp; &nbsp; 
      <?php echo $lang['EMAIL']; ?> 
     <input type="email" name="email" id="mail" placeholder="Your email address" required>  
       <?php echo $lang['NBSP3']; ?>
       <br><br>


   

    <?php echo $lang['DATE']; ?>



<select name="day" id="day" required>
    <option value="">Day</option>
    <option value="01">01</option>
    <option value="02">02</option>
    <option value="03">03</option>
    <option value="04">04</option>
    <option value="05">05</option>
    <option value="06">06</option>
    <option value="07">07</option>
    <option value="08">08</option>
    <option value="09">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
</select>


<select name="month" id="month" required>
    <option value="">Month</option>
    <option value="1">January</option>
    <option value="2">February</option>
    <option value="3">March</option>
    <option value="4">April</option>
    <option value="5">May</option>
    <option value="6">June</option>
    <option value="7">July</option>
    <option value="8">August</option>
    <option value="9">September</option>
    <option value="10">October</option>
    <option value="11">November</option>
    <option value="12">December</option>
</select>



<select name="year" id="year" required>
    <option value="">Year</option>
    <option value="09">1900</option>
    <option value="10">1901</option>
    <option value="11">1902</option>
    <option value="12">1903</option>
    <option value="13">1904</option>
    <option value="14">1905</option>
    <option value="15">1907</option>
    <option value="16">1907</option>
    <option value="17">1908</option>
    <option value="18">1909</option>
    <option value="19">1910</option>
    <option value="20">1911</option>
    <option value="21">1912</option>
    <option value="22">1913</option>
    <option value="23">1914</option>
    <option value="24">1915</option>
    <option value="25">1916</option>
    <option value="26">1917</option>
    <option value="27">1918</option>
    <option value="28">1919</option>
    <option value="01">1920</option>
    <option value="02">1921</option>
    <option value="03">1922</option>
    <option value="04">1923</option>
    <option value="05">1924</option>
    <option value="06">1925</option>
    <option value="07">1926</option>
    <option value="08">1927</option>
    <option value="09">1928</option>
    <option value="10">1929</option>
    <option value="11">1930</option>
    <option value="12">1931</option>
    <option value="13">1932</option>
    <option value="14">1933</option>
    <option value="15">1934</option>
    <option value="16">1935</option>
    <option value="18">1936</option>
    <option value="19">1937</option>
    <option value="20">1938</option>
    <option value="21">1939</option>
    <option value="22">1940</option>
    <option value="23">1941</option>
    <option value="24">1942</option>
    <option value="25">1943</option>
    <option value="26">1944</option>
    <option value="27">1945</option>
    <option value="28">1946</option>
    <option value="29">1947</option>
    <option value="30">1948</option>
    <option value="31">1949</option>
    <option value="01">1950</option>
    <option value="02">1951</option>
    <option value="03">1952</option>
    <option value="04">1953</option>
    <option value="05">1954</option>
    <option value="06">1955</option>
    <option value="07">1956</option>
    <option value="08">1957</option>
    <option value="09">1958</option>
    <option value="10">1959</option>
    <option value="11">1960</option>
    <option value="12">1961</option>
    <option value="13">1962</option>
    <option value="14">1963</option>
    <option value="15">1964</option>
    <option value="16">1965</option>
    <option value="17">1966</option>
    <option value="18">1936</option>
    <option value="19">1967</option>
    <option value="20">1968</option>
    <option value="21">1969</option>
    <option value="22">1970</option>
    <option value="23">1971</option>
    <option value="24">1972</option>
    <option value="25">1973</option>
    <option value="26">1974</option>
    <option value="27">1975</option>
    <option value="28">1976</option>
    <option value="29">1977</option>
    <option value="30">1978</option>
    <option value="01">1979</option>
    <option value="02">1980</option>
    <option value="03">1981</option>
    <option value="04">1982</option>
    <option value="05">1983</option>
    <option value="06">1984</option>
    <option value="07">1985</option>
    <option value="08">1986</option>
    <option value="09">1987</option>
    <option value="10">1988</option>
    <option value="11">1989</option>
    <option value="12">1990</option>
    <option value="13">1991</option>
    <option value="14">1992</option>
    <option value="15">1993</option>
    <option value="16">1994</option>
    <option value="18">1995</option>
    <option value="19">1996</option>
    <option value="20">1997</option>
    <option value="21">1998</option>
    <option value="22">1999</option>
    <option value="23">2000</option>
    <option value="24">2001</option>
    <option value="25">2002</option>
    <option value="26">2003</option>
    <option value="27">2004</option>
    <option value="28">2005</option>
    <option value="29">2006</option>
    <option value="30">2007</option>
    <option value="31">2008</option>
    <option value="01">2009</option>
    <option value="02">2010</option>
    <option value="03">2011</option>
    <option value="04">2012</option>
    <option value="05">2013</option>
    <option value="06">2014</option>
    <option value="07">2015</option>
    <option value="08">2016</option>
 </select>

   &nbsp; &nbsp; &nbsp;  

   <br><br>

   <?php echo $lang['GENDER']; ?>
    
   &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;      
 
   <?php echo $lang['GENDER_MALE']; ?>
 <input type="radio" name="gender" id="gender" value="male" required>
   &nbsp; &nbsp; &nbsp;  

    <?php echo $lang['GENDER_FEMALE']; ?>
  <input type="radio" name="gender" id="gender" value="female">
 
   &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;   



     <br><br>

    <input type="reset" value="<?php echo $lang['RES']; ?>" name="reset" id="reset">  
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="submit" value="<?php echo $lang['SUB']; ?>" name="submit3" id="submit"> 
   </form>

  


  <div class="footer">

   </div>




</body>
</html>





<?php


error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);

 if(!isset($_SESSION['start']))
    {
     header('Location: index.php');
      }



else if(!isset($_SESSION['step2']))
    {
     header('Location: index.php');
      }

//$ref=$_SERVER['HTTP_REFERER'];
//$link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//else if($_SERVER['HTTP_REFERER'])
//{ 
//header('Location: index3.php');
 //}


else
{
  echo '<meta http-equiv="cache-control" content="no-cache">';
   if(isset($_POST['submit3']))
     {

  $host=$_SESSION['host'];
  $user=$_SESSION['user'];
  $pass=$_SESSION['pass'];
  $db=$_SESSION['db'];


   $conn = new mysqli($host,$user,$pass,$db);


    if($conn->connect_error)
      {
      die ("Error " .$conn->connect_error);
        }



   else
     {
    require_once('function.php'); 

      $username=input($_POST['username']);
      $password=input(md5($_POST['password']));
      $retype=input(md5($_POST['retype_password']));
      $email=input($_POST['email']);
      $day = input($_POST['day']);
      $month = input($_POST['month']);
      $year = input($_POST['year']);
      $gender = input ($_POST['gender']);

      $p="-";
      $date_of_birth = $day.$p.$month.$p.$year;
           

       if(empty($username || $password || $retype || $email))
            {
        echo '<script type="text/javascript">alert("This filed are required");
         </script>';
         echo ("<script>location.href='index3.php'</script>");
             }
           


      // check if mutch password
      if($password===$retype)
       {

       $sql="insert into login (username,password,email,verify) values ('$username','$password','$email','yes')";
       $result=$conn->query($sql); 
 

       if($result==true)
           {


       $sql2="insert into backup_login (username,password,email) values ('$username','$password','$email')";
       $result2=$conn->query($sql2);

     $sql3="update users_details set array0='/protected/', array1='/protected/',array2='/protected/',array3='/protected/'";
     $result3=$conn->query($sql3);




       
       //insert api key  
     $api_key_user="12DEAA2209001287AB00EDFA9902111C";
     $length_sec_key = 32;
     $secret_key_user= substr(str_shuffle("ABCDEF0123456789ABCDEF0123456789"),0, $length_sec_key);
   

     $sql_api="insert into modules_details (user_login,api_key,secret_key)
               values ('$username','$api_key_user','$secret_key_user')";
     $result_api=$conn->query($sql_api);
    

 
    // insert background photo  and profile photo
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




 

           // chmod folder for files shared to email for administrator

           chmod("/var/www/$current_folder/makbox/shared_to_email", 0777);
 
           $_SESSION['shared_admin_folder'] = $username;




     $_SESSION['step3']=true;
     // header('Refresh: 0;URL=index4.php'); 
   sleep(5);
    echo '<div align=center> <img src="wait.gif"> </div>';
echo "<script type='text/javascript'> document.location = 'index4.php'; </script>";
            }// end of result

    

        } // end if for password mutch
    



    else if($password!=$retype)
         {
        echo '<script type="text/javascript">alert("Password do not mutch! Please try again");
         </script>';
           }

   
      else
        {
       echo $conn->error;
         }

      }  

  
   $conn->close();



}// end of submit3


} // end of submit start and step 2

?>
