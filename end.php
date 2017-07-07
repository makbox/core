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


 if(!isset($_SESSION['start']))
    {
     header('Location: index.php');
      }



 else if(!isset($_SESSION['step2']))
    {
     header('Location: index.php');
      }



else if(!isset($_SESSION['step3']))
    {
     header('Location: index.php');
      }


else if(!isset($_SESSION['step4']))
    {
     header('Location: index.php');
      }



else if(!isset($_POST['submit_end']))
    {
     header('Location: index.php');
      }



?>


<html>
<head>



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
</html>

<body>


</body>
</html>



<?php

  
  // get current folder name      

  $folder=getcwd();

  $current_folder=substr("$folder",9);
 



  


   

  // for reinstall makbox


  mkdir("/var/www/$current_folder/reinstall", 0777);
   


 $oldpath1="/var/www/$current_folder/cloud1.png";
 $newpath1="/var/www/$current_folder/reinstall/cloud1.png";
 $oldpath2="/var/www/$current_folder/cloud2.jpg";
 $newpath2="/var/www/$current_folder/reinstall/cloud2.jpg";
 $oldpath3="/var/www/$current_folder/cancel.png";
 $newpath3="/var/www/$current_folder/reinstall/cancel.png";
 $oldpath4="/var/www/$current_folder/db1.php";
 $newpath4="/var/www/$current_folder/reinstall/db1.php";
 $oldpath5="/var/www/$current_folder/db2.php";
 $newpath5="/var/www/$current_folder/reinstall/db2.php";
 $oldpath6="/var/www/$current_folder/end.php";
 $newpath6="/var/www/$current_folder/reinstall/end.php";
 $oldpath7="/var/www/$current_folder/function.php";
 $newpath7="/var/www/$current_folder/reinstall/function.php";
 $oldpath8="/var/www/$current_folder/index.css";
 $newpath8="/var/www/$current_folder/reinstall/index.css";
 $oldpath9="/var/www/$current_folder/index.php";
 $newpath9="/var/www/$current_folder/reinstall/index.php";
 $oldpath10="/var/www/$current_folder/index2.php";
 $newpath10="/var/www/$current_folder/reinstall/index2.php";
 $oldpath11="/var/www/$current_folder/index3.php";
 $newpath11="/var/www/$current_folder/reinstall/index3.php";
 $oldpath12="/var/www/$current_folder/index4.php";
 $newpath12="/var/www/$current_folder/reinstall/index4.php";
 $oldpath13="/var/www/$current_folder/index5.php";
 $newpath13="/var/www/$current_folder/reinstall/index5.php";
 $oldpath14="/var/www/$current_folder/tables.php";
 $newpath14="/var/www/$current_folder/reinstall/tables.php";
 $oldpath15="/var/www/$current_folder/wait.gif";
 $newpath15="/var/www/$current_folder/reinstall/wait.gif";
 $oldpath16="/var/www/$current_folder/database.png";
 $newpath16="/var/www/$current_folder/reinstall/database.png";
 $oldpath17="/var/www/$current_folder/host.png";
 $newpath17="/var/www/$current_folder/reinstall/host.png";
 $oldpath18="/var/www/$current_folder/mail.png";
 $newpath18="/var/www/$current_folder/reinstall/mail.png";
 $oldpath19="/var/www/$current_folder/name.png";
 $newpath19="/var/www/$current_folder/reinstall/name.png";
 $oldpath20="/var/www/$current_folder/next.png";
 $newpath20="/var/www/$current_folder/reinstall/next.png";
 $oldpath21="/var/www/$current_folder/pass.png";
 $newpath21="/var/www/$current_folder/reinstall/pass.png";
 $oldpath22="/var/www/$current_folder/common.php";
 $newpath22="/var/www/$current_folder/reinstall/common.php";
 $oldpath23="/var/www/$current_folder/db3.php";
 $newpath23="/var/www/$current_folder/reinstall/db3.php";
 $oldpath24="/var/www/$current_folder/lang.en.php";
 $newpath24="/var/www/$current_folder/reinstall/lang.en.php";
 $oldpath25="/var/www/$current_folder/lang.gr.php";
 $newpath25="/var/www/$current_folder/reinstall/lang.gr.php";





 rename($oldpath1,$newpath1);
 rename($oldpath2,$newpath2);
 rename($oldpath3,$newpath3);
 rename($oldpath4,$newpath4);
 rename($oldpath5,$newpath5);
 rename($oldpath6,$newpath6);
 rename($oldpath7,$newpath7);
 rename($oldpath8,$newpath8);
 rename($oldpath9,$newpath9);
 rename($oldpath10,$newpath10);
 rename($oldpath11,$newpath11);
 rename($oldpath12,$newpath12);
 rename($oldpath13,$newpath13);
 rename($oldpath14,$newpath14);
 rename($oldpath15,$newpath15);
 rename($oldpath16,$newpath16);
 rename($oldpath17,$newpath17);
 rename($oldpath18,$newpath18);
 rename($oldpath19,$newpath19);
 rename($oldpath20,$newpath20);
 rename($oldpath21,$newpath21);
 rename($oldpath22,$newpath22);
 rename($oldpath23,$newpath23);
 rename($oldpath24,$newpath24);
 rename($oldpath25,$newpath25);









      //cut from folder makbox archives only no subfolders

 
   $src_arch = "/var/www/$current_folder/makbox";
   $dst_arch = "/var/www/$current_folder";
   $files_arch = glob("/var/www/$current_folder/makbox/*.*");
   foreach($files_arch as $file_arch)
    {
       $file_to_go_arch = str_replace($src_arch,$dst_arch,$file_arch);
       copy($file_arch, $file_to_go_arch);
    }








   //cut from folder android

 
   mkdir ("/var/www/$current_folder/android",0777);
 
   $src_andr = "/var/www/$current_folder/makbox/android";
   $dst_andr = "/var/www/$current_folder/android";
   $files_andr = glob("/var/www/$current_folder/makbox/android/*.*");
   foreach($files_andr as $file_andr)
    {
       $file_to_go_andr = str_replace($src_andr,$dst_andr,$file_andr);
       copy($file_andr, $file_to_go_andr);
    }

 






   //cut from folder background_images_random


   mkdir ("/var/www/$current_folder/background_images_random",0777);
 
   $src_b1 = "/var/www/$current_folder/makbox/background_images_random";
   $dst_b1 = "/var/www/$current_folder/background_images_random";
   $files_b1 = glob("/var/www/$current_folder/makbox/background_images_random/*.*");
   foreach($files_b1 as $file_b1)
    {
       $file_to_go_b1 = str_replace($src_b1,$dst_b1,$file_b1);
       copy($file_b1, $file_to_go_b1);
    }







   
   //cut from folder classes


    mkdir ("/var/www/$current_folder/classes",0777);
    mkdir ("/var/www/$current_folder/classes/mail",0777);
    mkdir ("/var/www/$current_folder/classes/mail/docs",0777);
    mkdir ("/var/www/$current_folder/classes/mail/extras",0777);
    mkdir ("/var/www/$current_folder/classes/mail/images",0777);
    mkdir ("/var/www/$current_folder/classes/mail/language",0777);
    mkdir ("/var/www/$current_folder/classes/mail/test",0777);


   
   $src_m1 = "/var/www/$current_folder/makbox/classes/mail/docs";
   $dst_m1 = "/var/www/$current_folder/classes/mail/docs";
   $files_m1 = glob("/var/www/$current_folder/makbox/classes/mail/docs/*.*");
   foreach($files_m1 as $file_m1)
    {
       $file_to_go_m1 = str_replace($src_m1,$dst_m1,$file_m1);
       copy($file_m1, $file_to_go_m1);
    }




      
   $src_m2 = "/var/www/$current_folder/makbox/classes/mail/extras";
   $dst_m2 = "/var/www/$current_folder/classes/mail/extras";
   $files_m2 = glob("/var/www/$current_folder/makbox/classes/mail/extras/*.*");
   foreach($files_m2 as $file_m2)
    {
       $file_to_go_m2 = str_replace($src_m2,$dst_m2,$file_m2);
       copy($file_m2, $file_to_go_m2);
    }





   
   $src_m3 = "/var/www/$current_folder/makbox/classes/mail/images";
   $dst_m3 = "/var/www/$current_folder/classes/mail/images";
   $files_m3 = glob("/var/www/$current_folder/makbox/classes/mail/images/*.*");
   foreach($files_m3 as $file_m3)
    {
       $file_to_go_m3 = str_replace($src_m3,$dst_m3,$file_m3);
       copy($file_m3, $file_to_go_m3);
    }
   


     
   $src_m4 = "/var/www/$current_folder/makbox/classes/mail/language";
   $dst_m4 = "/var/www/$current_folder/classes/mail/language";
   $files_m4 = glob("/var/www/$current_folder/makbox/classes/mail/language/*.*");
   foreach($files_m4 as $file_m4)
    {
       $file_to_go_m4 = str_replace($src_m4,$dst_m4,$file_m4);
       copy($file_m4, $file_to_go_m4);
    }



     
   $src_m5 = "/var/www/$current_folder/makbox/classes/mail/test";
   $dst_m5 = "/var/www/$current_folder/classes/mail/test";
   $files_m5 = glob("/var/www/$current_folder/makbox/classes/mail/test/*.*");
   foreach($files_m5 as $file_m5)
    {
       $file_to_go_m5 = str_replace($src_m5,$dst_m5,$file_m5);
       copy($file_m5, $file_to_go_m5);
    }


 
   $src_m6 = "/var/www/$current_folder/makbox/classes/mail";
   $dst_m6 = "/var/www/$current_folder/classes/mail";
   $files_m6 = glob("/var/www/$current_folder/makbox/classes/mail/*.*");
   foreach($files_m6 as $file_m6)
    {
       $file_to_go_m6 = str_replace($src_m6,$dst_m6,$file_m6);
       copy($file_m6, $file_to_go_m6);
    }







 
    //cut from folder core

    mkdir ("/var/www/$current_folder/core/",0777);

    $src_core = "/var/www/$current_folder/makbox/core";
    $dst_core = "/var/www/$current_folder/core";
    $files_core = glob("/var/www/$current_folder/makbox/core/*.*");
   foreach($files_core as $file_core)
    {
       $file_to_go_core = str_replace($src_core,$dst_core,$file_core);
       copy($file_core, $file_to_go_core);
    }



   



       //cut from folder css

    mkdir ("/var/www/$current_folder/css",0777);

    $src_css = "/var/www/$current_folder/makbox/css";
    $dst_css = "/var/www/$current_folder/css";
    $files_css = glob("/var/www/$current_folder/makbox/css/*.*");
   foreach($files_css as $file_css)
    {
       $file_to_go_css = str_replace($src_css,$dst_css,$file_css);
       copy($file_css, $file_to_go_css);
    }





   
       //cut from folder error

    mkdir ("/var/www/$current_folder/error",0777);

    $src_error = "/var/www/$current_folder/makbox/error";
    $dst_error = "/var/www/$current_folder/error";
    $files_error = glob("/var/www/$current_folder/makbox/error/*.*");
   foreach($files_error as $file_error)
    {
       $file_to_go_error = str_replace($src_error,$dst_error,$file_error);
       copy($file_error, $file_to_go_error);
     }







   
       //cut from folder images

    mkdir ("/var/www/$current_folder/images",0777);

    $src_images = "/var/www/$current_folder/makbox/images";
    $dst_images = "/var/www/$current_folder/images";
    $files_images = glob("/var/www/$current_folder/makbox/images/*.*");
   foreach($files_images as $file_images)
    {
       $file_to_go_images = str_replace($src_images,$dst_images,$file_images);
       copy($file_images, $file_to_go_images);
     }









   //cut from folder js

    mkdir ("/var/www/$current_folder/js",0777);

    $src_js = "/var/www/$current_folder/makbox/js";
    $dst_js = "/var/www/$current_folder/js";
    $files_js = glob("/var/www/$current_folder/makbox/js/*.*");
   foreach($files_js as $file_js)
    {
       $file_to_go_js = str_replace($src_js,$dst_js,$file_js);
       copy($file_js, $file_to_go_js);
     }






   

   //cut from folder languages

    mkdir ("/var/www/$current_folder/languages",0777);

    $src_lang = "/var/www/$current_folder/makbox/languages";
    $dst_lang = "/var/www/$current_folder/languages";
    $files_lang = glob("/var/www/$current_folder/makbox/languages/*.*");
   foreach($files_lang as $file_lang)
    {
       $file_to_go_lang = str_replace($src_lang,$dst_lang,$file_lang);
       copy($file_lang, $file_to_go_lang);
     }










  
     //cut from folder modules

    mkdir ("/var/www/$current_folder/modules",0777);
    mkdir ("/var/www/$current_folder/modules/example",0777);
   

    $src_mod = "/var/www/$current_folder/makbox/modules";
    $dst_mod = "/var/www/$current_folder/modules";
    $files_mod = glob("/var/www/$current_folder/makbox/modules/*.*");
   foreach($files_mod as $file_mod)
    {
       $file_to_go_mod = str_replace($src_mod,$dst_mod,$file_mod);
       copy($file_mod, $file_to_go_mod);
     }




    $src_mod_ex = "/var/www/$current_folder/makbox/modules/example";
    $dst_mod_ex = "/var/www/$current_folder/modules/example";
    $files_mod_ex = glob("/var/www/$current_folder/makbox/modules/example/*.*");
   foreach($files_mod_ex as $file_mod_ex)
    {
       $file_to_go_mod_ex = str_replace($src_mod_ex,$dst_mod_ex,$file_mod_ex);
       copy($file_mod_ex, $file_to_go_mod_ex);
     }

  



    //cut from folder photos

    mkdir ("/var/www/$current_folder/photos",0777);
    mkdir ("/var/www/$current_folder/photos/account",0777);
    mkdir ("/var/www/$current_folder/photos/footer",0777);
    mkdir ("/var/www/$current_folder/photos/mail",0777);
    mkdir ("/var/www/$current_folder/photos/menu",0777);
    mkdir ("/var/www/$current_folder/photos/profiles",0777);
    mkdir ("/var/www/$current_folder/photos/storage",0777);
    mkdir ("/var/www/$current_folder/photos/view",0777);


    $src_phot = "/var/www/$current_folder/makbox/photos";
    $dst_phot = "/var/www/$current_folder/photos";
    $files_phot = glob("/var/www/$current_folder/makbox/photos/*.*");
   foreach($files_phot as $file_phot)
    {
       $file_to_go_phot = str_replace($src_phot,$dst_phot,$file_phot);
       copy($file_phot, $file_to_go_phot);
     }


  
     $src_phot_ac = "/var/www/$current_folder/makbox/photos/account";
    $dst_phot_ac = "/var/www/$current_folder/photos/account";
    $files_phot_ac = glob("/var/www/$current_folder/makbox/photos/account/*.*");
   foreach($files_phot_ac as $file_phot_ac)
    {
       $file_to_go_phot_ac = str_replace($src_phot_ac,$dst_phot_ac,$file_phot_ac);
       copy($file_phot_ac, $file_to_go_phot_ac);
     }



    $src_phot_foo = "/var/www/$current_folder/makbox/photos/footer";
    $dst_phot_foo = "/var/www/$current_folder/photos/footer";
    $files_phot_foo = glob("/var/www/$current_folder/makbox/photos/footer/*.*");
   foreach($files_phot_foo as $file_phot_foo)
    {
       $file_to_go_phot_foo = str_replace($src_phot_foo,$dst_phot_foo,$file_phot_foo);
       copy($file_phot_foo, $file_to_go_phot_foo);
     }



    $src_phot_mail = "/var/www/$current_folder/makbox/photos/mail";
    $dst_phot_mail = "/var/www/$current_folder/photos/mail";
    $files_phot_mail = glob("/var/www/$current_folder/makbox/photos/mail/*.*");
   foreach($files_phot_mail as $file_phot_mail)
    {
       $file_to_go_phot_mail = str_replace($src_phot_mail,$dst_phot_mail,$file_phot_mail);
       copy($file_phot_mail, $file_to_go_phot_mail);
     }



     $src_phot_menu = "/var/www/$current_folder/makbox/photos/menu";
    $dst_phot_menu = "/var/www/$current_folder/photos/menu";
    $files_phot_menu = glob("/var/www/$current_folder/makbox/photos/menu/*.*");
   foreach($files_phot_menu as $file_phot_menu)
    {
       $file_to_go_phot_menu = str_replace($src_phot_menu,$dst_phot_menu,$file_phot_menu);
       copy($file_phot_menu, $file_to_go_phot_menu);
     }




     $src_phot_prof = "/var/www/$current_folder/makbox/photos/profiles";
    $dst_phot_prof = "/var/www/$current_folder/photos/profiles";
    $files_phot_prof = glob("/var/www/$current_folder/makbox/photos/profiles/*.*");
   foreach($files_phot_prof as $file_phot_prof)
    {
       $file_to_go_phot_prof = str_replace($src_phot_prof,$dst_phot_prof,$file_phot_prof);
       copy($file_phot_prof, $file_to_go_phot_prof);
     }




    $src_phot_stor = "/var/www/$current_folder/makbox/photos/storage";
    $dst_phot_stor = "/var/www/$current_folder/photos/storage";
    $files_phot_stor = glob("/var/www/$current_folder/makbox/photos/storage/*.*");
   foreach($files_phot_stor as $file_phot_stor)
    {
       $file_to_go_phot_stor = str_replace($src_phot_stor,$dst_phot_stor,$file_phot_stor);
       copy($file_phot_stor, $file_to_go_phot_stor);
     }




     $src_phot_view = "/var/www/$current_folder/makbox/photos/view";
    $dst_phot_view = "/var/www/$current_folder/photos/view";
    $files_phot_view = glob("/var/www/$current_folder/makbox/photos/view/*.*");
   foreach($files_phot_view as $file_phot_view)
    {
       $file_to_go_phot_view = str_replace($src_phot_view,$dst_phot_view,$file_phot_view);
       copy($file_phot_view, $file_to_go_phot_view);
     }







    //cut from folder shared_to_email

    $shared_admin_folder = $_SESSION['shared_admin_folder'];

    mkdir ("/var/www/$current_folder/shared_to_email",0777);
    chmod("/var/www/$current_folder/shared_to_email", 0777);


    $src_share_t = "/var/www/$current_folder/makbox/shared_to_email";
    $dst_share_t = "/var/www/$current_folder/shared_to_email";
    $files_share_t = glob("/var/www/$current_folder/makbox/shared_to_email/*.*");
   foreach($files_share_t as $file_share_t)
    {
       $file_to_go_share_t = str_replace($src_share_t,$dst_share_t,$file_share_t);
       copy($file_share_t, $file_to_go_share_t);
     }


     $oldpath_htaccess="/var/www/$current_folder/shared_to_email/htaccess.txt";
     $newpath_htaccess="/var/www/$current_folder/shared_to_email/.htaccess";


     $oldpath_htapasswd="/var/www/$current_folder/shared_to_email/htpasswd.txt";
     $newpath_htapasswd="/var/www/$current_folder/shared_to_email/.htpasswd";

     rename($oldpath_htaccess,$newpath_htaccess);
     rename($oldpath_htapasswd,$newpath_htapasswd);



    mkdir ("/var/www/$current_folder/shared_to_email/$shared_admin_folder",0777);
    chmod("/var/www/$current_folder/shared_to_email/$shared_admin_folder", 0777);




    //cut from folder sql

    mkdir ("/var/www/$current_folder/sql",0777);
    mkdir ("/var/www/$current_folder/sql/tables",0777);
  

    $src_sql_t = "/var/www/$current_folder/makbox/sql/tables";
    $dst_sql_t = "/var/www/$current_folder/sql/tables";
    $files_sql_t = glob("/var/www/$current_folder/makbox/sql/tables/*.*");
   foreach($files_sql_t as $file_sql_t)
    {
       $file_to_go_sql_t = str_replace($src_sql_t,$dst_sql_t,$file_sql_t);
       copy($file_sql_t, $file_to_go_sql_t);
     }













// Delete folder makbox after install

// Get os for server to run command

// Os systems names in uname export
//_________________________________
// CYGWIN_NT-5.1
// Darwin -> Mac 
// FreeBSD
// HP-UX
// IRIX64
// Linux -> Gnu/linux
// NetBSD
// OpenBSD
// SunOS
// Unix
// WIN32 -> Windows xp
// WINNT -> Windows NT
// Windows -> Windows (7,8,10)



   $uname=posix_uname();


   $os = current($uname); // get the first ellement of assoc array
 
   if ($os=='Linux')
     {
     $delete_folder = $folder ."/" ."makbox";
     $output = shell_exec("rm -r '".$delete_folder."'");
     // chmod all files in current folder for run makbox
     $output = shell_exec("chmod -R 777 '".$folder."'"); 
      }
 



session_unset();
session_destroy();
header('location: /');


?>
