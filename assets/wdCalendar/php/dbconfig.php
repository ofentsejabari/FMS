<?php
class DBConnection{
	function getConnection(){
	  //change to your database server/user name/password
		mysql_connect("127.0.0.1","root","") or
         die("Could not connect: " . mysql_error());
    //change to your database name
		mysql_select_db("bitri_fms") or 
		     die("Could not select database: " . mysql_error());
	}
}
?>