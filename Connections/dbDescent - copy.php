<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dbDescent = "localhost";
$database_dbDescent = "descent_mobile";
$username_dbDescent = "descent";
$password_dbDescent = "CoProject2014";
$dbDescent = mysql_pconnect($hostname_dbDescent, $username_dbDescent, $password_dbDescent) or trigger_error(mysql_error(),E_USER_ERROR); 
?>