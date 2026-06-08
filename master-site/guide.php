<?php 
// 🌟 บรรทัดที่ 1: ดึงระบบตั้งค่าสัญญากลางและหัวเว็บเข้ามาเตรียมพร้อม (เรียกแค่อย่างละรอบพอครับ)
require_once __DIR__ . '/config-system.php';
require_once __DIR__ . '/components/header.php';
?>
<script>document.body.classList.add("normal-page");</script>

<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php" class="nav-brand"><?php echo htmlspecialchars($web['header_logo']); ?></a>
    <ul class="nav-links">
        <li><a href="index.php?bypass=true">HOME</a></li>
        <li><a href="guide.php" class="active">GUIDE</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="contact.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<div class="guide-hero-section" style="margin-top: 150px; text-align: center; padding: 0 20px;">
    <span class="guide-meta" style="letter-spacing: 3px; font-size: 0.8rem; color: var(--primary-color);">INVESTMENT KNOWLEDGE</span>
    
    <h1 class="guide-main-title" style="font-family: var(--site-font); font-size: 3rem; margin-top: 15px; margin-bottom: 15px;">
        <?php echo htmlspecialchars($web['guide_title']); ?>
    </h1>
    
    <p class="guide-lead-in" style="font-family: 'Georgia', serif; font-style: italic; color: rgba(234, 231, 223, 0.7); max-width: 650px; margin: 0 auto 60px auto;">
        <?php echo htmlspecialchars($web['guide_subtitle']); ?>
    </p>
</div>

<div class="luxury-guide-container" style="max-width: 800px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 2;">
    
    <?php echo $web['guide_body_content']; ?>

</div>

<?php 
// 🌟 ปิดท้ายด้วยการดึงฟุตเตอร์ท้ายเว็บเข้ามาประกอบร่าง
require_once __DIR__ . '/components/footer.php'; 
?>