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

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 

 <link rel="shortcut icon" href="/photos/menu/cloud_tit.png" /> 


 <link rel="stylesheet" type="text/css" href="/css/user_modules.css">





<script type="text/javascript">
window.onload=function()
{

    document.getElementById("eye").addEventListener("click", function(e){
        var pwd = document.getElementById("pwd");
        if(pwd.getAttribute("type")=="password"){
            pwd.setAttribute("type","text");
        } else {
            pwd.setAttribute("type","password");
        }
    });

}

</script>








</head>





<body>


   <div align="center" id="header">
    <h3> Mak cloud modules for developers! </h3> 
     </div>
 
      <hr>
      

  <br><br><br><br><br>



</body>
</html>






<?php


include_once 'languages/common.php';

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


    $sql_api_key="select api_key from modules_details where user_login='".$_SESSION['login']."'";
    $result_api_key = $conn->query($sql_api_key);
    $row_api_key = $result_api_key->fetch_assoc();
    $api_key = $row_api_key['api_key'];



    $sql_secret_key="select secret_key from modules_details where user_login='".$_SESSION['login']."'";
    $result_secret_key = $conn->query($sql_secret_key);
    $row_secret_key = $result_secret_key->fetch_assoc();
    $secret_key = $row_secret_key['secret_key'];

    


 echo "<div align='center'>
          <table id='table1' border='0' width='60%'>
    

        <tr>
          <td> <font size='4'> <b> Mak cloud api v1.0 </b> </font> </td>
         </tr>



        <tr>
          <td> Api key: $api_key </td>
         </tr>



        <tr>
          <td>

        Secret key:
     <input type='password' id='pwd' class='masked' value='$secret_key' size='32' 
                  style='border:none;outline:none;font-size:15.6px'>
        <button type='button' id='eye'>
            <img src='/photos/menu/eye.png' alt='eye'>
         </button>

            </td> 
          
         </tr>

     </table>
   </div>";
 


   echo "<br>" ."<br>";

 


   echo '<a href="user_modules.php?lang=en" id="flag_en"><img src="/photos/menu/english_flag.png" height="49" width="40"></a>';
   echo '<a href="user_modules.php?lang=gr" id="flag_gr"><img src="/photos/menu/greece_flag.png" height="45" width="53"></a>';


         
  echo "<div align='left'>
          <table id='table2' border='1' width='30%'>
    

        <tr>
          <td align='center'> <font size='4'> <b> $lang[TITLE] <b> </font> </td>
         </tr>



        <tr>
          <td align='center'> 
            $lang[RULE_1]
            </td> 
         </tr>


         <tr>
          <td align='center'>
           $lang[RULE_2]
            </td> 
         </tr>


       
         <tr>
          <td align='center'>
            $lang[RULE_3]
            </td> 
         </tr>


         <tr>
          <td align='center'>
           $lang[RULE_4]
            </td> 
         </tr>



         
         <tr>
          <td align='center'>
           $lang[RULE_5]
            </td> 
         </tr>


              
         <tr>
          <td align='center'>
            $lang[RULE_6]
            </td> 
         </tr>



        
          <tr>
          <td align='center'>
          $lang[RULE_7]
            </td> 
         </tr>




          <tr>
          <td align='center'>
            $lang[RULE_8]
            </td> 
         </tr>



          <tr>
          <td align='center'>
            $lang[RULE_9]
            </td> 
         </tr>


        <tr>
          <td align='center'>
            $lang[RULE_10]
            </td> 
         </tr>



         <tr>
          <td align='center'>
            $lang[NOTICE]
            </td> 
         </tr>




       <tr>
          <td align='center'>
             $lang[MESSAGE] 
            </td> 
         </tr>


     </table>
   </div>";






    
     $sql_mod = "select app_icon,app_name,blank from modules 
               where user_login='".$_SESSION['login']."'";
     $result_mod = $conn->query($sql_mod);         
     $row_mod = $result_mod->fetch_assoc();
     $name_mod = $row_mod['app_name'];
     $blank_mod = $row_mod['blank'];
     $icon_mod = $row_mod['app_icon'];




    echo "<div align='right'>
          <table id='table3' border='0' width='30%'>
    

        <tr>
          <td align='center' colspan='3'> <font size='4'> <b> Your modules in mak cloud! <b> </font> </td>
         </tr>


         <tr>
          <td colspan='3'>
  |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
              </td>
         </tr>



        <tr>
          <td align='center'> 
             <img src='data:image/jpeg;base64," .base64_encode($icon_mod)  ."' .height=35  width=40/>
              </td>

               <td>
             $name_mod
               </td>
               
              <td>
               <form action='' method='post'>
              <input type='submit' name='submit_on' value='On'>
              <input type='submit' name='submit_off' value='Off'>
               </form>
            </td> 
         </tr>



       <tr> <td> </td> </tr>
        <tr> <td> </td> </tr>
        <tr> <td> </td> </tr>




     </table>
   </div>";





      if(isset($_POST["submit_on"]))
        { 
         $sql_enabled = "update modules set enabled='on' 
                         where user_login='".$_SESSION['login']."'
                         and app_name='$name_mod'";
         $result_enabled = $conn->query($sql_enabled);
           
              if($result_enabled==true)
               {
            echo "<script type='text/javascript'>alert('Module $name_mod is enabled!');
                   </script>";
                echo ("<script>location.href='user_modules.php'</script>");
                }

           }






           if(isset($_POST["submit_off"]))
            { 
         $sql_disabled = "update modules set enabled='off' 
                         where user_login='".$_SESSION['login']."'
                         and app_name='$name_mod'";
         $result_disabled = $conn->query($sql_disabled);
            
                if($result_disabled==true)
               {
            echo "<script type='text/javascript'>alert('Module $name_mod is disabled!');
                   </script>";
                echo ("<script>location.href='user_modules.php'</script>");
                }


           }





   echo '<div align="center" id="bottom"> <a href="list.php" id="back"> Back your profile </a> </div>';


    } // end of else connect


   $conn->close();



?>




