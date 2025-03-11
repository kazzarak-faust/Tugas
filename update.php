<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$student) {
        die("Mahasiswa tidak ditemukan!");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $major = $_POST['major'];

    $stmt = $pdo->prepare("UPDATE students SET name = :name, nim = :nim, major = :major WHERE id = :id");
    $stmt->execute(['name' => $name, 'nim' => $nim, 'major' => $major, 'id' => $id]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Mahasiswa</h2>
        <form method="POST" action="update.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" value="<?= htmlspecialchars($student['nim']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jurusan</label>
                <input type="text" name="major" value="<?= htmlspecialchars($student['major']) ?>" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>
