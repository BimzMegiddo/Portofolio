<?php
$result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
    $input = escapeshellarg($_POST['text']); // Mengamankan input dari command injection
    
    // Memanggil file biner Rust yang sudah dikompilasi di dalam server
    $result = shell_exec("/usr/local/bin/rust_processor $input");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP x Rust Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🦀 PHP x Rust Integration</h1>
        <p>Teks di bawah ini diproses langsung oleh program kompilasi <strong>Rust</strong> melalui backend <strong>PHP</strong>.</p>
        
        <form action="index.php" method="POST">
            <input type="text" name="text" placeholder="Ketik sesuatu..." required>
            <button type="submit">Proses pake Rust</button>
        </form>

        <?php if ($result): ?>
            <div class="result-box">
                <h3>Hasil Olahan Rust:</h3>
                <p><strong><?= htmlspecialchars($result); ?></strong></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
