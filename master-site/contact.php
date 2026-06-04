<!-- master-site/contact.php -->
<?php 
  $page_title = "Bespoke Private Registry & Contact | FAHMAI";
  require_once __DIR__ . '/components/header.php';
?>

<script>document.body.className = "normal-page";</script>

<!-- แถบเมนูนำทาง (ปรับลิงก์ปลายทางเป็น contact.php และใส่คลาส active) -->
<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php" class="nav-brand">FAHMAI</a>
    <ul class="nav-links">
        <li><a href="index.php">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="blog.php">BLOG</a></li>
        <li><a href="contact.php" class="active">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<main class="luxury-about-wrapper">
    <header class="about-hero">
        <div class="about-meta">THE INSTITUTION — PROTOCOL</div>
        <h1 class="about-main-title">Bespoke Private Registry</h1>
        <p class="about-lead-in">
            To request allocation data or secure verified cask provenance, enter your credentials below. Our private concierge office will respond via encrypted channels.
        </p>
        <div class="about-divider"></div>
    </header>

    <section class="luxury-contact-container">
        <!-- ฟอร์มส่งข้อมูล (แสตนด์บายให้เพื่อนกัสมาเขียน Logic PHP รับค่า $_POST ไปใช้งานต่อ) -->
        <form action="#" method="POST" class="private-office-form">
            <div class="form-row-twin">
                <div class="luxury-form-group">
                    <input type="text" id="investor_name" name="investor_name" required placeholder=" ">
                    <label for="investor_name">FULL NAME</label>
                    <div class="input-bar"></div>
                </div>
                <div class="luxury-form-group">
                    <input type="email" id="investor_email" name="investor_email" required placeholder=" ">
                    <label for="investor_email">EMAIL ADDRESS</label>
                    <div class="input-bar"></div>
                </div>
            </div>

            <div class="luxury-form-group">
                <input type="text" id="investment_tier" name="investment_tier" placeholder=" ">
                <label for="investment_tier">INTENDED ALLOCATION TIER (e.g., £10,000+, £50,000+)</label>
                <div class="input-bar"></div>
            </div>

            <div class="luxury-form-group">
                <textarea id="secure_message" name="secure_message" rows="4" required placeholder=" "></textarea>
                <label for="secure_message">SECURE MESSAGE / CASKS OF INTEREST</label>
                <div class="input-bar"></div>
            </div>

            <div class="form-submit-area">
                <button type="submit" class="btn-submit-contact">SUBMIT REQUEST —</button>
            </div>
        </form>
    </section>
</main>

<?php require_once __DIR__ . '/components/footer.php'; ?>