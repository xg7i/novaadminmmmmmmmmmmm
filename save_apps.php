<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dataFile = 'apps.json'; // ملف حفظ البيانات
    $apps = json_decode(file_get_contents('php://input'), true); // الحصول على البيانات من الطلب
    
    file_put_contents($dataFile, json_encode($apps)); // حفظ البيانات في ملف JSON
}
?>