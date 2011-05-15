<?php
	//error_reporting(0);
	class Dbconn{
		var $host;
		var $uname;
		var $psw;
		var $dbname;
		var $links;
		var $db;

		function Dbconn(){
			$this->host = "localhost";
			$this->uname = "root";		
			$this->psw = "";			
			$this->dbname = "weblink-admin"; 
			$this->links = mysql_connect($this->host,$this->uname,$this->psw) or die("Sorry, couldnot connect to MySQL Server");
			$this->db = mysql_select_db($this->dbname,$this->links) or die("Sorry, couldnot find database");
			mysql_query("SET time_zone = '+05:45';");
			//mysql_query('SET CHARACTER SET utf8');
			//mysql_query("SET SESSION collation_connection ='utf8_general_ci'") or die (mysql_error()); 
		}
		
		function exec($sqlMain){
			//echo $sqlMain;
			//$result = mysql_query($sqlMain,$this->links) or die("You have some problem with your data");
			$result = mysql_query($sqlMain,$this->links) or die(mysql_error());
			//$result = mysql_query($sqlMain,$this->links);
			return $result;
		}
		
		function exec2($sqlMain){
			//echo $sqlMain;
			$result = @mysql_query($sqlMain,$this->links);
			return $result;
		}
		
		function numRows($result)
		{
			return mysql_num_rows($result);			
		}
		
		function affRows()
		{
			return mysql_affected_rows();			
		}
		
		function insertId()
		{
			return mysql_insert_id();
		}
		
		function fetchArray($result)
		{
			return mysql_fetch_array($result);
		}	
		
		function fetchObject($result)
		{
			return mysql_fetch_object($result);
		}	
		
		function fetchAssoc($result)
		{
			return mysql_fetch_assoc($result);
		}
		
		function commit()
		{
			return ($this -> exec("Commit"));
		}
		
		function begin()
		{
			return ($this -> exec("Begin"));
		}
		
		function rollback()
		{
			return ($this -> exec("Rollback"));
		}
		
		function Dbclose()
		{
			mysql_close($this->links);
		}			
	}	//Dbconn ends
?>