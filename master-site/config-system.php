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
// 📖 🌟 ยัดเนื้อหาบทความแบบยาวของหน้า Guide เข้าสล็อตแปรผันตรงนี้เลยครับกัส
// =========================================================================
$web['guide_body_content'] = <<<HTML
<article class="article-body-content">
    <h2>TEST</h2>
    
    <p class="has-drop-cap">
        Whisky cask investment is fundamentally different from traditional equities or bottled spirits. Unlike bottled whisky, which ceases to mature once sealed in glass, whisky remaining inside the original oak cask actively interacts with its environment, developing complexity, color, and depth over decades. This natural chemical evolution forms the baseline of its financial appreciation.
    </p>
    <p>
        As the distillate breathes through the wood, a portion evaporates annually—a phenomenon known as the "Angel's Share." While volume decreases slightly, the concentration of rare flavors increases, driving up the market value of the remaining liquid asset.
    </p>

    <blockquote class="luxury-pull-quote">
        "Unlike bottled spirits, a cask is a living, breathing asset that actively appreciates in flavor complexity and financial rarity every single year."
        <span>— Institutional Maturation Insights</span>
    </blockquote>

    <h2>2. Understanding Risk Factors and Provenance</h2>
    <p>
        In the alternative asset ecosystem, authenticity is the absolute bedrock of value. When acquiring a single malt cask, an investor must secure a definitive chain of custody, formalized through a delivery order at a government-bonded warehouse in Scotland. Without verified provenance, a cask holds zero institutional value.
    </p>
    
    <h3>2.1 The Role of Bonded Warehouses</h3>
    <p>
        All premium Scotch whisky casks must legally reside in HMRC-regulated bonded facilities. These environments are strictly climate-controlled to ensure an optimal balance between subtraction (the removal of harsh sulfur compounds) and oxidation (the development of rich ester profiles).
    </p>

    <h2>3. Exit Strategies for Private Portfolios</h2>
    <p>
        A sophisticated investor never enters a position without a clear exit architecture. Whisky casks offer multiple high-liquidity channels for realization: direct auction to luxury collectors, private sales to independent bottlers seeking rare components, or corporate buy-backs by major holding structures like <em>Fah Mai Holdings</em> or <em>Platinum Cask</em>.
    </p>
</article>
HTML;
// =========================================================================
// 🗂️ 🌟 ชุดข้อมูลคำถาม-คำตอบ (FAQ Items) เวอร์ชันหรูหราดึงเข้าลูปอัตโนมัติ
// =========================================================================
$web['faq_items'] = [
    [
        'question' => "test",
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