<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ดึงค่า Dynamic Meta จากหน้าหลักมาแสดงผลเพื่อ SEO -->
    <title><?php echo isset($page_title) ? $page_title : "Whisky Cask Investment"; ?></title>
    <meta name="description" content="<?php echo isset($meta_desc) ? $meta_desc : "Alternative Asset Investment"; ?>">
    
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ลิงก์ไฟล์ CSS ส่วนตัว (ถ้ามี) -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>