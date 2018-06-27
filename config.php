<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.
 
// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');
  
  
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "mysql",    // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	"user" => "root",    // User name
	"pass" => "",    // Password
	"host" => "127.0.0.1",    // Database server
	"port" => "3306",    // Database port (can be left empty for default)
	"db"   => "loyal_db",    // Database name
	"dsn"  => "charset=utf8mb4"     // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
);