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
    
    // 🎯 🛠️ จุดแก้เปิดสวิตช์อิสระ: เปลี่ยนชื่อแบรนด์เปิดตัวเว็บและ Navbar ตรงนี้ได้เลย (เช่น FAHMAI, WHISKYONE, หรือภาษาไทย)
    'brand_name'    => "FAHMAI", 
    
    // 🚪 ข้อความหน้า Intro & Header
    'header_logo'   => "GOLDEN CASK INTEL",
    'intro_heading' => "ACCESSING PRIVATE WHISKY INTEL",
    'intro_text'    => "ระบบคัดกรองข้อมูลคลังความรู้ทางเลือกวิสกี้ระดับโลก",
    'intro_btn'     => "ENTER TERMINAL",
    
    // 🏠 ข้อความหน้าย่อยอื่นๆ 
    'home_title'    => "WHISKY LIVE NEWS",
    'home_subtitle' => "Real-time global updates gathered from elite spirits journals.",
    'guide_title'   => "CASK MATURATION INFRASTRUCTURE",
    'guide_subtitle'=> "Understanding the core phases of alternative whiskey asset distribution.",
    'faq_title'     => "PRIVATE SUPPORT FAQ",
    'faq_subtitle'  => "Frequently asked questions regarding our alternative asset terminal."
];

// =========================================================================
// 🗂️ 🌟 ชุดข้อมูลคำถาม-คำตอบ (FAQ Items) สำหรับหน้า faq.php
// เพื่อนสามารถเพิ่ม [คำถาม/คำตอบ] ชุดที่ 4, 5, 6 ต่อท้ายลงมาในนี้ได้เลยออโต้
// =========================================================================
$web['faq_items'] = [
    [
        'question' => "What is the minimum holding period for a whisky cask?",
        'answer'   => "While there is no legal minimum holding period, premium single malt Scotch whisky casks typically achieve optimal chemical maturation and market value appreciation between 5 to 15 years."
    ],
    [
        'question' => "How is the ownership of the cask legally formalized?",
        'answer'   => "Ownership is legally transferred and formalized via a Delivery Order (DO) issued directly by the HMRC-regulated bonded warehouse in Scotland, ensuring an unbroken chain of custody."
    ],
    [
        'question' => "What insurance coverage is provided for the physical asset?",
        'answer'   => "All casks stored in our partner bonded facilities are fully insured at market replacement value against fire, theft, and accidental damage, managed under specialized institutional underwriters."
    ]
];
?>