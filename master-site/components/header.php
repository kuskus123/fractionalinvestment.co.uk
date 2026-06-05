<?php 
// 🛰️ SATELLITE CORE AUTOMATION
// บังคับให้โหลดไฟล์คอนฟิกตัวจริงขึ้นมาเสมอ ไม่ว่าจะโดนเรียกใช้งานจากหน้าไหน
require_once dirname(__DIR__) . '/config-system.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo htmlspecialchars($web['home_title']); ?></title>
    
    <link href="<?php echo $web['font_link']; ?>" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <style>:root { --site-font: <?php echo $web['font_family']; ?>; }</style>
</head>

<body class="<?php echo $web['theme_class']; ?> is-intro-page">