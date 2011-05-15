<?php
include "init.php";
if(!isset($_SESSION['sessUserId']))//User authentication
{
 header("Location: login.php");
 exit();
}

$dbhost = $conn->host;
$dbname = $conn->dbname;
$dbuser = $conn->uname;
$dbpass = $conn->psw;
$site = $_SERVER['HTTP_HOST'];

$sqlBackupFile = $dbname ."_". date("Y-m-d") . '.sql.gz';
$webBackupFilename = $site."_backup_".date("Y-m-d-H-i-s").".zip";
//print_r($_SESSION);
$backupDir = "website_backup";

$sqlBackupFile_path = $backupDir."/".$sqlBackupFile;
$webBackupFilename_path = $backupDir."/".$webBackupFilename;

if(!isset($_SESSION['downloadTime'])) $_SESSION['downloadTime']=time();

if(isset($_GET['download'])) 
{
	echo "<meta http-equiv='refresh' content='3; url=?$_GET[download]'>";
	echo "<h3>Your $_GET[download] backup download will begin automatically...</h3><small><a href='?$_GET[download]'>Direct Link</a></small>";
}
else 
{
	if(file_exists("$backupDir")) 
	{
		if(isset($_GET['database'])) {
			$mime = "application/x-gzip";
			header( "Content-Type: " . $mime );
			header( 'Content-Disposition: attachment; filename="'.$sqlBackupFile.'"' ); 
			$command = "mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname | gzip -9";
			passthru($command);
			exit;
		}
		
		if($_SESSION['downloadTime'] < time())
		{		
			if(isset($_GET['website'])) 
			{
				foreach (glob($backupDir."/*") as $filename) {
					if(basename($filename) != "index.html") @unlink($filename);
				}
				//$mime = "application/force-download";
				//$mime = "application/zip";
				//header( "Content-Type: " . $mime );
				//header( 'Content-Disposition: attachment; filename="'.$webBackupFilename.'"' ); 
				$command = "mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname | gzip -9 > ". $sqlBackupFile_path;
				exec($command);
				$currentDir = dirname(__FILE__);
				//$currentPath = explode("admin",$currentDir);
				$currentPath = str_replace(end(explode("/",$currentDir)),"",$currentDir);
				$command = "zip -r '".$webBackupFilename_path."' '".$currentPath."'";
				exec($command);
				//header('Content-Length: ' . filesize($webBackupFilename_path));
				
				$_SESSION['downloadTime'] =  time() + 300;
				$_SESSION['backup_file'] = $webBackupFilename_path;
				
				header("location: ". $webBackupFilename_path);
				//readfile($webBackupFilename_path);
				exit;
			}
		}
		elseif(!empty($_SESSION['backup_file']))
		{	
			header("location: ".$_SESSION['backup_file']);
			exit;
		}
	}
	else
	{
		$err = "<h3>$backupDir directory doesnt exists..</h3>";
	}
}

if(!empty($err)) {
	echo $err;
}
?>