<?php
 // determine protocol - needed if you run http and https
if(isset($_SERVER['HTTPS'])) { $protocol = 'https://'; }
else {$protocol = 'http://'; }

// set protocol and host
$root = $protocol . $_SERVER['HTTP_HOST'];

// $_SERVER['SCRIPT_NAME'] is /subdirs/index.php, basename($_SERVER['SCRIPT_NAME'] is index.php -> replace to get subdirs and append to root
$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']);


ini_set('display_errors', '0');
$uploadDir = $root; # the link for the plugin,add slash after
$dbHost = 'localhost';
$dbName = 'nordic_club';
$dbUser = 'root';
$dbPass = '';

$db = new PDO('mysql:host='.$dbHost.';dbname='.$dbName.';charset=utf8',$dbUser, $dbPass);
$db->query("
			CREATE TABLE IF NOT EXISTS `w3bdeveloper_media` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `type` varchar(255) NOT NULL,
			  `path` text NOT NULL,
			  `thumbnailPath` text NOT NULL,
			  `fileName` text NOT NULL,
			  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;");

?>