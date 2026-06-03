<?php 
  // 1. กำหนดข้อมูล SEO ของหน้านี้ก่อนดึง Header
  $page_title = "Premium Whisky Cask Investment | Fractional Shares";
  $meta_desc = "Start investing in high-yield scotch whisky casks with fractional ownership from just £20.";

  // 2. ดึงส่วนหัวและเมนูมาแปะ
  include 'components/header.php'; 
  include 'components/navbar.php'; 
?>

<!-- 3. ส่วนเนื้อหาหลัก (เขียน HTML + Bootstrap ตามปกติ) -->
<main class="container my-5">
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-dark">Secure Your Wealth in Liquid Gold</h1>
            <p class="col-md-8 fs-4 mx-auto text-muted">Discover the power of alternative asset diversification through premium Scottish whisky casks.</p>
            <button class="btn btn-dark btn-lg" type="button">Read Our Guide</button>
        </div>
    </div>
</main>

<?php 
  // 4. ดึงส่วนท้ายมาแปะ
  include 'components/footer.php'; 
?>