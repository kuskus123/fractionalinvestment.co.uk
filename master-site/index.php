<?php include 'config-system.php'; ?>
<?php 
  // 🎯 ปรับให้ชื่อแท็บเบราว์เซอร์เปลี่ยนตามชื่อแบรนด์ในคอนฟิกออโต้
  $page_title = htmlspecialchars($web['brand_name']) . " | Immersive Whisky Sourcing";
  require_once __DIR__ . '/components/header.php';
?>

<?php 
  // 🛰️ INTRO BYPASS DETECTOR: ตรวจจับสัญญาณพารามิเตอร์เพื่อข้ามหน้าจอเปิดตัว
  $bypass_intro = isset($_GET['bypass']) && $_GET['bypass'] === 'true';
?>

<?php if ($bypass_intro): ?>
<script>
    document.body.classList.remove("is-intro-page");
    document.body.classList.add("homepage-unlocked");
</script>
<style>
    #introOverlay { display: none !important; }
    #darkRoomGateContent { display: none !important; }
    .concept-container { opacity: 1 !important; visibility: visible !important; }
    .homepage-real-content { display: block !important; opacity: 1 !important; transform: translateY(0) !important; }
    .luxury-nav { opacity: 1 !important; transform: translateY(0) !important; pointer-events: auto !important; }
</style>
<?php endif; ?>

<nav class="luxury-nav <?php echo $bypass_intro ? 'nav-visible' : ''; ?>" id="globalNavbar">
    <a href="index.php?bypass=true" class="nav-brand"><?php echo htmlspecialchars($web['brand_name']); ?></a>
    <ul class="nav-links">
        <li><a href="index.php?bypass=true" class="active">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="contact.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<div id="introOverlay" style="position: fixed; top:0; left:0; width:100%; height:100vh; z-index: 999; display:flex; align-items:center; justify-content:center; background-color:#060608; cursor: pointer;">
    <div class="lumen-style-branding" id="clickTrigger">
        <div class="lumen-line" id="topLine"></div>
        
        <h1 class="lumen-title" id="mainBrand">
            <?php 
            // 🚀 ENGINE SPLITTER: ดึงชื่อแบรนด์มาสับย่อยเรนเดอร์เป็นสแปนทีละตัวอักษรเพื่อทำแอนิเมชันเก๋ ๆ
            $brand_text = $web['brand_name'];
            $characters = preg_split('//u', $brand_text, -1, PREG_SPLIT_NO_EMPTY);
            
            foreach ($characters as $char) {
                echo "<span>" . htmlspecialchars($char) . "</span>";
            }
            ?>
        </h1>
        
        <div class="lumen-subtitle" id="subBrand">— Click to Explore —</div>
        <div class="lumen-line" id="bottomLine" style="margin-top: 25px;"></div>
    </div>
</div>

<div id="conceptSection" class="concept-container" style="background-image: url('assets/images/Bghome.webp');">
    
    <canvas id="particleCanvas"></canvas>

    <div class="concept-content" id="darkRoomGateContent">
        <div class="concept-tag concept-reveal">— A SPOTLIGHT —</div>
        
        <h1 class="concept-title concept-reveal">
            Silent <em>casks</em><br>
            breathe through the<br>
            night.
        </h1>
        
        <div class="concept-subtext concept-reveal">
            <p>You enter alone into a dark room.</p>
            <p>A silent maturation hidden within the oak.</p>
            <p>Let your gaze wander. Click the bright points to explore the space.</p>
        </div>
        
        <div class="concept-action concept-reveal">
            <a href="#" class="btn-concept-enter" id="btnEnterHomepage">ENTER —</a>
        </div>
    </div>

    <div class="homepage-real-content" id="trueHomepageSection">
        
        <section class="niche-showcase-block">
            <div class="niche-tag">— EXCLUSIVE ASSET SOURCING —</div>
            <h2 class="niche-main-title">Preserving Provenance,<br>Securing Liquid Gold.</h2>
            <p class="niche-description">
                We specialize in the silent acquisition and scientific maturation of ultra-rare single malt Scotch whisky casks. By bridging historical heritage with elite preservation standards, we provide private clients exclusive gateways into Scotland's most coveted distilleries.
            </p>
        </section>

       <section class="cta-twin-grid">
            
            <div class="luxury-gate-card">
                <div>
                    <div class="card-gate-tag"><?php echo htmlspecialchars($web['card1_tag']); ?></div>
                    <h3 class="card-gate-title"><?php echo htmlspecialchars($web['card1_title']); ?></h3>
                    <p class="card-gate-desc">
                        <?php echo htmlspecialchars($web['card1_desc']); ?>
                    </p>
                </div>
                <a href="<?php echo htmlspecialchars($web['card1_url']); ?>" target="_blank" class="btn-gate-link"><?php echo htmlspecialchars($web['card1_btn']); ?></a>
            </div>

            <div class="luxury-gate-card">
                <div>
                    <div class="card-gate-tag"><?php echo htmlspecialchars($web['card2_tag']); ?></div>
                    <h3 class="card-gate-title"><?php echo htmlspecialchars($web['card2_title']); ?></h3>
                    <p class="card-gate-desc">
                        <?php echo htmlspecialchars($web['card2_desc']); ?>
                    </p>
                </div>
                <a href="<?php echo htmlspecialchars($web['card2_url']); ?>" target="_blank" class="btn-gate-link"><?php echo htmlspecialchars($web['card2_btn']); ?></a>
            </div>

        </section>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const mainOverlay = document.getElementById("introOverlay");
    const coreTrigger = document.getElementById("clickTrigger");

    if (mainOverlay && coreTrigger) {
        mainOverlay.addEventListener("click", function(event) {
            if (event.target !== coreTrigger && !coreTrigger.contains(event.target)) {
                coreTrigger.click();
            }
        });
    }

    <?php if ($bypass_intro): ?>
    /* 🎯 จุดระเบิดวิศวกรรมฝุ่นแปรผันตรง: สั่งระบบฝุ่นทำงานทันทีตั้งแต่หน้าเว็บถูกข้ามเข้ามา */
    if (typeof initGoldenDust === "function") {
        initGoldenDust();
    }
    <?php endif; ?>
});
</script>

<?php require_once __DIR__ . '/components/footer.php'; ?>