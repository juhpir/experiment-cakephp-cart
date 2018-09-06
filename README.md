# experiment-cakephp-cart
Just quickly testing out of CakePHP 3.6 by creating a simple shopping cart example script

## Installation

1. Configure your www-server and git clone to a directory in the server
2. Install the project with composer, according to <a href="https://book.cakephp.org/3.0/en/installation.html" target="_blank">CakePHP documentation</a>
3. Configure database and run INSTALL.sql into it

### Additional notes

Give www-server read and write permissions to directories:  
logs  
tmp  
webroot/files/  
 
Check that the following symbolic links work:  
webroot/js/bootstrap -> ../../vendor/twbs/bootstrap/dist/js  
webroot/css/bootstrap -> ../../vendor/twbs/bootstrap/dist/css  
webroot/fonts/bootstrap -> ../../vendor/twbs/bootstrap/dist/fonts  
webroot/js/jquery/jquery.js -> ../../../vendor/components/jquery/jquery.js  