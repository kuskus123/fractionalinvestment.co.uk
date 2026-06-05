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