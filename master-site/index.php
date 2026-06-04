<?php 
  $page_title = "Premium Whisky Cask Investment | Alternative Asset";
  require_once __DIR__ . '/components/header.php';
?>

<!-- หยอดแถวเนฟบาร์พรีเมียม -->
<?php require_once __DIR__ . '/components/navbar.php'; ?>

<!-- เซกชันที่ 1: หน้าแรกสไตล์ดาร์กลักชูรี -->
<section id="home" class="py-5 text-center bg-transparent text-white" data-bg="#0b0b0d" style="min-height: 90vh; display: flex; align-items: center;">
    <div class="container py-5">
        <div class="reveal-wrapper">
            <h1 class="display-4 fw-bold gsap-reveal">Invest in Premium Whisky Casks</h1>
        </div>
        <div class="reveal-wrapper">
            <p class="lead text-muted gsap-reveal">A time-tested alternative asset with consistent historical returns.</p>
        </div>
    </div>
</section>

<!-- เซกชันที่ 2: คู่มือการลงทุน ย้อมพื้นหลังเป็นสีน้ำตาลแอมเบอร์เข้มลึกแทนสีขาวทึบเดิม -->
<section id="guide" class="py-5 text-white shadow-sm" data-bg="#1a120b" style="min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
        <h2 class="text-center fw-bold mb-4 gsap-reveal">Whisky Cask Investment Guide</h2>
        <p class="text-center opacity-75 gsap-reveal">ใส่เนื้อหาขั้นตอนการลงทุน โครงสร้างภาษี หรือขั้นตอนการถือครองถังไม้โอ๊คตรงนี้...</p>
    </div>
</section>

<!-- เซกชันที่ 3: คำถามที่พบบ่อย ย้อมพื้นหลังกลับมาเป็นสีดำสนิทเพื่อเน้นมิติขอบตัด -->
<section id="faq" class="py-5 bg-transparent text-white" data-bg="#050505" style="min-height: 80vh; display: flex; align-items: center;">
    <div class="container">
        <h2 class="text-center fw-bold mb-4 gsap-reveal">Frequently Asked Questions</h2>
        <p class="text-center opacity-75 gsap-reveal">ใส่คำถาม-คำตอบยอดฮิต เช่น ซื้อแล้วเก็บที่ไหน? มีประกันไหม? ตรงนี้...</p>
    </div>
</section>

<!-- เซกชันที่ 4: บล็อกข่าวสาร พร้อมระบบการ์ดเหลื่อมความเร็ว (Parallax Effect) -->
<section id="blog" class="py-5 bg-transparent text-white border-top border-secondary" data-bg="#0b0b0d">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-warning gsap-reveal">Latest Whisky Insights</h2>
            <p class="text-muted gsap-reveal">Stay updated with market trends and expert analysis.</p>
        </div>

        <div class="row g-4">
            <!-- การ์ดใบที่ 1: ตั้งค่าให้ขยับช้าด้วยความเร็วระนาบพารัลแลกซ์ -->
            <div class="col-md-4 card-parallax" data-speed="-20">
                <div class="card text-white h-100 border-0 shadow premium-card">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Market Trends</span>
                        <h5 class="card-title fw-bold">Why Whisky Casks Outperform Traditional Assets</h5>
                        <p class="card-text text-muted">ใส่เนื้อหาพรีวิวสั้นๆ 2-3 บรรทัดตรงนี้เพื่อล่อให้คนอ่าน...</p>
                    </div>
                </div>
            </div>

            <!-- การ์ดใบที่ 2: ตั้งค่าความเร็วปกติเป็นตัวกลาง -->
            <div class="col-md-4 card-parallax" data-speed="0">
                <div class="card text-white h-100 border-0 shadow premium-card">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Cask Science</span>
                        <h5 class="card-title fw-bold">The Science of Maturation: Oak & Oxidation</h5>
                        <p class="card-text text-muted">ใส่เนื้อหาเชิงลึกเกี่ยวกับกระบวนการบ่มวิสกี้ในถังไม้โอ๊ค...</p>
                    </div>
                </div>
            </div>

            <!-- การ์ดใบที่ 3: ตั้งค่าให้พุ่งสวนขึ้นมาแรงกว่าใบอื่นเวลาเลื่อนจอ -->
            <div class="col-md-4 card-parallax" data-speed="20">
                <div class="card text-white h-100 border-0 shadow premium-card">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Investment Guide</span>
                        <h5 class="card-title fw-bold">How to Safely Store and Insure Your Casks</h5>
                        <p class="card-text text-muted">คำแนะนำเรื่องความปลอดภัยและการทำประกันภัยถังวิสกี้...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- เซกชันที่ 5: ติดต่อเรา -->
<section id="contact" class="py-5 bg-transparent text-white" data-bg="#0b0b0d" style="min-height: 60vh;">
    <div class="container">
        <h2 class="text-center fw-bold mb-4 gsap-reveal">Get In Touch</h2>
        <p class="text-center opacity-75 gsap-reveal">ใส่ฟอร์มติดต่อเปล่าๆ หรือที่อยู่ เบอร์โทร อีเมลสำหรับติดต่อตรงนี้...</p>
    </div>
</section>

<?php require_once __DIR__ . '/components/footer.php'; ?>