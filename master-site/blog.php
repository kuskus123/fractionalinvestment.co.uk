<?php 
// 🌟 ดึงระบบตั้งค่าสัญญากลางและหัวเว็บเข้ามาประกอบร่าง
require_once __DIR__ . '/config-system.php';
require_once __DIR__ . '/components/header.php';

$site_type = isset($web['site_type']) ? $web['site_type'] : 'blog';
$final_news = [];

// =========================================================================
// 🚀 ENGINE: cURL NEWS AGGREGATOR + CACHE
// =========================================================================
if ($site_type === 'news') {
    $cache_suffix = md5(json_encode($web['news_sources']));
    $cache_file = __DIR__ . "/cache_news_" . substr($cache_suffix, 0, 8) . ".json";
    $cache_time = 900; 

    if (file_exists($cache_file) && (time() - filemtime($cache_file) < $cache_time)) {
        $final_news = json_decode(@file_get_contents($cache_file), true);
    }

    if (empty($final_news)) {
        $master_links = [
            'THE SPIRITS BUSINESS' => 'https://www.thespiritsbusiness.com/feed/',
            'THE DRINKS BUSINESS'  => 'https://www.thedrinksbusiness.com/feed/',
            'WHISKY INTELLIGENCE'  => 'https://www.whiskyintelligence.com/feed/'
        ];
        $allowed_sources = isset($web['news_sources']) ? $web['news_sources'] : array_keys($master_links);
        $compiled_pool = [];

        foreach ($master_links as $publisher => $url) {
            if (!in_array($publisher, $allowed_sources)) continue;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 12);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AssetParser/1.1');
            $raw_xml = curl_exec($ch);
            curl_close($ch);
            
            if ($raw_xml) {
                $xml_object = @simplexml_load_string($raw_xml);
                if ($xml_object && isset($xml_object->channel->item)) {
                    foreach ($xml_object->channel->item as $news_item) {
                        $title = (string)$news_item->title;
                        if (strpos($title, ' - ') !== false) {
                            $title_parts = explode(' - ', $title);
                            array_pop($title_parts);
                            $title = implode(' - ', $title_parts);
                        }
                        
                        $description_raw = (string)$news_item->description;
                        $clean_text = strip_tags($description_raw);
                        $clean_text = trim(preg_replace('/\s+/', ' ', $clean_text));
                        $card_excerpt = (mb_strlen($clean_text) > 130) ? mb_substr($clean_text, 0, 130) . '...' : $clean_text;

                        $compiled_pool[] = [
                            'title'        => $title,
                            'link'         => (string)$news_item->link,
                            'card_excerpt' => $card_excerpt,
                            'full_content' => !empty($clean_text) ? $clean_text : "Live alternative asset data verified by node.",
                            'source'       => $publisher,
                            'date_text'    => date('M d, Y', strtotime((string)$news_item->pubDate)),
                            'timestamp'    => strtotime((string)$news_item->pubDate)
                        ];
                    }
                }
            }
        }

        if (!empty($compiled_pool)) {
            usort($compiled_pool, function($a, $b) { return $b['timestamp'] - $a['timestamp']; });
            // 🎯 ล็อกเป้าหมายแสดงผล 3 ข่าวล่าสุดตามรูปแบบกระดานเทอร์มินอลในรูปภาพ image_04a969.jpg
            $final_news = array_slice($compiled_pool, 0, 3);
            @file_put_contents($cache_file, json_encode($final_news, JSON_UNESCAPED_UNICODE));
        }
    }
    // ส่งผ่านข้อมูลเข้าพูลหลัก
    $display_collection = $final_news;
} else {
    // โหมดบล็อกเขียนเอง ดึงข้อมูลตรงๆ จาก config-system.php
    $display_collection = isset($web['articles']) ? $web['articles'] : [];
}
?>
<script>document.body.className = "normal-page";</script>

<!-- 🧭 แถบเมนูนำทาง (Navbar) -->
<nav class="luxury-nav nav-visible" id="globalNavbar">
    <a href="index.php" class="nav-brand"><?php echo htmlspecialchars($web['brand_name']); ?></a>
    <ul class="nav-links">
        <li><a href="index.php">HOME</a></li>
        <li><a href="guide.php">GUIDE</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="blog.php" class="active">BLOG</a></li>
        <li><a href="contact.php">ABOUT / CONTACT</a></li>
    </ul>
</nav>

<!-- 📦 ส่วนหัวข้อประจำหน้า ถอดดีไซน์ฟอนต์ตามแบบภาพ image_04a969.jpg -->
<div class="blog-hero-section" style="margin-top: 150px; text-align: center; padding: 0 20px;">
    <span class="blog-meta" style="letter-spacing: 3px; font-size: 0.7rem; color: var(--primary-color); font-family: var(--site-font); text-transform: uppercase;">
        <?php echo htmlspecialchars($web['brand_name']); ?> CAPITAL — MARKET INTEL
    </span>
    <h1 class="blog-main-title" style="font-family: var(--site-font); font-size: 3rem; margin-top: 15px; margin-bottom: 20px; letter-spacing: 1px; color: #eae7df;">
        <?php echo htmlspecialchars($web['home_title']); ?>
    </h1>
    <p class="blog-lead-in" style="font-family: 'Georgia', serif; font-style: italic; color: rgba(234, 231, 223, 0.5); max-width: 650px; margin: 0 auto 60px auto; line-height: 1.8; font-size: 1rem;">
        <?php echo htmlspecialchars($web['home_subtitle']); ?>
    </p>
</div>

<!-- 📦 ส่วนกระดานตารางข่าวสาร 3 กล่องเรียงเดี่ยว (Terminal Grid System) ตามภาพ image_04a969.jpg -->
<div class="luxury-container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; margin-bottom: 150px; position: relative; z-index: 2;">
    <div class="test-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        
        <?php 
        if (!empty($display_collection)):
            foreach ($display_collection as $index => $item): 
                $num_padded = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                
                // ดักจับคีย์ข้อมูลกรณีสลับโหมดเขียนเองสลับโหมดดึงข่าวออโต้
                $item_title   = isset($item['title']) ? $item['title'] : '';
                $item_excerpt = isset($item['card_excerpt']) ? $item['card_excerpt'] : (isset($item['excerpt']) ? $item['excerpt'] : '');
                $item_full    = isset($item['full_content']) ? $item['full_content'] : '';
                $item_source  = isset($item['source']) ? $item['source'] : (isset($item['tag']) ? $item['tag'] : 'INTEL SOURCE');
                $item_date    = isset($item['date_text']) ? $item['date_text'] : (isset($item['date']) ? $item['date'] : date('d M Y'));
                $item_link    = isset($item['link']) ? $item['link'] : 'guide.php';
        ?>
                <!-- 🎯 ตัวการ์ดถอดแบบโครงสร้างเส้นขอบและการตอบสนองตามภาพ image_04a969.jpg -->
                <div class="test-card" style="background: linear-gradient(135deg, rgba(25, 25, 30, 0.4) 0%, rgba(10, 10, 12, 0.7) 100%); border: 1px solid rgba(191, 160, 48, 0.12); border-radius: 4px; padding: 35px; display: flex; flex-direction: column; justify-content: space-between; transition: all 0.4s ease;">
                    <div>
                        <!-- กล่องโครงลายเส้นจำลองภาพกราฟิกขรึมๆ เท่ๆ ตามพิมพ์เขียวเดิม -->
                        <div class="insight-visual-placeholder" style="width: 100%; height: 160px; border: 1px dashed rgba(234, 231, 223, 0.05); display: flex; align-items: center; justify-content: center; margin-bottom: 25px; background: rgba(5, 5, 7, 0.2); border-radius: 2px;">
                            <span style="font-family: var(--site-font); font-size: 0.65rem; color: rgba(234, 231, 223, 0.25); letter-spacing: 2px;">[ - INSIGHT VISUAL <?php echo $num_padded; ?> - ]</span>
                        </div>

                        <span class="card-tag" style="font-family: var(--site-font); font-size: 0.65rem; color: var(--primary-color); letter-spacing: 2px; margin-bottom: 12px; display: block; text-transform: uppercase;">
                            <?php echo htmlspecialchars($item_date); ?> &nbsp;&nbsp;—&nbsp;&nbsp; <?php echo htmlspecialchars($item_source); ?>
                        </span>
                        
                        <h3 class="card-title" style="font-family: var(--site-font); font-size: 1.15rem; line-height: 1.4; color: #eae7df; margin: 0 0 15px 0; font-weight: 400; letter-spacing: 0.5px;">
                            <?php echo htmlspecialchars($item_title); ?>
                        </h3>
                        
                        <p class="card-excerpt" style="font-family: 'Georgia', serif; font-size: 0.9rem; line-height: 1.6; color: rgba(234, 231, 223, 0.5); margin: 0 0 25px 0; text-align: justify;">
                            <?php echo htmlspecialchars($item_excerpt); ?>
                        </p>
                    </div>
                    
                    <div class="card-meta" style="border-top: 1px solid rgba(234,231,223,0.03); padding-top: 20px; display: flex; justify-content: flex-start; align-items: center;">
                        <!-- 🎯 ปุ่มยิงสัญญาณเปิดหน้าต่างโครงสร้างหรูสไตล์บล็อกตัวเต็มแบบ image_04a9a7.png -->
                        <button class="btn-open-modal" 
                                data-source="<?php echo htmlspecialchars($item_source); ?>"
                                data-title="<?php echo htmlspecialchars($item_title); ?>"
                                data-excerpt="<?php echo htmlspecialchars($item_excerpt); ?>"
                                data-full="<?php echo htmlspecialchars($item_full); ?>"
                                data-date="<?php echo htmlspecialchars($item_date); ?> — <?php echo htmlspecialchars($item_source); ?>"
                                data-link="<?php echo htmlspecialchars($item_link); ?>"
                                style="color: var(--primary-color); background: none; border: none; font-family: var(--site-font); font-size: 0.7rem; letter-spacing: 1px; cursor: pointer; padding: 0; font-weight: 600; transition: color 0.3s;">
                            READ INTEL —
                        </button>
                    </div>
                </div>
        <?php 
            endforeach;
        else:
        ?>
            <p style="grid-column: 1/-1; text-align: center; color: rgba(234, 231, 223, 0.4); font-family: 'Georgia', serif; font-style: italic;">
                ERR: SIGNAL TERMINAL INTERRUPTION
            </p>
        <?php endif; ?>

    </div>
</div>

<!-- ── 🌟 แผงป๊อปอัพโมดอลที่อัปเกรดโครงสร้างข้างในตามแบบไฟล์ blog1.php เป๊ะๆ ── -->
<div class="luxury-modal-overlay" id="intelModalOverlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(6, 6, 8, 0.88); backdrop-filter: blur(12px); display: flex; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: opacity 0.4s ease; z-index: 9999;">
    <!-- ดึงคลาสและมิติความกว้าง-ยาวของแบบดั้งเดิมมาควบคุมความสมบูรณ์ -->
    <div class="luxury-modal-wrapper" style="background: #0d0c0e; border: 1px solid var(--primary-color); padding: 50px; max-width: 750px; width: 90%; max-height: 88vh; overflow-y: auto; border-radius: 4px; position: relative; box-shadow: 0 20px 50px rgba(0, 0, 0, 0.95); transform: scale(0.9); transition: transform 0.4s ease;">
        
        <button class="modal-close-trigger" id="closeModalBtn" style="position: absolute; top: 25px; right: 25px; background: none; border: none; color: rgba(234, 231, 223, 0.4); font-size: 1.6rem; cursor: pointer; transition: color 0.3s;">&times;</button>
        
        <!-- 🎯 ครอบโครงสร้างหลักด้วยคลาสดั้งเดิมของหน้าจอบทความตัวเต็ม (ตามโครงสร้างใน blog1.php) -->
        <main class="luxury-article-wrapper" style="padding: 0; background: none;">
            <header class="article-hero" style="text-align: left; margin-bottom: 30px;">
                <div class="article-meta" id="modalDate" style="font-family: var(--site-font); font-size: 0.75rem; color: var(--primary-color); letter-spacing: 2px; margin-bottom: 15px; text-transform: uppercase;">DATE — TAG</div>
                <h1 class="article-main-title" id="modalTitle" style="font-family: var(--site-font); font-size: 2rem; line-height: 1.35; color: #eae7df; margin: 0 0 20px 0; font-weight: 400; letter-spacing: 0.5px;">TITLE</h1>
                <p class="article-lead-in" id="modalExcerpt" style="font-family: 'Georgia', serif; font-style: italic; font-size: 1.05rem; line-height: 1.7; color: rgba(234, 231, 223, 0.65); margin-bottom: 25px;">LEAD EXCERPT</p>
                <div class="article-divider" style="width: 100%; height: 1px; background: rgba(191,160,48,0.15); margin-top: 25px;"></div>
            </header>

            <article class="article-body-content" id="modalBody" style="font-family: 'Georgia', serif; font-size: 1.05rem; line-height: 1.8; color: rgba(234, 231, 223, 0.75); text-align: justify;">
                <!-- ข้อความพารากราฟตัวจริงทั้งหมดจะถูกสับเปลี่ยนเข้ามาตรงนี้ด้วย JavaScript -->
                BODY CONTENT
            </article>
        </main>

        <div class="modal-footer-area" style="display: flex; justify-content: flex-end; align-items: center; border-top: 1px solid rgba(234,231,223,0.05); padding-top: 25px; margin-top: 40px;">
            <a href="#" target="_blank" class="btn-visit-origin" id="modalOriginLink" style="font-family: var(--site-font); font-size: 0.7rem; color: #060608; background-color: var(--primary-color); text-decoration: none; padding: 12px 25px; border-radius: 2px; letter-spacing: 1px; font-weight: 600; transition: all 0.3s;">
                VISIT ORIGINAL SITE —
            </a>
        </div>
    </div>
</div>

<!-- 🚀 สคริปต์กลไกควบคุมหน้าต่างโมดอลแบบฉบับดั้งเดิม -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modalOverlay = document.getElementById('intelModalOverlay');
    const closeModalBtn = document.getElementById('closeModalBtn');
    
    const mDate = document.getElementById('modalDate');
    const mTitle = document.getElementById('modalTitle');
    const mExcerpt = document.getElementById('modalExcerpt');
    const mBody = document.getElementById('modalBody');
    const mLink = document.getElementById('modalOriginLink');

    document.querySelectorAll('.btn-open-modal').forEach(button => {
        button.addEventListener('click', () => {
            // ดึงค่าสปริงข้อมูลมาประกอบร่างโมดอล
            mDate.textContent = button.getAttribute('data-date');
            mTitle.textContent = button.getAttribute('data-title');
            mExcerpt.textContent = button.getAttribute('data-excerpt');
            
            // สั่งพ่นเนื้อหาเต็มพารากราฟ พร้อมติดตั้งฟังก์ชันครอบตัวอักษรใหญ่ (Drop Cap) ในย่อหน้าแรกออโต้เพื่อความเนียนพรีเมียม
            let fullTextContent = button.getAttribute('data-full');
            mBody.innerHTML = fullTextContent;
            
            // ค้นหาย่อหน้าแรกสุดเพื่อฉีดคลาสพรีเมียมให้ตัวอักษรตัวแรกใหญ่พราวแสงแบบในรูปภาพ image_04a9a7.png
            const firstP = mBody.querySelector('p');
            if (firstP) {
                firstP.classList.add('has-drop-cap');
            }

            mLink.setAttribute('href', button.getAttribute('data-link'));

            // ดึงหน้าต่างขึ้นแสดงผล
            modalOverlay.style.opacity = '1';
            modalOverlay.style.pointerEvents = 'auto';
            modalOverlay.querySelector('.luxury-modal-wrapper').style.transform = 'scale(1)';
        });
    });

    function closeIntelModal() {
        modalOverlay.style.opacity = '0';
        modalOverlay.style.pointerEvents = 'none';
        modalOverlay.querySelector('.luxury-modal-wrapper').style.transform = 'scale(0.9)';
    }

    closeModalBtn.addEventListener('click', closeIntelModal);
    modalOverlay.addEventListener('click', (e) => {
        if (e.target === modalOverlay) closeIntelModal();
    });
});
</script>

<?php 
require_once __DIR__ . '/components/footer.php'; 
?>