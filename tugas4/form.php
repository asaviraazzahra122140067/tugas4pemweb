<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffeef3; /* Pastel pink background */
            color: #4a4a4a;
            margin: 20px;
        }
        form {
            background-color: #fff0f5; /* Light pastel pink */
            border: 1px solid #ffd6e8; /* Soft pink border */
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #d35d90; /* Bold pastel pink */
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #8b4b66; /* Muted pink text */
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ffd6e8; /* Soft pink border */
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #fff; /* White input background */
            font-size: 14px;
        }
        input:focus, select:focus {
            border-color: #f9b4cc; /* Highlight pastel pink */
            outline: none;
        }
        button {
            background-color: #ff8bb3; /* Soft pink button */
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #e9779d; /* Darker pink hover */
        }
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
    <h1>Form Pendaftaran</h1>
    <form action="process.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="age">Usia:</label>
        <input type="number" id="age" name="age" min="1" required>
        
        <label for="file">Upload File (teks):</label>
        <input type="file" id="file" name="file" accept=".txt" required>
        
        <label for="gender">Jenis Kelamin:</label>
        <select id="gender" name="gender" required>
            <option value="">Pilih</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <button type="submit">Submit</button>
    </form>

    <script>
        function validateForm() {
            const file = document.getElementById("file").files[0];
            if (file) {
                const fileSize = file.size / 1024; // size in KB
                const fileType = file.type;

                if (fileSize > 100) {
                    alert("Ukuran file tidak boleh lebih dari 100KB");
                    return false;
                }

                if (!fileType.includes("text")) {
                    alert("Hanya file teks yang diperbolehkan!");
                    return false;
                }
            }
            return true;
        }
    </script>
</body>
</html>
