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


 <link rel="stylesheet" type="text/css" href="/css/delete_account.css">


 
  <script type="text/javascript">

function delete_confirm()
    {
	var result = confirm("Are you sure you want to delete your account forever?");
	if(result){
		return true;
	}else{
		return false;
	}
    }

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});
</script>




</head>


<body id="body">


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
     
     require ('function.php');
     

     $username = $_SESSION['login'];
     $email = $_SESSION['mail']; 
     $folder_name = "(".$_SESSION['login'].")";
   

    $sql="select folder_name from folder_uploads 
          where file_type='default' and folder_name='$folder_name'";
    $result = $conn->query($sql);


 
        if($result==true)
          {
         echo "<div align='center'>
           <form action='' method='post' onSubmit='return delete_confirm();'>

                 <table id='table'>
              
             <tr>
            <td colspan=2> <h2> Account informations $_SESSION[login] </h2> </td>
            </tr>
 

           <tr>
             <th id='th'> <i> <u> Username:  </u> </i> </th>
             <td> <input type='text' name='username' id='user_acc' value='$username' readonly> </td>
           </tr>


           <tr>
            <th id='th'> <i> <u> Email: </u> </i> </th>
            <td> <input type='email' name='email' id='email_acc' value='$email' readonly> </td>
          </tr>


           <tr>
            <th id='th'> <i> <u> Cloud folder: </u> </i> </th> 
            <td> <input type='text' name='cloud_folder' id='folder_acc' value='$folder_name' readonly> </td>
           </tr>   
          
 
           <tr>
            <th id='th'> <i> <u> Your password: </u> </i> </th>
            <td> <input type='password' name='password'  id='password_acc' maxlength='32' required> </td>
            </tr>           
 

             <tr>
              <th id='th'> <i> <u> Retype password: </u> </i> </th> 
              <td> <input type='password' name='retype_password' id='password_acc' maxlength='32' required> </td>
                </tr>

              <tr>
                <th id='th'> <i> <u> Delete your account: </u> </i> </th> 
               <td> <input type='submit' name='submit' id='enter_acc' value='Delete account'> </td>
              </tr>

                <tr> 
              <td> <hr> </td> <td> <hr> </td>
                </tr>

                 <tr> 
               <td colspan=> <a href='list.php' id='back_acc'> Back your profile </a> </td>
               <th id='th'> <font color='red'> <i> 
                Warning: do not forget to get a copy of your files before you delete everything on your account.  
                </i> </font> </th> 
              </tr>



       </table>
      </form>     
     </div>";  


          if(isset($_POST['submit']))
             {

              $username = input($_POST['username']);
              $email = input($_POST['email']);
              $cloud_folder = input($_POST['cloud_flder']);
              $password = input(md5($_POST['password']));
              $retype_password = input(md5($_POST['retype_password']));            
  

                $sql_pass="select password from login where username='".$_SESSION['login']."'";
                $result_pass = $conn->query($sql_pass);
                $row_pass = $result_pass->fetch_assoc();

               
                $ip_addr = $_SERVER['REMOTE_ADDR'];


             if ($password==$row_pass['password'] && $retype_password==$row_pass['password'] && $password==$retype_password)
                 {
            // if  ($password==$retype_password) 
                  //{

                $sql1="delete from folder_uploads where _to='".$_SESSION['login']."'";
                $result1 = $conn->query($sql1);


               $sql2="delete from login where username='".$_SESSION['login']."'";
               $result2 = $conn->query($sql2);


               $sql3="delete from backup_login where username='".$_SESSION['login']."'";
               $result3 = $conn->query($sql3);


               $sql4="delete from profile where username='".$_SESSION['login']."'";
               $result4 = $conn->query($sql4);
 
                $sql5="insert into deleted_accounts (username,password,email,ip_addr) 
                       values('$username','$email','{$_POST['password']}','$ip_addr')";
                $result5 = $conn->query($sql5);               


                   echo '<script type="text/javascript">alert("Your account deleted! Thank you for using mak cloud");
                  </script>';
                 echo ("<script>location.href='logout.php'</script>");
                 
                   //}
                 }


            else if ($password!=$row_pass['password'])
             {
              echo '<script type="text/javascript">alert("Your password is wrong!");
               </script>';
               echo ("<script>location.href='delete_account.php'</script>");   
             }


        else if ($retype_password!=$row_pass['password'])
             {
              echo '<script type="text/javascript">alert("Your retype password is wrong!");
               </script>';
               echo ("<script>location.href='delete_account.php'</script>");
             }



             else if ($password!=$retype_password)
               {
              echo '<script type="text/javascript">alert("Password and retype password do not match!");
                  </script>';
                 echo ("<script>location.href='delete_account.php'</script>");
              }


                else
                  {
               echo '<script type="text/javascript">alert("Something was wrong!");
                  </script>';
                 echo ("<script>location.href='delete_account.php'</script>");
                    }

           
              } //end of isset for delete account
            




            } // end of result










    } // end of else data


  $conn->close();


?>
