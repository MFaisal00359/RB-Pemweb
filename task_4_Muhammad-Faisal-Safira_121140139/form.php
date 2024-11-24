<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <style>
        :root {
            --primary-color: #4F46E5;
            --primary-hover: #4338CA;
            --text-color: #1F2937;
            --border-color: #E5E7EB;
            --background-color: #F9FAFB;
            --error-color: #EF4444;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background: var(--background-color);
            color: var(--text-color);
            line-height: 1.5;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 480px;
            margin: 2rem;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        form {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 
                        0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        h2 {
            color: var(--text-color);
            font-size: 1.875rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            font-weight: 500;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        input,
        textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: white;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        input::placeholder,
        textarea::placeholder {
            color: #9CA3AF;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="file"] {
            padding: 0.5rem;
            border: 2px dashed var(--border-color);
            background-color: var(--background-color);
            cursor: pointer;
        }

        input[type="file"]:hover {
            border-color: var(--primary-color);
        }

        button {
            width: 100%;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        button:active {
            transform: translateY(0);
        }

        @media (max-width: 640px) {
            .container {
                margin: 1rem;
            }

            form {
                padding: 1.5rem;
            }

            h2 {
                font-size: 1.5rem;
            }
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            background-color: var(--background-color);
            border: 2px dashed var(--border-color);
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            border-color: var(--primary-color);
            background-color: rgba(79, 70, 229, 0.05);
        }

        .file-input-icon {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="process.php" method="post" enctype="multipart/form-data" id="registrationForm">
            <h2>Form Pendaftaran</h2>
            
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            </div>

            <div class="form-group">
                <label for="age">Umur</label>
                <input type="number" id="age" name="age" placeholder="Masukkan umur Anda" required>
            </div>

            <div class="form-group">
                <label for="motivation">Motivasi atau Kutipan Favorit</label>
                <textarea id="motivation" name="motivation" rows="4" 
                    placeholder="Masukkan motivasi atau kutipan favorit Anda (minimal 5 karakter, maksimal 200 karakter)" 
                    required></textarea>
            </div>

            <div class="form-group">
                <label for="file">Upload File (teks)</label>
                <div class="file-input-wrapper">
                    <!-- Custom file input -->
                    <input type="file" id="file" name="file" accept=".txt" required style="display: none;">
                    <label for="file" class="file-input-label">
                        <svg class="file-input-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/>
                            <line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                        <span id="file-name">Pilih file teks</span>
                    </label>
                </div>
            </div>

            <button type="submit">Kirim</button>
        </form>
    </div>

    <script>
        const fileInput = document.getElementById('file');
        const fileNameLabel = document.getElementById('file-name');

        // Menampilkan nama file ketika file dipilih
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validasi jika file bukan .txt
                if (!file.name.endsWith('.txt')) {
                    alert('Hanya file .txt yang diizinkan.');
                    fileInput.value = ''; // Reset input
                    fileNameLabel.textContent = 'Pilih file teks';
                    return;
                }

                // Menampilkan nama file jika valid
                fileNameLabel.textContent = file.name;
            } else {
                fileNameLabel.textContent = 'Pilih file teks';
            }
        });
    </script>
</body>
</html>