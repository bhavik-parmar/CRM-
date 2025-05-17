<?php
require __DIR__ . '/vendor/autoload.php';  // Adjust path if needed

use PhpOffice\PhpSpreadsheet\IOFactory;

include 'dbconn.php';

if (isset($_FILES['excel_file']['tmp_name'])) {
    $file = $_FILES['excel_file']['tmp_name'];

    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    for ($i = 1; $i < count($rows); $i++) {
        $row = $rows[$i];

        $name    = trim($row[0]);
        $phone   = trim($row[1]);
        $email   = trim($row[2]);
        $company = trim($row[3]);
        $source  = trim($row[4]);

        if ($name && $phone) {
            $stmt = $conn->prepare("INSERT INTO leads (name, phone, email, company, source) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $phone, $email, $company, $source);
            $stmt->execute();
        }
    }

    echo "<script>alert('Excel imported successfully.'); window.location.href='index.php';</script>";
}
?>
