<?php
header('Content-Type: application/json');

$filename = "promo_codes.txt"; // 確保這個文件在伺服器上的正確路徑

if (!file_exists($filename)) {
    echo json_encode(['error' => '優惠碼文件不存在。']);
    exit;
}

$lines = file($filename, FILE_IGNORE_NEW_LINES);
$foundCode = false;

foreach ($lines as $key => $line) {
    if (!str_contains($line, '~')) {
        $foundCode = true;
        $lines[$key] = $line . '~'; // 標記為已使用
        file_put_contents($filename, implode("\n", $lines)); // 更新文件
        echo json_encode(['promoCode' => $line]);
        break;
    }
}

if (!$foundCode) {
    echo json_encode(['message' => '所有的 Promo codes 都已領取完畢。']);
}
?>
