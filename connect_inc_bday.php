<?php
 $dbHost = "localhost";
 $dbUser = "web122";
 $dbPass = "silvio";
 $dbName="geburtstag_".$username;
 //$dbName = "geburtstag";
 $connect = @mysql_connect($dbHost, $dbUser, $dbPass);
 $query=@mysql_query("USE usr_web122_1");
 $selectDB = @mysql_select_db($dbName, $connect);
?>