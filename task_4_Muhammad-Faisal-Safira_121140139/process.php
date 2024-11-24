<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi server
    $errors = [];

    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $age = (int) $_POST['age'];
    $motivation = htmlspecialchars(trim($_POST['motivation']));

    if (!$email) {
        $errors[] = "Email tidak valid.";
    }

    if (strlen($motivation) < 5) {
        $errors[] = "Motivasi/kutipan harus memiliki minimal 5 karakter.";
    }

    if ($_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = mime_content_type($fileTmpPath);

        if ($fileType !== 'text/plain') {
            $errors[] = "File harus berupa teks.";
        }

        if ($fileSize > 1048576) { // Itu 1 MB
            $errors[] = "Ukuran file tidak boleh lebih dari 1 MB.";
        }

        $fileContent = file_get_contents($fileTmpPath);
    } else {
        $errors[] = "Gagal upload file.";
    }

    if (empty($errors)) {
        // Info browser sistem :)
        $userAgent = $_SERVER['HTTP_USER_AGENT'];

        // Menyimpan ke sesi
        session_start();
        $_SESSION['formData'] = [
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'motivation' => $motivation,
            'fileContent' => $fileContent,
            'userAgent' => $userAgent
        ];

        header("Location: result.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Form</title>
</head>
<body>
    <h2>Proses Gagal</h2>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="form.php">Kembali</a>
</body>
</html>
