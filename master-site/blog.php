<!-- master-site/blog.php -->
<?php 
  $page_title = "Exclusive Market Intel & Analysis | FAHMAI";
  require_once __DIR__ . '/components/header.php';
?>

<!-- บังคับยัดคลาส normal-page เพื่อดึงรัศมีแสงสปอตไลท์เพดานและเปิดระบบสกรอลล์ -->
<script>document.body.className = "normal-page";</script>

<!-- แถบเมนูนำทาง (ไฮไลท์คำว่า BLOG เป็นสีทอง) -->
<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php" class="nav-brand">FAHMAI</a>
    <ul class="nav-links">
        <li><a href="index.php">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="blog.php" class="active">BLOG</a></li>
        <li><a href="about.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<main class="luxury-blog-wrapper">
    <header class="blog-hero">
        <div class="blog-meta">FAHMAI CAPITAL — MARKET INTEL</div>
        <h1 class="blog-main-title">Liquid Assets & Analysis</h1>
        <p class="blog-lead-in">
            Inside perspectives on the macroeconomic forces driving the global scarcity and valuation of single malt Scotch whisky.
        </p>
        <div class="blog-divider"></div>
    </header>

    <!-- 🌟 ระบบตารางการ์ดข้อมูลลับ 3 บล็อก (เพื่อนกัสสามารถมาสลับเปลี่ยนรูปภาพและข้อความตรงนี้ได้ดื้อๆ) -->
    <section class="luxury-blog-grid">
        
        <!-- การ์ดบทความที่ 1 -->
        <article class="blog-intel-card">
            <div class="card-image-area">
                <div class="blog-image-placeholder">
                    <!-- เมื่อเพื่อนกัสมีรูปจริง ให้ลบตัวหนังสือแล้วยัดแท็ก <img src="assets/images/blog1.webp" class="w-100"> ได้เลยครับ -->
                    — [ INSIGHT VISUAL 01 ] —
                </div>
            </div>
            <div class="card-content-area">
                <div class="card-meta-tags">
                    <span>MAY 28, 2026</span>
                    <span class="meta-dot"></span>
                    <span>MACRO TRENDS</span>
                </div>
                <h3 class="card-article-title">The Rising Scarcity of Aged Islay Distillates</h3>
                <p class="card-article-excerpt">
                    An analytical breakdown of why heavily-peated casks from Scotland’s southern coast are reaching historic valuation premiums.
                </p>
                <a href="#" class="btn-read-intel">READ INTEL —</a>
            </div>
        </article>

        <!-- การ์ดบทความที่ 2 -->
        <article class="blog-intel-card">
            <div class="card-image-area">
                <div class="blog-image-placeholder">
                    — [ INSIGHT VISUAL 02 ] —
                </div>
            </div>
            <div class="card-content-area">
                <div class="card-meta-tags">
                    <span>JUN 02, 2026</span>
                    <span class="meta-dot"></span>
                    <span>WOOD CHEMISTRY</span>
                </div>
                <h3 class="card-article-title">European vs American Oak: The Maturation Divide</h3>
                <p class="card-article-excerpt">
                    Examining the molecular extraction rates of Quercus robur versus Quercus alba and their long-term financial implications.
                </p>
                <a href="#" class="btn-read-intel">READ INTEL —</a>
            </div>
        </article>

        <!-- การ์ดบทความที่ 3 -->
        <article class="blog-intel-card">
            <div class="card-image-area">
                <div class="blog-image-placeholder">
                    — [ INSIGHT VISUAL 03 ] —
                </div>
            </div>
            <div class="card-content-area">
                <div class="card-meta-tags">
                    <span>JUN 04, 2026</span>
                    <span class="meta-dot"></span>
                    <span>PORTFOLIO RISK</span>
                </div>
                <h3 class="card-article-title">Hedging Global Inflation with Government Bonded Assets</h3>
                <p class="card-article-excerpt">
                    How private collectors utilize HMRC-regulated bonded storage environments to shield capital from macro-currency volatility.
                </p>
                <a href="#" class="btn-read-intel">READ INTEL —</a>
            </div>
        </article>

    </section>
</main>

<?php require_once __DIR__ . '/components/footer.php'; ?>