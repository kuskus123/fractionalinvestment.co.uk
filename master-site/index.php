<?php 
  $page_title = "FAHMAI | Premium Alternative Asset";
  require_once __DIR__ . '/components/header.php';
?>

<!-- ดึงแถบเมนูขึ้นมาแสดงผลด้านบน -->
<?php require_once __DIR__ . '/components/navbar.php'; ?>

<div class="horizontal-wrapper">
    <div class="horizontal-container">

        <!-- เซกชันที่ 1: หน้าเปิดตัว FAHMAI สไตล์ตามรูปเรฟเป๊ะๆ -->
        <section id="home" class="horiz-section">
            <div class="container text-center">
                <div class="lumen-style-branding">
                    <h1 class="lumen-title">fahmai</h1>
                    <div class="lumen-subtitle">— Satellite Platform —</div>
                </div>
            </div>
        </section>

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

        <!-- เซกชันที่ 4: บล็อกข้อมูลการลงทุน -->
        <section id="blog" class="horiz-section" style="background-color: #0b0b0e; width: 120vw;"> <!-- ขยายหน้าจอนี้กว้างขึ้นเล็กน้อยเพื่อความไม่แออัด -->
            <div class="container">
                <h2 class="fw-bold mb-5 text-uppercase" style="font-family: 'Cinzel', serif; letter-spacing: 4px; color: var(--primary-gold);">Latest Insights</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card text-white h-100 border-0 shadow premium-card">
                            <div class="card-body py-4">
                                <span class="badge bg-warning text-dark mb-3">Market Trends</span>
                                <h5 class="fw-bold text-white mb-3">Why Whisky Outperforms</h5>
                                <p class="text-muted small">บทวิเคราะห์เปรียบเทียบผลตอบแทนสินทรัพย์ทางเลือกกับตลาดทุนดั้งเดิม</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white h-100 border-0 shadow premium-card">
                            <div class="card-body py-4">
                                <span class="badge bg-warning text-dark mb-3">Cask Science</span>
                                <h5 class="fw-bold text-white mb-3">Oak & Oxidation</h5>
                                <p class="text-muted small">เจาะลึกวิทยาศาสตร์เบื้องหลังการทำปฏิกิริยาของเนื้อไม้โอ๊คในคลังบ่มสกอตแลนด์</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white h-100 border-0 shadow premium-card">
                            <div class="card-body py-4">
                                <span class="badge bg-warning text-dark mb-3">Security</span>
                                <h5 class="fw-bold text-white mb-3">Storage & Insurance</h5>
                                <p class="text-muted small">ระบบรักษาความปลอดภัยและการรับประกันภัยในมูลค่าสินทรัพย์เต็มวงเงิน</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- เซกชันที่ 5: ติดต่อองค์กร -->
        <section id="contact" class="horiz-section" style="background-color: #060608;">
            <div class="container text-center">
                <h2 class="fw-bold mb-4 text-uppercase" style="font-family: 'Cinzel', serif; letter-spacing: 4px;">Connect With Us</h2>
                <p class="opacity-50">Fahmai Holdings Group &mdash; Satellite Investment Network</p>
            </div>
        </section>

    </div>
</div>

<?php require_once __DIR__ . '/components/footer.php'; ?>