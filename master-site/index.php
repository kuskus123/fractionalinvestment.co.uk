<?php 
  $page_title = "FAHMAI | Premium Alternative Asset";
  require_once __DIR__ . '/components/header.php';
?>

<!-- แทรกแถบเมนู (ซ่อนอยู่หลังบ้านตามสเปก CSS) -->
<?php require_once __DIR__ . '/components/navbar.php'; ?>

<!-- หน้าจอ Intro Splash Screen เต็มจอครอบทับไว้ก่อน -->
<div id="introOverlay" style="position: fixed; top:0; left:0; width:100%; height:100vh; z-index: 999; display:flex; align-items:center; justify-content:center;">
    <div class="lumen-style-branding" id="clickTrigger">
        <!-- เส้นสีทองตัวบน -->
        <div class="lumen-line" id="topLine"></div>
        
        <!-- ตัวอักษรแยกชิ้นคำว่า FAHMAI -->
        <h1 class="lumen-title" id="mainBrand">
            <span>f</span><span>a</span><span>h</span><span>m</span><span>a</span><span>i</span>
        </h1>
        
        <div class="lumen-subtitle" id="subBrand">— Click to Explore —</div>
        
        <!-- เส้นสีทองตัวล่าง -->
        <div class="lumen-line" id="bottomLine" style="margin-top: 25px;"></div>
    </div>
</div>

<!-- ส่วนของเนื้อหาเว็บที่จะสไลด์แนวนอน -->
<div class="horizontal-wrapper" id="siteWrapper">
    <div class="horizontal-container">
        <!-- เซกชันเปล่าหน้าแรกหลังเข้าเว็บ เพื่อให้เห็นพื้นหลังสมูท -->
        <section class="horiz-section" style="background-color: #060608;"></section>

        <!-- เซกชันที่ 2: คู่มือการลงทุน -->
        <section id="guide" class="horiz-section" style="background-color: #0f0f13;">
            <div class="container">
                <h2 class="fw-bold mb-4 text-uppercase" style="font-family: 'Cinzel', serif; letter-spacing: 4px; color: var(--primary-gold);">Investment Guide</h2>
                <p class="lead opacity-75">ขั้นตอนและโครงสร้างการลงทุนในสินทรัพย์พรีเมียม ถือครองอย่างปลอดภัยและโปร่งใส</p>
            </div>
        </section>

        <!-- เซกชันที่ 3: คำถามที่พบบ่อย -->
        <section id="faq" class="horiz-section" style="background-color: #060608;">
            <div class="container">
                <h2 class="fw-bold mb-4 text-uppercase" style="font-family: 'Cinzel', serif; letter-spacing: 4px;">FAQs</h2>
                <p class="opacity-75">ไขข้อข้องใจทุกคำถามเกี่ยวกับกองทุน ประกันภัยคลังสินค้า และสิทธิ์การถือครองถังวิสกี้</p>
            </div>
        </section>
        
        <!-- เซกชันที่ 4 และ 5 ปล่อยโครงสร้างเดิมไว้ได้เลยครับ -->
    </div>
</div>

<?php require_once __DIR__ . '/components/footer.php'; ?>