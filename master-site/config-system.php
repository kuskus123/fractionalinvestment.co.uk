<?php
    /***=================================
        ธีมทองพรีเมียม: 'theme-luxury-gold'

        ธีมเขียวมรกต: 'theme-irish-emerald'

        ธีมชมพูโรสควอตซ์: 'theme-luxury-rose'

        ธีมฟ้าหน้าปัดหรู: 'theme-royal-sky'

        ธีมน้ำเงินแซฟไฟร์: 'theme-sapphire-obsidian'

        ธีมแดงทับทิมไวน์: 'theme-ruby-crimson'
    =============================================*/
$web = [
    'site_type'     => 'news',              // 📰 เลือกประเภทหน้าblog'news','blog' 
    'theme_class'   => 'theme-luxury-rose', // 🎨 เลือกธีมสี
    'font_link'     => 'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&display=swap',
    'font_family'   => "'Cinzel', serif",
    'brand_name'    => "FAHMAI Hoding",
    
    // 🚪 ข้อความหน้า Intro & Header
    'header_logo'   => "GOLDEN CASK INTEL",
    'intro_heading' => "ACCESSING PRIVATE WHISKY INTEL",
    'intro_text'    => "ระบบคัดกรองข้อมูลคลังความรู้ทางเลือกวิสกี้ระดับโลก",
    'intro_btn'     => "ENTER TERMINAL",
    
    // 🎯 สามารถเปลี่ยนข่าวได้ว่าจะเอาจากค่ายไหน (ทำงานเฉพาะตอนสับ 'site_type' => 'news')
    'news_sources'  => ['THE SPIRITS BUSINESS'],
   
    // 🏠 ข้อความหน้าย่อยอื่นๆ 
    'home_title'    => "WHISKY LIVE NEWS",
    'home_subtitle' => "Real-time global updates gathered from elite spirits journals.",
    'guide_title'   => "CASK MATURATION INFRASTRUCTURE",
    'guide_subtitle'=> "Understanding the core phases of alternative whiskey asset distribution.",
    'faq_title'     => "PRIVATE SUPPORT FAQ",
    'faq_subtitle'  => "Frequently asked questions regarding our alternative asset terminal.", // 🎯 เติมเครื่องหมายจุลภาค (,) ตรงนี้เรียบร้อยครับ!

    // 🎫 สล็อตควบคุมเนื้อหาการ์ด 2 ใบหน้าแรก (Below Fold)
    'card1_tag'     => "ASSET MANAGEMENT",
    'card1_title'   => "Platinum Cask",
    'card1_desc'    => "Access ownership of premium single malt whisky casks still aging in Scotland's finest bonded warehouses. Secure your private liquid portfolio with complete provenance tracking.",
    'card1_btn'     => "ACQUIRE CASK —",
    'card1_url'     => "https://platinumcask.com",

    'card2_tag'     => "CORPORATE HOLDINGS",
    'card2_title'   => "Fah Mai Holdings",
    'card2_desc'    => "Engage with high-conviction alternative investments in the global spirits industry. Partner with our macro-scale maturation facilities and global distribution channels.",
    'card2_btn'     => "VIEW HOLDINGS —",
    'card2_url'     => "https://fahmaiholdings.com",
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
        "Unlike bottled spirits, a cask is a living, breathing asset that appreciates in flavor complexity and financial rarity every single year."
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

// =========================================================================
// 🔮 🌟 คลังข้อมูลบทความเขียนเองประจำโดเมน (ทำงานเฉพาะโหมด 'blog')
// เพื่อนๆ สามารถเข้ามาสลับเปลี่ยนพาธรูปภาพและเนื้อหาบทความทั้งหมดได้ที่นี่เลยกัส
// =========================================================================
$web['articles'] = [
    [
        'tag'         => "MARKET INTEL",
        'date'        => "JUNE 08, 2026",
        'image'       => "assets/images/Bghome.webp", 
        'title'       => "The Global Surge in Rare Single Malt Cask Values",
        'excerpt'     => "An analysis of why alternative whisky assets are outperforming traditional luxury markets amid macro inflation.",
        'full_content'=> "<h3>Macroeconomic Convergence</h3><p>As traditional equities face unprecedented volatility, institutional capital is quietly shifting toward physical assets with built-in scarcity. Premium single malt Scotch whisky casks represent a distinct frontier.</p>"
    ],
    [
        'tag'         => "MATURATION SCIENCE",
        'date'        => "MAY 24, 2026",
        'image'       => "assets/images/Bghome.webp", 
        'title'       => "The Chemistry of Oak: Subtraction vs Oxidation",
        'excerpt'     => "Decoding the chemical interactions inside a first-fill Bourbon barrel and how it eliminates harsh distillate elements.",
        'full_content'=> "<h3>The Purification Phase</h3><p>During the initial three years of cask confinement, the charred oak interior acts as a natural carbon filter. This process, scientifically termed Subtraction, actively bonds with and neutralizes volatile compounds.</p>"
    ],
    [
        'tag'         => "MATURATION SCIENCE",
        'date'        => "MAY 24, 2026",
        'image'       => "assets/images/Bghome.webp", 
        'title'       => "The Chemistry of Oak: Subtraction vs Oxidation",
        'excerpt'     => "Decoding the chemical interactions inside a first-fill Bourbon barrel and how it eliminates harsh distillate elements.",
        'full_content'=> "<h3>The Purification Phase</h3><p>During the initial three years of cask confinement, the charred oak interior acts as a natural carbon filter. This process, scientifically termed Subtraction, actively bonds with and neutralizes volatile compounds.</p>"
    ]
];
?>