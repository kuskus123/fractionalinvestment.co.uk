<!-- master-site/index_3.php -->
<?php 
  $page_title = "FAHMAI | Immersive Whisky Sourcing";
  require_once __DIR__ . '/components/header.php';
?>

<!-- 🌟 แถบเมนูนำทางหรูหรา (จะโผล่สไลด์ลงมาหลังจากกด ENTER เท่านั้น) -->
<nav class="luxury-nav" id="globalNavbar">
    <a href="index_3.php" class="nav-brand">FAHMAI</a>
    <ul class="nav-links">
        <li><a href="index_3.php" class="active">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="about.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<!-- 1. หน้า Intro Splash Screen เปิดตัวคำว่า FAHMAI -->
<div id="introOverlay" style="position: fixed; top:0; left:0; width:100%; height:100vh; z-index: 999; display:flex; align-items:center; justify-content:center; background-color:#060608;">
    <div class="lumen-style-branding" id="clickTrigger">
        <div class="lumen-line" id="topLine"></div>
        <h1 class="lumen-title" id="mainBrand">
            <span>f</span><span>a</span><span>h</span><span>m</span><span>a</span><span>i</span>
        </h1>
        <div class="lumen-subtitle" id="subBrand">— Click to Explore —</div>
        <div class="lumen-line" id="bottomLine" style="margin-top: 25px;"></div>
    </div>
</div>

<!-- 2. พื้นที่จัดระเบียบหน้าแกลเลอรีจำลองและระบบสกรอลล์โฮมเพจ -->
<div id="conceptSection" class="concept-container" style="background-image: url('assets/images/Bghome.jpg');">
    
    <!-- ผืนผ้าใบละอองฝุ่น (จะรันยาวต่อเนื่องไม่ขาดตอนสายตา) -->
    <canvas id="particleCanvas"></canvas>

    <!-- เลเยอร์ประตูด่านหน้ามืดสลัว (หน้าต่างที่กัสทำเสร็จไปล่าสุด) -->
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
            <!-- ปุ่มเปลี่ยนผ่านมิติชุบชีวิตหน้าเว็บบอร์ดของจริง -->
            <a href="#" class="btn-concept-enter" id="btnEnterHomepage">ENTER —</a>
        </div>
    </div>

    <!-- เลเยอร์ 🌟 HOMEPAGE ตัวจริงของโดเมน (จะถูกเลื่อนสวนขึ้นมาจากขอบล่างหลังกด Enter) -->
    <div class="homepage-real-content" id="trueHomepageSection">
        
        <!-- ส่วนที่ 1: บ่งบอกประกาศ Niche ความเชี่ยวชาญเฉพาะด้านประจำโดเมนเพื่อ SEO -->
        <section class="niche-showcase-block">
            <div class="niche-tag">— EXCLUSIVE ASSET SOURCING —</div>
            <h2 class="niche-main-title">Preserving Provenance,<br>Securing Liquid Gold.</h2>
            <p class="niche-description">
                We specialize in the silent acquisition and scientific maturation of ultra-rare single malt Scotch whisky casks. By bridging historical heritage with elite preservation standards, we provide private clients exclusive gateways into Scotland's most coveted distilleries.
            </p>
        </section>

        <!-- ส่วนที่ 2: บล็อกคู่ขนานส่งต่อลูกค้าเข้าเว็บเครือข่ายแม่ตามบรีฟสั่งเด็ดขาด (CTA) -->
        <section class="cta-twin-grid">
            
            <!-- การ์ดฝั่งที่ 1: วาร์ปส่งตัวไปซื้อขายถังวิสกี้ -->
            <div class="luxury-gate-card">
                <div>
                    <div class="card-gate-tag">ASSET MANAGEMENT</div>
                    <h3 class="card-gate-title">Platinum Cask</h3>
                    <p class="card-gate-desc">
                        Access ownership of premium single malt whisky casks still aging in Scotland's finest bonded warehouses. Secure your private liquid portfolio with complete provenance tracking.
                    </p>
                </div>
                <a href="https://platinumcask.com" target="_blank" class="btn-gate-link">ACQUIRE CASK —</a>
            </div>

            <!-- การ์ดฝั่งที่ 2: วาร์ปส่งตัวเข้ากองทุนร่วมโฮลดิ้ง -->
            <div class="luxury-gate-card">
                <div>
                    <div class="card-gate-tag">CORPORATE HOLDINGS</div>
                    <h3 class="card-gate-title">Fah Mai Holdings</h3>
                    <p class="card-gate-desc">
                        Engage with high-conviction alternative investments in the global spirits industry. Partner with our macro-scale maturation facilities and global distribution channels.
                    </p>
                </div>
                <a href="https://fahmaiholdings.com" target="_blank" class="btn-gate-link">VIEW HOLDINGS —</a>
            </div>

        </section>

    </div>
    
    <div class="concept-dots" id="navigationDots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>

<?php require_once __DIR__ . '/components/footer.php'; ?>