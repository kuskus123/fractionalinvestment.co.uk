<?php include 'config-system.php'; ?>
<?php 
  // 🎯 ดึงชื่อแบรนด์จากคอนฟิกมาสับเปลี่ยนชื่อแท็บเบราว์เซอร์อัตโนมัติ
  $page_title = "Bespoke Private Registry & Contact | " . htmlspecialchars($web['brand_name']);
  require_once __DIR__ . '/components/header.php';
?>

<script>document.body.classList.add("normal-page");</script>

<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php" class="nav-brand"><?php echo htmlspecialchars($web['brand_name']); ?></a>
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
        <form action="#" method="POST" class="private-office-form">
            <div class="form-row-twin">
                <div class="luxury-form-group">
                    <input type="text" id="investor_name" name="investor_name" required placeholder=" ">
                    <label for="investor_name" style="color: #eae7df !important; opacity: 0.95;">FULL NAME</label>
                    <div class="input-bar"></div>
                </div>
                <div class="luxury-form-group">
                    <input type="email" id="investor_email" name="investor_email" required placeholder=" ">
                    <label for="investor_email" style="color: #eae7df !important; opacity: 0.95;">EMAIL ADDRESS</label>
                    <div class="input-bar"></div>
                </div>
            </div>

            <div class="luxury-form-group">
                <textarea id="secure_message" name="secure_message" rows="4" required placeholder=" "></textarea>
                <label for="secure_message" style="color: #eae7df !important; opacity: 0.95;">SECURE MESSAGE / CASKS OF INTEREST</label>
                <div class="input-bar"></div>
            </div>

            <div class="form-submit-area">
                <button type="submit" class="btn-submit-contact">SUBMIT REQUEST —</button>
            </div>
        </form>
    </section>
</main>

<?php require_once __DIR__ . '/components/footer.php'; ?>