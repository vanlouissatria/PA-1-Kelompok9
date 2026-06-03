<?php
$html = file_get_contents('http://127.0.0.1:8000/kontak');

// Cari posisi card detail
$cardPos = stripos($html, 'class="kontak-details"');
if ($cardPos !== false) {
    // Cetak 3000 karakter dari area detail
    echo "=== DETAIL AREA ===\n";
    echo substr($html, $cardPos, 3000);
    echo "\n\n";
}

// Cari media sosial fields
$fields = ['<strong>.*?Facebook', '<strong>.*?Twitter', '<strong>.*?YouTube', '<strong>.*?TikTok'];
foreach ($fields as $pattern) {
    if (preg_match('/'.$pattern.'/i', $html, $matches)) {
        echo "✓ Found: " . $matches[0] . "\n";
    } else {
        echo "✗ Not found: $pattern\n";
    }
}
?>
