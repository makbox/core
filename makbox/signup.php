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


?>


<html>
<head> 


<title> Makbox </title>
<link rel="shortcut icon" href="/photos/menu/cloud_tit.png" />

 <link rel="stylesheet" type="text/css" href="/css/signup.css">

<meta name="google-site-verification" content="hh915M86TDAFCv-hw0wsyiDpKBTUcfzkBbFuakhVqVU" />

</head>

<body id="body">



   <!--
 <div align="center"> <img src="/photos/footer/cloud_footer3.png" height="150" width="800" id="img-grey"> </div>
    --> 
   
     <br>

     <div align="center">
   Sign up <strong> today </strong> and share your files with your friends!
     </div>


 <hr>


  <div id="header1" align="center">
     </div>


  <div id="header2" align="center">
     </div>




 <br><br><br><br>




 <div align="center">
 <div class="demo">
  <h1 id="h">
  <font color=""> Mak </font> box
   </h1>

  <h1 id="hh">
  Sign up to continue in Mak box
   </h1>
   </div>
  </div>

  
  



    <div align="center">
   <form action="signup2.php" method="POST" id="form1">
       <br>
   <img src="/photos/menu/user_signup2.png" height="130" width="160" id="img-grey">
        <br> <br>
&nbsp;   <input type="text" name="username" id="name" placeholder="Username" maxlength="16" required> 
         <br> <br>
  &nbsp;    <input type="password" name="password" id="pass" 
 pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Password" maxlength="32" required>
       <br> <br>
&nbsp;    <input type="email" name="email" id="email" 
 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Example: characters@characters.domain" placeholder="Email" maxlength="64" required>
       <br> <br>



<!-- Day dropdown -->
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


<!-- Month dropdown -->
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



<!-- Year dropdown -->
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

 

  <br><br>


 <!--
 Male <input type="radio" name="gender" id="gender" value="male" required>
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 Female <input type="radio" name="gender" id="gender" value="female">
   -->   



       &nbsp;
    Male<input type="radio" id="r1" name="gender" value="male"/>
    <label for="r1"><span></span></label>
       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    Female<input type="radio" id="r2" name="gender" value="female"/>
    <label for="r2"><span></span></label>
  

  

<br><br>


  &nbsp; <input type="submit" name="submit" id="submit" value="Sign up">
  <br> 
 &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; 
 <div align="center"> <a href="index.php" id="a"> <b>  Back to login </b> </a> </div>
   </form>
    </div>
 
   


 <div class="footer">

   </div>



</body>
</html>
