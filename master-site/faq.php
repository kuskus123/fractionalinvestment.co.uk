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
    <span class="faq-meta" style="letter-spacing: 3px; font-size: 0.8rem; color: var(--primary-color);">SUPPORT CENTER</span>
    
    <h1 class="faq-main-title" style="font-family: var(--site-font); font-size: 3rem; margin-top: 15px; margin-bottom: 15px;">
        <?php echo htmlspecialchars($web['faq_title']); ?>
    </h1>
    
    <p class="faq-lead-in" style="font-family: 'Georgia', serif; font-style: italic; color: rgba(234, 231, 223, 0.7); max-width: 650px; margin: 0 auto 60px auto;">
        <?php echo htmlspecialchars($web['faq_subtitle']); ?>
    </p>
</div>

<div class="luxury-faq-container" style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2; margin-bottom: 100px;">
    <div class="faq-accordion-group">
        
        <?php 
        // 🚀 AUTOMATION LOOP: สั่งลูปดึงคู่คำถาม-คำตอบออกมาจัดหน้าให้ออโต้
        if (isset($web['faq_items']) && is_array($web['faq_items'])) {
            foreach ($web['faq_items'] as $index => $item) { 
        ?>
            <div class="faq-card-item" style="background: var(--card-bg); border: 1px solid var(--border-color); border-radius: 3px; padding: 25px; margin-bottom: 20px; transition: all 0.3s ease;">
                
                <div class="faq-question-bar">
                    <h3 style="font-family: var(--site-font); font-size: 1.1rem; color: #eae7df; margin: 0; letter-spacing: 1px; line-height: 1.4;">
                        <span style="color: var(--primary-color); margin-right: 10px;">Q<?php echo $index + 1; ?>.</span> 
                        <?php echo htmlspecialchars($item['question']); ?>
                    </h3>
                </div>
                
                <div class="faq-answer-panel" style="margin-top: 15px; padding-top: 15px; border-top: 1px solid rgba(234, 231, 223, 0.05);">
                    <p style="font-family: 'Georgia', serif; font-style: italic; font-size: 0.95rem; color: rgba(234, 231, 223, 0.8); line-height: 1.8; margin: 0;">
                        <?php echo htmlspecialchars($item['answer']); ?>
                    </p>
                </div>

            </div>
        <?php 
            } // สิ้นสุด Foreach Loop
        } 
        ?>

    </div>
</div>

<?php 
// 🌟 ปิดท้ายด้วยการดึงฟุตเตอร์ท้ายเว็บเข้ามาประกอบร่าง
require_once __DIR__ . '/components/footer.php'; 
?>