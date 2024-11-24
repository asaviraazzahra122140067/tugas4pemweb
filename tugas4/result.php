<?php
session_start();
if (!isset($_SESSION['data'])) {
    die("Data tidak tersedia.");
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hasil Pendaftaran</h1>
    <table>
        <tr>
            <th>Nama</th>
            <td><?= htmlspecialchars($data['name']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($data['email']); ?></td>
        </tr>
        <tr>
            <th>Usia</th>
            <td><?= htmlspecialchars($data['age']); ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?= htmlspecialchars($data['gender']); ?></td>
        </tr>
        <tr>
            <th>Browser/Sistem Operasi</th>
            <td><?= htmlspecialchars($data['user_agent']); ?></td>
        </tr>
    </table>

    <h2>Isi File</h2>
    <table>
        <tr>
            <th>Baris</th>
            <th>Konten</th>
        </tr>
        <?php foreach ($data['lines'] as $index => $line): ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= htmlspecialchars($line); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
