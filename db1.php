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

$host = $_SESSION['host'];
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
$db=$_SESSION['db'];

$conn = new mysqli($host, $user, $pass,$db);


if ($conn->connect_error) 
   {
    die("Error: " . $conn->connect_error);
     } 


else
  {

 
    $sql1="
 CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `php_start` varchar(8) NOT NULL,
  `class` varchar(8) NOT NULL,
  `agg1` varchar(8) NOT NULL,
  `public` varchar(32) NOT NULL,
  `public_func` varchar(64) NOT NULL,
  `agg2` varchar(8) NOT NULL,
  `array0` varchar(128) NOT NULL,
  `array1` varchar(128) NOT NULL,
  `array2` varchar(128) NOT NULL,
  `array3` varchar(128) NOT NULL,
  `agg3` varchar(8) NOT NULL,
  `agg4` varchar(8) NOT NULL,
  `php_end` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `time` (`time`),
  UNIQUE KEY `php_start` (`php_start`),
  UNIQUE KEY `class` (`class`),
  UNIQUE KEY `agg1` (`agg1`),
  UNIQUE KEY `public` (`public`),
  UNIQUE KEY `public_func` (`public_func`),
  UNIQUE KEY `agg2` (`agg2`),
  UNIQUE KEY `array0` (`array0`),
  UNIQUE KEY `array1` (`array1`),
  UNIQUE KEY `array2` (`array2`),
  UNIQUE KEY `array3` (`array3`),
  UNIQUE KEY `agg3` (`agg3`),
  UNIQUE KEY `agg4` (`agg4`),
  UNIQUE KEY `php_end` (`php_end`)
);";


   $result1=$conn->query($sql1);
 
     if($result1)
        {
//$th1='$';
//$th2='this';
$c='$connect';
$sql2 = "insert into users_details 
(php_start,class,agg1,public,public_func,agg2,array0,array1,array2,array3,agg3,agg4,php_end)
 values
('<?php','class in','{','public $c = array();','public function __construct()','{',
 '$','$','$','$',
 '}','}','?>')";

$result2=$conn->query($sql2);

//->connect[0]=$host;




$sql3="update users_details set 
array0 = concat(array0, 'this') , array1 = concat(array1,'this') , array2 = concat(array2,'this') , array3 = concat(array3,'this') 
WHERE id = 1";


$h="$host";
$ho="";
$ho .= '"'.$h.'"';

$u="$user";
$us="";
$us .= '"'.$u.'"';


$p="$pass";
$pas="";
$pas .= '"'.$p.'"';


$dbss=$_SESSION['db'];

$d="$dbss";
$dbs="";
$dbs .= '"'.$d.'"';



$sql4="update users_details set 
array0 = concat(array0, '->connect[0]=$ho;') , array1 = concat(array1,'->connect[1]=$us;') ,
 array2 = concat(array2,'->connect[2]=$pas;') , array3 = concat(array3,'->connect[3]=$dbs;') 
WHERE id = 1";





if ($result2) 
  {

   $result3=$conn->query($sql3);
   $result4=$conn->query($sql4);
   header('Location: db2.php');
  } // end of result2
 
 } // end of result 1

  else
   {
    header('Location: index2.php');
     }


 } // end fo else 

$conn->close();

?>
