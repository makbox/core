# core

Makbox core for web server (upload, share, etc.)
 </br>
![Makbox_inside](makbox_inside.png) <br> <br>

Installation <br>

1) Modify yoyr server file <br>
for http server: <br>
change the files /etc/apache2/sites-available/000-deafult.conf  <br>
and replace with this  <br>

<VirtualHost *:80> <br>

        ServerAdmin webmaster@localhost <br>
	       ServerName localhost:80  <br>
        DocumentRoot /var/www/makbox  <br>


    <Directory "/var/www/makbox/shared"> <br>
     AllowOverride AuthConfig  <br>
     Order allow,deny   <br>
     Allow from all  <br>
    </Directory>  <br>



	ErrorLog ${APACHE_LOG_DIR}/makbox_error.log  <br>
	CustomLog ${APACHE_LOG_DIR}/makbox_access.log combined  <br>

 CustomLog ${APACHE_LOG_DIR}/cook.log enhance  <br>

<FilesMatch "\.(cgi|shtml|phtml|php)$">  <br>
				SSLOptions +StdEnvVars  <br>
		</FilesMatch>  <br>  
		<Directory /usr/lib/cgi-bin>  <br>
				SSLOptions +StdEnvVars  <br>
		</Directory>  <br>

</VirtualHost> <br> <br>



for https server  <br>

<VirtualHost *:443> <br>

        ServerAdmin webmaster@localhost <br>
	      ServerName localhost:443  <br>
      	DocumentRoot /var/www/makbox  <br>


    <Directory "/var/www/makbox/shared">  <br>
     AllowOverride AuthConfig  <br>
     Order allow,deny   <br>
     Allow from all  <br>
    </Directory>  <br>


	ErrorLog ${APACHE_LOG_DIR}/makbox_error.log  <br>
	CustomLog ${APACHE_LOG_DIR}/makbox_access.log combined  <br>

 CustomLog ${APACHE_LOG_DIR}/cook.log enhance  <br>
 
  SSLEngine on  <br>
  SSLCertificateFile /etc/apache2/ssl/your_key.crt  <br>
  SSLCertificateKeyFile /etc/apache2/ssl/yoyr_key.key <br>
  SSLCertificateChainFile /etc/apache2/ssl/yoyr_key_bundle.crt <br>
  
SSLProtocol all -SSLv2 -SSLv3 <br>
SSLHonorCipherOrder on <br> 
SSLCipherSuite "EECDH+ECDSA+AESGCM EECDH+aRSA+AESGCM EECDH+ECDSA+SHA384 \ <br>
EECDH+ECDSA+SHA256 EECDH+aRSA+SHA384 EECDH+aRSA+SHA256 EECDH+aRSA+RC4 \ <br>
EECDH EDH+aRSA RC4 !aNULL !eNULL !LOW !3DES !MD5 !EXP !PSK !SRP !DSS" <br>

 SSLCompression off <br>

<FilesMatch "\.(cgi|shtml|phtml|php)$">  <br>
				SSLOptions +StdEnvVars  <br>
		</FilesMatch>  <br>
		<Directory /usr/lib/cgi-bin>  <br>
				SSLOptions +StdEnvVars  <br>
		</Directory>  <br>


 </VirtualHost> <br> <br>


2) Download core  <br>

3) Make a direcory into /var/www  <br>
   direcory must be have name makbox  <br>
   Right: /var/www/makbox  <br>
  
4) unzip the core into /var/www/makbox  <br>

5) cut all files from sumbolder /var/www/makbox/core and copy into folder /var/www/makbox  <br>
   delete subfolder core  <br>

 
6) OPen your borowser and follow the steps for install makbox  <br>


