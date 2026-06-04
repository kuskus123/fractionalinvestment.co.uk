<?php 
  $page_title = "Frequently Asked Questions | FAHMAI";
  require_once __DIR__ . '/components/header.php';
?>

<script>document.body.className = "normal-page";</script>

<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php" class="nav-brand">FAHMAI</a>
    <ul class="nav-links">
        <li><a href="index.php">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php" class="active">FAQ</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="contact.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<main class="luxury-faq-wrapper">
    <header class="faq-hero">
        <div class="faq-meta">INVESTOR CONCIERGE — FAQ</div>
        <h1 class="faq-main-title">Frequently Asked Questions</h1>
        <p class="faq-lead-in">
            Clear, institutional insights regarding legal ownership, storage protocols, and financial mechanics of rare whisky casks.
        </p>
        <div class="faq-divider"></div>
    </header>

    <section class="faq-accordion-container">
        
        <div class="luxury-accordion-item">
            <button class="luxury-accordion-trigger" type="button">
                <span>01 / How do I legally own a whisky cask in Scotland?</span>
                <span class="accordion-icon"></span>
            </button>
            <div class="luxury-accordion-content">
                <div class="inner-content">
                    <p>
                        Legal ownership of a Scotch whisky cask requires registration within an HMRC-regulated bonded warehouse system. When you acquire a cask through our structures, ownership is secured via a formalized Delivery Order (DO) issued directly by the warehouse manager, ensuring your asset is held securely under your unique title.
                    </p>
                </div>
            </div>
        </div>

        <div class="luxury-accordion-item">
            <button class="luxury-accordion-trigger" type="button">
                <span>02 / What are the ongoing maintenance fees or storage costs?</span>
                <span class="accordion-icon"></span>
            </button>
            <div class="luxury-accordion-content">
                <div class="inner-content">
                    <p>
                        Every premium cask resides within government-bonded warehouses which charge an annual "rent and insurance" fee (typically covering climate control, periodic checks, and basic cask protection). These upkeep logistics are handled seamlessly through <em>Platinum Cask</em> or <em>Fah Mai Holdings</em>.
                    </p>
                </div>
            </div>
        </div>

        <div class="luxury-accordion-item">
            <button class="luxury-accordion-trigger" type="button">
                <span>03 / What is the "Angel's Share" and how does it impact my asset?</span>
                <span class="accordion-icon"></span>
            </button>
            <div class="luxury-accordion-content">
                <div class="inner-content">
                    <p>
                        The "Angel's Share" refers to the natural annual evaporation of roughly 1.5% to 2% of the liquid spirit through the pores of the oak wood. While the total volume decreases slightly over long maturation timelines, the absolute flavor concentration and maturity index rise exponentially, creating a rarer and more valuable liquid asset.
                    </p>
                </div>
            </div>
        </div>

    </section>
</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const triggers = document.querySelectorAll(".luxury-accordion-trigger");
    
    triggers.forEach(trigger => {
        trigger.addEventListener("click", function() {
            const item = this.parentElement;
            const content = item.querySelector(".luxury-accordion-content");
            const isOpen = item.classList.contains("active");
            
            // ลูปสั่งปิดตัวอื่นก่อนหน้าเพื่อให้เปิดกางออกทีละตัวอย่างมีระดับ ไม่รบกวนเลย์เอาต์หลัก
            document.querySelectorAll(".luxury-accordion-item").forEach(el => {
                el.classList.remove("active");
                const c = el.querySelector(".luxury-accordion-content");
                gsap.to(c, { height: 0, duration: 0.4, ease: "power2.out" });
            });
            
            // จังหวะสั่งเปิดตัวที่ถูกคลิก
            if (!isOpen) {
                item.classList.add("active");
                gsap.set(content, { height: "auto" }); // เช็กค่าความสูงที่แท้จริงตามคอนเทนต์ด้านใน
                const targetHeight = content.offsetHeight;
                
                // สั่งขยายความสูงจาก 0 ไปพิกัดจริงพร้อมความนุ่มนวล
                gsap.fromTo(content, 
                    { height: 0 }, 
                    { height: targetHeight, duration: 0.45, ease: "power3.out" }
                );
            }
        });
    });
});
</script>

<?php require_once __DIR__ . '/components/footer.php'; ?>