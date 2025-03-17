<?php
require '../config/Database.php';
$sql = "SELECT DATABASE() AS db_Name";
$result = $this->connect()->query($sql);
$row = $result->fetch_assoc();

echo "base de données : " . $row['db_Name'];
?> 