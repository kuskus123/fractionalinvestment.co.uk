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
// 🗂️ 🌟 ชุดข้อมูลคำถาม-คำตอบ (FAQ Items) เวอร์ชันหรูหราดึงเข้าลูปอัตโนมัติ
// =========================================================================
$web['faq_items'] = [
    [
        'question' => "HOW DO I LEGALLY OWN A WHISKY CASK IN SCOTLAND?",
        'answer'   => "Ownership is legally transferred and formalized via a Delivery Order (DO) issued directly by the HMRC-regulated bonded warehouse in Scotland, ensuring an unbroken chain of custody."
    ],
    [
        'question' => "WHAT ARE THE ONGOING MAINTENANCE FEES OR STORAGE COSTS?",
        'answer'   => "All premium Scotch whisky casks reside in strictly climate-controlled facilities. Maintenance fees typically cover professional warehousing, cask management, and full market-value asset insurance."
    ],
    [
        'question' => "WHAT IS THE \"ANGEL'S SHARE\" AND HOW DOES IT IMPACT MY ASSET?",
        'answer'   => "As the distillate breathes through the wood, a small portion evaporates annually. While overall liquid volume decreases slightly over time, the concentration of rare flavor compounds increases dramatically, driving up the institutional value of the remaining vintage asset."
    ]
];
?>