<?
define("HOST", "localhost");   // The host you want to connect to.
define("USER", "root"); // The database username.
define("PASSWORD", "root"); // The database password. 
define("DATABASE", "banking_system"); // The database name.
 
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// If you are connecting via TCP/IP rather than a UNIX socket remember to add the port number as a parameter.

?>