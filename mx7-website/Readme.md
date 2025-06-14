# __Website Under Development with PHP__

## __Requirements__
***
+ [Install XAMPP](https://www.apachefriends.org/index.html)  
+ [Install Git](https://git-scm.com/downloads)  
+ [Install VS Code](https://code.visualstudio.com/download)  
+ [Install PostgreSQL](https://www.postgresql.org/download/)  
(You must have the application's database tables and columns already created.)

***

## __How to Run the Website__
***
After installing XAMPP, open the ___php.ini___ file and add the following lines:

+ ___extension=php_pdo_pgsql.dll___  
+ ___extension=php_pgsql.dll___

Also, uncomment the following lines:

* ___extension=pdo_pgsql___  
* ___extension=pgsql___

After adding and uncommenting the lines, save the ___php.ini___ file and, if necessary, restart your machine.

Then, go to the path:  
___`C:\xampp\htdocs`___  
and place the project folder inside the ___htdocs___ directory in order to test the PHP website.

Open ___XAMPP___ and start the ___Apache___ service.

In your browser, access:  
___`localhost/your-folder/your-file.php`___

***

## __SSL Certificate__
Open CMD in the folder __xampp/apache__ and run the command:  
___`makecert`___

Enter and confirm your certificate password.

Fill in the following required information:
- **Country Name:** BR  
- **Organization:** MX7  
- **Common Name:** localhost  
- Confirm the password again

Then, go to:  
___`xampp/apache/conf/ssl.crt`___  
Double-click the generated certificate to install it.

To install:
- Choose **Current User**
- Select **Place all certificates in the following store**
- Choose **Trusted Root Certification Authorities**
- Complete the installation

***

> Feel free to contribute to the website :smile:
