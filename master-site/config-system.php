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
    'home_title'    => "FahmaiHoldings",
    'home_subtitle' => "Real-time global updates gathered from elite spirits journals.",
    'guide_title'   => "CASK MATURATION INFRASTRUCTURE",
    'guide_subtitle'=> "Understanding the core phases of alternative whiskey asset distribution.",
    'faq_title'     => "PRIVATE SUPPORT FAQ",
    'faq_subtitle'  => "Frequently asked questions regarding our alternative asset terminal.", 

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
// 📖 🌟 ยัดเนื้อหาบทความแบบยาวของหน้า Guide เข้าสล็อตแปรผันตรงนี้เลยใส่เป็นHTML
// =========================================================================
$web['guide_body_content'] = "<h2>1. THE ARCHITECTURE OF LIQUID WEALTH</h2>
        <p class='theme-drop-cap'>Whisky cask investment represents a distinct frontier in alternative asset management, fundamentally separated from traditional equities or commercial bottled spirits. While a standard bottle ceases its chemical transformation the moment the cork is sealed, a rare single malt remaining within its original oak cask behaves as a living, breathing ecosystem, interacting with the atmosphere to forge depth, color, and irreplaceable character over vertical decades.</p>
        
        <p>This natural molecular evolution forms the absolute baseline of its financial appreciation. As the pristine distillate respires through the porous wood, a highly calculated percentage evaporates into the heavens annually—a mystical yet scientifically rigorous phenomenon documented globally as the <span class='theme-text'>\"Angel's Share.\"</span></p>

        <blockquote class='theme-quote'>
            \"Unlike traditional markets tethered to digital algorithms, a cask matures in physical isolation, compounding its flavor complexity and financial rarity every single winter.\"
            <span>— Institutional Maturation Insights</span>
        </blockquote>

        <h2>2. THE CHEMISTRY OF OAK: SUBTRACTION & OXIDATION</h2>
        <p>In our elite sourcing ecosystem, understanding the chemical parameters of maturation is paramount to securing high-conviction portfolios. The interaction between the spirit and the wood occurs in two structural phases that define the historical provenance of the asset.</p>
        
        <h3>2.1 The Purification Threshold</h3>
        <p>During the critical first phase of confinement, the heavy char on the interior of a first-fill Bourbon barrel or European Sherry butt acts as an organic carbon filter. This process, known as <strong>Subtraction</strong>, actively bonds with and neutralizes volatile sulfur compounds, stripping away the harshness of the raw spirit.</p>
        
        <h3>2.2 The Oxidative Enrichment</h3>
        <p>Once purification is complete, the secondary phase of <em>Oxidation</em> takes over. Ambient oxygen entering through the staves triggers a complex esterification process, synthesizing deep notes of rich vanilla, dark stone fruits, and structural tannins that cannot be replicated through artificial acceleration.</p>

        <h2>3. RISK MITIGATION & THE BEDROCK OF PROVENANCE</h2>
        <p>In the alternative asset class, physical security and unassailable title deeds are the ultimate guardians of value. Every rare cask secured through our private registry must legally reside within an HMRC-regulated bonded facility in Scotland, backed by an unbroken chain of delivery orders.</p>

        <blockquote class='theme-quote'>
            \"True luxury is not merely owned; it is mathematically verified and historically documented beyond dispute.\"
            <span>— Secure Ledger Verification Protocols</span>
        </blockquote>

        <h2>4. STRATEGIC EXIT ARCHITECTURE</h2>
        <p>A sophisticated asset management strategy never initiates a position without a clearly defined liquidity gateway. Premium single malt casks offer three distinct and highly lucrative exit channels for private collectors: direct acquisition by luxury independent bottlers, physical sales at international elite auctions, or structured buy-backs directly into major corporate holding portfolios.</p>"; 

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