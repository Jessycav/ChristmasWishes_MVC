<?php
ob_start(); //Stocke les informations temporairement


require_once __DIR__ . '/../config/Database.php';
$sql = "SELECT DATABASE()";
$result = connect()->query(sql);
$row = $result->fetch_assoc();
echo"Base de données actuelle : " . $row["DATABASE()"];

$content = ob_get_clean(); // Renvoie les informations stokées et vide le stockage
require_once __DIR__ . '/../components/layout.php';
?>