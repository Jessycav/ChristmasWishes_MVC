<?php
require_once __DIR__ . '/../config/Database.php';
$sql = "SELECT DATABASE()";
$result = connect()->query(sql);
$row = $result->fetch_assoc();
echo"Base de données actuelle : " . $row["DATABASE()"];
?>