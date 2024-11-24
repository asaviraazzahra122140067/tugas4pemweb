<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $age = intval($_POST['age']);
    $gender = htmlspecialchars(trim($_POST['gender']));
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    // File validation
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file = $_FILES['file'];
        $fileType = mime_content_type($file['tmp_name']);
        $fileSize = $file['size'] / 1024; // size in KB

        if ($fileSize > 100) {
            die("Ukuran file terlalu besar. Maksimal 100KB.");
        }
        if ($fileType != 'text/plain') {
            die("Tipe file salah. Hanya file teks yang diperbolehkan.");
        }

        // Read the file content
        $fileContent = file_get_contents($file['tmp_name']);
        $lines = explode("\n", $fileContent);
    } else {
        die("File upload gagal.");
    }

    // Save data to session for displaying in result.php
    session_start();
    $_SESSION['data'] = compact('name', 'email', 'age', 'gender', 'user_agent', 'lines');

    header('Location: result.php');
    exit;
}
