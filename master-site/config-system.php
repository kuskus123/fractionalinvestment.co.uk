<?php
/**
 * 🛰️ LOCAL SATELLITE CONFIGURATION (เวอร์ชันสำหรับ 1 Git ต่อ 1 โดเมน)
 * เพื่อนเข้ามาแก้คำศัพท์ เลือกประเภทเว็บ และสลับธีมสีของโดเมนนี้ที่ไฟล์นี้ได้เลย
 */

$web = [
    'site_type'     => 'news',              // 📰 เลือกประเภทหน้าจอ: 'news' หรือ 'blog'
    'theme_class'   => 'theme-luxury-gold', // 🎨 เลือกธีมสี: 'theme-luxury-gold' หรือ 'theme-irish-emerald'
    'font_link'     => 'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&display=swap',
    'font_family'   => "'Cinzel', serif",
    
    // 🚪 ข้อความหน้า Intro & Header
    'header_logo'   => "GOLDEN CASK INTEL",
    'intro_heading' => "ACCESSING PRIVATE WHISKY INTEL",
    'intro_text'    => "ระบบคัดกรองข้อมูลคลังความรู้ทางเลือกวิสกี้ระดับโลก",
    'intro_btn'     => "ENTER TERMINAL",
    
    // 🏠 ข้อความหน้าย่อยอื่นๆ (กัสและเพื่อนสามารถเพิ่มคำลงมาตรงนี้ได้ตลอด)
    'home_title'    => "WHISKY LIVE NEWS",
    'home_subtitle' => "Real-time global updates gathered from elite spirits journals.",
    'guide_title'   => "CASK MATURATION INFRASTRUCTURE",
    'guide_subtitle'=> "Understanding the core phases of alternative whiskey asset distribution.",
    'faq_title'     => "PRIVATE SUPPORT FAQ",
    'faq_subtitle'  => "Frequently asked questions regarding our alternative asset terminal."
];
?>