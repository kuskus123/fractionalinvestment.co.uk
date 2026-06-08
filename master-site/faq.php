<?php 
// 🌟 ดึงระบบตั้งค่าสัญญากลางและหัวเว็บเข้ามาเตรียมพร้อม
require_once __DIR__ . '/config-system.php';
require_once __DIR__ . '/components/header.php';
?>
<script>document.body.className = "normal-page";</script>

<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php" class="nav-brand"><?php echo htmlspecialchars($web['brand_name']); ?></a>
    <ul class="nav-links">
        <li><a href="index.php">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php" class="active">FAQ</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="contact.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<div class="faq-hero-section" style="margin-top: 150px; text-align: center; padding: 0 20px;">
    <span class="faq-meta" style="letter-spacing: 4px; font-size: 0.75rem; color: var(--primary-color); font-family: var(--site-font);">INVESTOR CONCIERGE — FAQ</span>
    
    <h1 class="faq-main-title" style="font-family: var(--site-font); font-size: 3.2rem; margin-top: 20px; margin-bottom: 25px; text-transform: uppercase; letter-spacing: 1px;">
        <?php echo htmlspecialchars($web['faq_title']); ?>
    </h1>
    
    <p class="faq-lead-in" style="font-family: 'Georgia', serif; font-style: italic; color: rgba(234, 231, 223, 0.65); max-width: 700px; margin: 0 auto 60px auto; line-height: 1.8; font-size: 1.05rem;">
        <?php echo htmlspecialchars($web['faq_subtitle']); ?>
    </p>
</div>

<div class="luxury-faq-container" style="max-width: 850px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2; margin-bottom: 150px;">
    <div class="faq-accordion-group">
        
        <?php 
        if (isset($web['faq_items']) && is_array($web['faq_items'])) {
            foreach ($web['faq_items'] as $index => $item) { 
                // จัดฟอร์แมตตัวเลขหลักสิบให้หรูหราแบบ 01, 02, 03 เหมือนในรูปภาพเป๊ะ
                $display_num = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
        ?>
            <div class="faq-interactive-card" style="background: rgba(15, 15, 18, 0.4); border: 1px solid rgba(234, 231, 223, 0.05); border-radius: 2px; margin-bottom: 15px; overflow: hidden; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
                
                <div class="faq-trigger-bar" style="padding: 24px 30px; display: flex; justify-content: space-between; align-items: center; cursor: pointer; user-select: none; transition: background 0.3s;">
                    <h3 style="font-family: var(--site-font); font-size: 0.95rem; color: rgba(234, 231, 223, 0.85); margin: 0; letter-spacing: 2px; line-height: 1.5; font-weight: 400;">
                        <span style="color: rgba(234, 231, 223, 0.4); margin-right: 15px; font-size: 0.9rem; font-family: 'Georgia', serif; font-style: italic;"><?php echo $display_num; ?> /</span> 
                        <?php echo htmlspecialchars($item['question']); ?>
                    </h3>
                    <span class="toggle-icon" style="font-size: 1.2rem; color: rgba(234, 231, 223, 0.4); font-weight: 300; transition: transform 0.4s; margin-left: 20px;">+</span>
                </div>
                
                <div class="faq-content-panel" style="max-height: 0; overflow: hidden; transition: max-height 0.4s cubic-bezier(0.16, 1, 0.3, 1); background: rgba(5, 5, 7, 0.3);">
                    <div style="padding: 0 30px 30px 75px;">
                        <p style="font-family: 'Georgia', serif; font-style: italic; font-size: 0.95rem; color: rgba(234, 231, 223, 0.7); line-height: 1.8; margin: 0; border-top: 1px solid rgba(234, 231, 223, 0.03); padding-top: 20px;">
                            <?php echo htmlspecialchars($item['answer']); ?>
                        </p>
                    </div>
                </div>

            </div>
        <?php 
            } 
        } 
        ?>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.faq-interactive-card');
    
    cards.forEach(card => {
        const trigger = card.querySelector('.faq-trigger-bar');
        const panel = card.querySelector('.faq-content-panel');
        const icon = card.querySelector('.toggle-icon');
        
        trigger.addEventListener('click', () => {
            const isOpen = card.classList.contains('is-open');
            
            // 🎯 ปิดกล่องข้ออื่นทั้งหมดก่อน (สไตล์โหมด Exclusive เปิดได้ทีละข้อ)
            cards.forEach(c => {
                c.classList.remove('is-open');
                c.querySelector('.faq-content-panel').style.maxHeight = null;
                c.querySelector('.toggle-icon').style.transform = 'rotate(0deg)';
                c.style.borderColor = 'rgba(234, 231, 223, 0.05)';
            });
            
            // 🎯 ถ้าข้อที่กดเมื่อกี้ยังไม่เปิด ให้กางสไลด์มันออกมา
            if (!isOpen) {
                card.classList.add('is-open');
                panel.style.maxHeight = panel.scrollHeight + "px"; // คำนวณความสูงตามจริงของบทความ
                icon.style.transform = 'rotate(45deg)'; // หมุนเครื่องหมายบวกให้กลายเป็นกากบาท/ลบเก๋ๆ
                card.style.borderColor = 'var(--primary-color)'; // ขอบเรืองแสงตามสีธีมประจำโดเมน
            }
        });
    });
});
</script>

<?php 
require_once __DIR__ . '/components/footer.php'; 
?>