<?php include 'config-system.php'; ?>
<?php 
  // 🎯 ดึงชื่อแบรนด์จากคอนฟิกมาสับเปลี่ยนชื่อแท็บเบราว์เซอร์อัตโนมัติ
  $page_title = "Frequently Asked Questions | " . htmlspecialchars($web['brand_name']);
  require_once __DIR__ . '/components/header.php';
?>

<script>document.body.classList.add("normal-page");</script>

<!-- 🧭 แถบเมนูนำทาง (พ่วง ?bypass=true ที่ปุ่ม HOME เรียบร้อยครับกัส) -->
<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php?bypass=true" class="nav-brand"><?php echo htmlspecialchars($web['brand_name']); ?></a>
    <ul class="nav-links">
        <li><a href="index.php?bypass=true">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php" class="active">FAQ</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="contact.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<main class="luxury-faq-wrapper">
    <header class="faq-hero">
        <div class="faq-meta">INFORMATION — SECURITY</div>
        <h1 class="faq-main-title">General Inquiries</h1>
        <p class="faq-lead-in">
            Explore the operational parameters, verification protocols, and structural security safeguarding our private registry ecosystem.
        </p>
        <div class="faq-divider"></div>
    </header>

    <section class="faq-accordion-container">
        
        <!-- ❓ คำถามที่ 1 -->
        <div class="luxury-accordion-item">
            <button class="luxury-accordion-trigger">
                <span>WHAT IS THE BESPOKE PRIVATE REGISTRY?</span>
                <span class="accordion-icon"></span>
            </button>
            <div class="luxury-accordion-content">
                <div class="inner-content">
                    <p>
                        Our private registry acts as an institutional ledger tracking ownership, provenance, and volumetric data for rare single malt casks. It ensures absolute discretion and mathematical precision for international asset management.
                    </p>
                </div>
            </div>
        </div>

        <!-- ❓ คำถามที่ 2 -->
        <div class="luxury-accordion-item">
            <button class="luxury-accordion-trigger">
                <span>HOW IS provenaNCE AND SECURITY VERIFIED?</span>
                <span class="accordion-icon"></span>
            </button>
            <div class="luxury-accordion-content">
                <div class="inner-content">
                    <p>
                        Every asset inside the vault undergoes rigorous digital double-entry verification. Backed by government-bonded warehouse receipts and independent distillers' stock sheets, your ownership is irrefutable and heavily guarded.
                    </p>
                </div>
            </div>
        </div>

        <!-- ❓ คำถามที่ 3 -->
        <div class="luxury-accordion-item">
            <button class="luxury-accordion-trigger">
                <span>CAN I TRANSFER OWNERSHIP VIA ENCRYPTED CHANNELS?</span>
                <span class="accordion-icon"></span>
            </button>
            <div class="luxury-accordion-content">
                <div class="inner-content">
                    <p>
                        Yes. Ownership restructuring, title deeds, and allocation assignments can be initiated through our private concierge office using specialized secure cryptographic validation networks.
                    </p>
                </div>
            </div>
        </div>

    </section>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const triggers = document.querySelectorAll('.luxury-accordion-trigger');
    
    triggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            // ดักจับไอเทมกล่องปัจจุบันที่กำลังโดนกด
            const currentItem = this.parentElement;
            const currentContent = currentItem.querySelector('.luxury-accordion-content');
            const isActive = currentItem.classList.contains('active');
            
            // 🎯 ท่าไม้ตายเคลียร์แผง: สั่งหุบกล่องคำถามข้ออื่นทั้งหมดก่อนเปิดข้อใหม่ (คลีนสายตามาก)
            document.querySelectorAll('.luxury-accordion-item').forEach(item => {
                if(item !== currentItem) {
                    item.classList.remove('active');
                    gsap.to(item.querySelector('.luxury-accordion-content'), { height: 0, duration: 0.4, ease: "power2.out" });
                }
            });
            
            // สลับสถานะกล่องปัจจุบันด้วยตัวแปรเฉพาะข้อตัวใครตัวมัน ไม่หว่านแหแล้วน้า
            if (!isActive) {
                currentItem.classList.add('active');
                // ใช้ GSAP คำนวณความสูงคอนเทนต์ของข้อนั้นๆ แบบ Dynamic
                gsap.set(currentContent, { height: "auto" });
                gsap.from(currentContent, { height: 0, duration: 0.4, ease: "power2.out" });
            } else {
                currentItem.classList.remove('active');
                gsap.to(currentContent, { height: 0, duration: 0.4, ease: "power2.out" });
            }
        });
    });
});
</script>

<?php require_once __DIR__ . '/components/footer.php'; ?>