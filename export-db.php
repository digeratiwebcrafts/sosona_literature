<?php
include "includes/db-connect.php";


if ($conn->connect_errno) {
    die("Failed to connect to MySQL: " . $conn->connect_error);
}

// Get list of tables in database
$tables = array();
$result = $conn->query("SHOW TABLES");
if ($result) {
    while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }
} else {
    die("Failed to get list of tables: " . $conn->error);
}

$return = '';
foreach ($tables as $table) {
    // Drop table if it exists
    $return .= 'DROP TABLE IF EXISTS `' . $table . '`;' . "\n";

    // Create table with schema
    $result = $conn->query("SHOW CREATE TABLE `$table`");
    if ($result) {
        $row = $result->fetch_array();
        $return .= $row[1] . ';' . "\n\n";
    } else {
        die("Failed to get create table statement for $table: " . $conn->error);
    }

    // Insert rows into table
    $result = $conn->query("SELECT * FROM `$table`");
    if ($result) {
        $num_fields = $result->field_count;

        while ($row = $result->fetch_array()) {
            $return .= 'INSERT INTO `' . $table . '` VALUES (';

            for ($i = 0; $i < $num_fields; $i++) {
                $return .= "'" . $conn->real_escape_string($row[$i]) . "'";
                if ($i < $num_fields - 1) {
                    $return .= ',';
                }
            }

            $return .= ');' . "\n";
        }

        $result->free();
    } else {
        die("Failed to get rows from $table: " . $conn->error);
    }

    $return .= "\n\n\n";
}
$backupDir= 'mysql/';
$date = date('Y-m-d_H-i-s');

// Set the backup filename
$backupFile = $backupDir . $dbname . '_' . $date . '.sql'; 


$file = fopen($backupFile, 'w');
if ($file) {
fwrite($file, $return);
fclose($file);
echo "Successfully backed up to $backupFile";
} else {
die("Failed to open file $backupFile for writing");
}

// Download the backup file to the local system
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $dbName . '_' . $date . '.sql"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($backupFile));
ob_clean();
flush();
readfile($backupFile);
exit;

// Close database connection
$conn->close();



?>