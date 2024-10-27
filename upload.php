<?php
$uploadsDir = 'uploads/'; // مجلد رفع الملفات
$dataFile = 'apps.json'; // ملف حفظ البيانات

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appName = $_POST['appName'];
    $appDescription = $_POST['appDescription'];

    // رفع الصورة
    $imageFileName = uniqid() . '.' . strtolower(pathinfo($_FILES["appImage"]["name"], PATHINFO_EXTENSION));
    $imagePath = $uploadsDir . $imageFileName;

    if (move_uploaded_file($_FILES["appImage"]["tmp_name"], $imagePath)) {
        // رفع ملف التطبيق
        $fileFileName = uniqid() . '.' . strtolower(pathinfo($_FILES["appFile"]["name"], PATHINFO_EXTENSION));
        $filePath = $uploadsDir . $fileFileName;

        if (move_uploaded_file($_FILES["appFile"]["tmp_name"], $filePath)) {
            echo json_encode([
                'success' => true,
                'name' => $appName,
                'description' => $appDescription,
                'image' => $imagePath,
                'file' => $filePath
            ]);
            return;
        }
    }
    echo json_encode(['success' => false]);
}
?>