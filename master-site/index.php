<?php 
  // กำหนดค่า SEO สำหรับโดเมนนี้
  $page_title = "Premium Whisky Cask Investment | Alternative Asset";
  $meta_desc = "Secure your wealth in premium Scottish whisky casks. High-yield alternative investments.";

    require_once __DIR__ . '/components/header.php';
    require_once __DIR__ . '/components/navbar.php';
?>

<!-- Section 1: Home (หน้าแรก/ส่วนหัวดึงสายตา) -->
<section id="home" class="py-5 text-center bg-dark text-white">
    <div class="container py-5">
        <h1 class="display-4 fw-bold">Invest in Premium Whisky Casks</h1>
        <p class="lead text-muted">A time-tested alternative asset with consistent historical returns.</p>
    </div>
</section>

<!-- Section 2: Investment Guide (คู่มือการลงทุน) -->
<section id="guide" class="py-5 bg-light text-dark">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Whisky Cask Investment Guide</h2>
        <p class="text-center">ใส่เนื้อหาขั้นตอนการลงทุน โครงสร้างภาษี หรือขั้นตอนการถือครองถังไม้โอ๊คตรงนี้...</p>
    </div>
</section>

<!-- Section 3: FAQs (คำถามที่พบบ่อย) -->
<section id="faq" class="py-5 bg-dark text-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Frequently Asked Questions</h2>
        <p class="text-center">ใส่คำถาม-คำตอบยอดฮิต เช่น ซื้อแล้วเก็บที่ไหน? มีประกันไหม? ตรงนี้...</p>
    </div>
</section>

<!-- ส่วนของ Whisky Blog ในหน้าหลัก index.php -->
<section id="blog" class="py-5 bg-dark text-white border-top border-secondary">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-warning">Latest Whisky Insights</h2>
            <p class="text-muted">Stay updated with market trends and expert analysis.</p>
        </div>

        <div class="row g-4">
            <!-- กล่องข่าวที่ 1 -->
            <div class="col-md-4">
                <div class="card bg-secondary text-white h-100 border-0 shadow">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Market Trends</span>
                        <h5 class="card-title fw-bold">Why Whisky Casks Outperform Traditional Assets</h5>
                        <p class="card-text text-muted">ใส่เนื้อหาพรีวิวสั้นๆ 2-3 บรรทัดตรงนี้เพื่อล่อให้คนอ่าน หรือใส่ปุ่ม Pop-up เพื่อกดอ่านเนื้อหาเต็มๆ โดยไม่ต้องเปลี่ยนหน้า...</p>
                    </div>
                </div>
            </div>

            <!-- กล่องข่าวที่ 2 -->
            <div class="col-md-4">
                <div class="card bg-secondary text-white h-100 border-0 shadow">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Cask Science</span>
                        <h5 class="card-title fw-bold">The Science of Maturation: Oak & Oxidation</h5>
                        <p class="card-text text-muted">ใส่เนื้อหาเชิงลึกเกี่ยวกับกระบวนการบ่มวิสกี้ในถังไม้โอ๊คสำหรับแต่ละไซต์แยกกันตรงนี้...</p>
                    </div>
                </div>
            </div>

            <!-- กล่องข่าวที่ 3 -->
            <div class="col-md-4">
                <div class="card bg-secondary text-white h-100 border-0 shadow">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Investment Guide</span>
                        <h5 class="card-title fw-bold">How to Safely Store and Insure Your Casks</h5>
                        <p class="card-text text-muted">คำแนะนำเรื่องความปลอดภัยและการทำประกันภัยถังวิสกี้ในคลังประเทศสกอตแลนด์...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Contact Us (ช่องทางติดต่อ) -->
<section id="contact" class="py-5 bg-dark text-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Get In Touch</h2>
        <p class="text-center">ใส่ฟอร์มติดต่อเปล่าๆ หรือที่อยู่ เบอร์โทร อีเมลสำหรับติดต่อตรงนี้...</p>
    </div>
</section>

<?php 
    require_once __DIR__ . '/components/footer.php';
?>