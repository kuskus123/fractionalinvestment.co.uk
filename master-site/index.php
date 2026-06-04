<!-- master-site/index_3.php -->
<?php 
  $page_title = "FAHMAI | The Dark Room Concept";
  require_once __DIR__ . '/components/header.php';
?>

<!-- 1. หน้า Intro Splash Screen เปิดตัวคำว่า FAHMAI -->
<div id="introOverlay" style="position: fixed; top:0; left:0; width:100%; height:100vh; z-index: 999; display:flex; align-items:center; justify-content:center;">
    <div class="lumen-style-branding" id="clickTrigger">
        <div class="lumen-line" id="topLine"></div>
        <h1 class="lumen-title" id="mainBrand">
            <span>f</span><span>a</span><span>h</span><span>m</span><span>a</span><span>i</span>
        </h1>
        <div class="lumen-subtitle" id="subBrand">— Click to Explore —</div>
        <div class="lumen-line" id="bottomLine" style="margin-top: 25px;"></div>
    </div>
</div>

<!-- 2. 🌟 หน้าแกลเลอรีจำลอง (กัสสามารถเปลี่ยนพาธรูปภาพใน url() ตรงนี้แยกตามโดเมนเว็บลูกได้เลยครับ) -->
<div id="conceptSection" class="concept-container" style="background-image: url('assets/images/Bghome.jpg');">
    
    <!-- 🌟 ผ้าใบสำหรับคำนวณกราฟิกละอองฝุ่นสีทองลอยเอื่อยๆ -->
    <canvas id="particleCanvas"></canvas>

    <div class="concept-content">
        <div class="concept-tag concept-reveal">— A SPOTLIGHT —</div>
        
        <h1 class="concept-title concept-reveal">
            Silent <em>casks</em><br>
            breathe through the<br>
            night.
        </h1>
        
        <div class="concept-subtext concept-reveal">
            <p>You enter alone into a dark room.</p>
            <p>A silent maturation hidden within the oak.</p>
            <p>Let your gaze wander. Click the bright points to explore the space.</p>
        </div>
        
        <div class="concept-action concept-reveal">
            <a href="#" class="btn-concept-enter">ENTER —</a>
        </div>
    </div>
    
    <div class="concept-dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</div>

<?php require_once __DIR__ . '/components/footer.php'; ?>