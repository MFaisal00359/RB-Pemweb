<?php
session_start();

if (!isset($_SESSION['formData'])) {
    header("Location: form.php");
    exit;
}

$data = $_SESSION['formData'];

unset($_SESSION['formData']);
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Form Pendaftaran</title>
    <style>
        :root {
            --primary-color: #4F46E5;
            --primary-light: #EEF2FF;
            --text-primary: #1F2937;
            --text-secondary: #4B5563;
            --background: #F9FAFB;
            --card-background: #FFFFFF;
            --border-color: #E5E7EB;
            --success-color: #10B981;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            line-height: 1.5;
            background-color: var(--background);
            color: var(--text-primary);
            padding: 2rem 1rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .header p {
            color: var(--text-secondary);
        }

        .card {
            background: var(--card-background);
            border-radius: 1rem;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .card-header {
            background: var(--primary-light);
            padding: 1rem 1.5rem;
            border-bottom: 1px solid var(--border-color);
        }

        .card-header h2 {
            color: var(--primary-color);
            font-size: 1.25rem;
            font-weight: 600;
        }

        .ini-card-body {
            padding: 1.5rem;
        }

        .ini-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }

        .info-value {
            font-size: 1rem;
            color: var(--text-primary);
        }

        .motivation-quote {
            position: relative;
            padding: 2rem;
            background: var(--primary-light);
            border-radius: 0.75rem;
            margin-top: 1rem;
        }

        .motivation-quote::before,
        .motivation-quote::after {
            content: '"';
            position: absolute;
            font-size: 4rem;
            color: var(--primary-color);
            opacity: 0.2;
        }

        .motivation-quote::before {
            top: 1rem;
            left: 1rem;
        }

        .motivation-quote::after {
            bottom: -1rem;
            right: 1rem;
        }

        .quote-text {
            position: relative;
            font-size: 1.125rem;
            font-style: italic;
            color: var(--text-primary);
            text-align: center;
            z-index: 1;
        }

        .file-content {
            background: var(--primary-light);
            padding: 1.5rem;
            border-radius: 0.75rem;
            font-family: 'Monaco', 'Consolas', monospace;
            white-space: pre-wrap;
            word-break: break-word;
            color: var(--text-primary);
            font-size: 0.875rem;
            line-height: 1.7;
        }

        .browser-info {
            margin-top: 1rem;
            padding: 1rem;
            background: var(--background);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        @media (max-width: 640px) {
            .container {
                padding: 1rem;
            }

            .header h1 {
                font-size: 1.5rem;
            }

            .card {
                border-radius: 0.75rem;
            }

            .ini-info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Hasil Form Pendaftaran</h1>
            <p>Terima kasih telah mengisi form pendaftaran</p>
        </header>
        <section class="card">
            <div class="card-header">
                <h2>Informasi Pribadi</h2>
            </div>
            <div class="ini-card-body">
                <div class="ini-info-grid">
                    <div class="info-item">
                        <span class="info-label">Nama</span>
                        <span class="info-value"><?= htmlspecialchars($data['name']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?= htmlspecialchars($data['email']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Umur</span>
                        <span class="info-value"><?= htmlspecialchars($data['age']) ?> tahun</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="card">
            <div class="card-header">
                <h2>Motivasi</h2>
            </div>
            <div class="ini-card-body">
                <div class="motivation-quote">
                    <p class="quote-text"><?= htmlspecialchars($data['motivation']) ?></p>
                </div>
            </div>
        </section>
        <section class="card">
            <div class="card-header">
                <h2>Konten File</h2>
            </div>
            <div class="ini-ini-card-body">
                <div class="file-content">
                    <?= htmlspecialchars($data['fileContent']) ?>
                </div>
                <div class="browser-info">
                    <strong>Browser:</strong> <?= htmlspecialchars($data['userAgent']) ?>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
