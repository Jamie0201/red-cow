<?php
require_once 'config.php';

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    role TEXT NOT NULL
)";

try {
    $conn->exec($sql);
    echo "Table 'users' created successfully.";
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>