<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $major = $_POST['major'];

    try {
        $stmt = $pdo->prepare("INSERT INTO students (name, nim, major) VALUES (?, ?, ?)");
        $stmt->execute([$name, $nim, $major]);
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        die("Gagal menambah data: " . $e->getMessage());
    }
}
?>
