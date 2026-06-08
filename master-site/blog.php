<?php 
require_once __DIR__ . '/config-system.php';
require_once __DIR__ . '/components/header.php';

$site_type = isset($web['site_type']) ? $web['site_type'] : 'blog';
$final_news = [];

// =========================================================================
// 🚀 ENGINE 1: MULTI-PUBLISHER cURL NEWS ENGINE (ทำงานเฉพาะโหมด 'news')
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
                        $description_raw = (string)$news_item->description;
                        
                        // สกัดรูปภาพจาก RSS ค่ายนอก
                        $extracted_img = '';
                        if (isset($news_item->enclosure) && isset($news_item->enclosure['url'])) {
                            $extracted_img = (string)$news_item->enclosure['url'];
                        }
                        if (empty($extracted_img)) {
                            $ns = $news_item->getNameSpaces(true);
                            if (isset($ns['media'])) {
                                $media_children = $news_item->children($ns['media']);
                                if (isset($media_children->content) && isset($media_children->content->attributes()->url)) {
                                    $extracted_img = (string)$media_children->content->attributes()->url;
                                }
                            }
                        }
                        if (empty($extracted_img)) {
                            preg_match('/<img[^>]+src="([^">]+)"/', $description_raw, $matches);
                            if (!empty($matches[1])) $extracted_img = $matches[1];
                        }
                        if (empty($extracted_img)) {
                            $extracted_img = 'assets/images/Bghome.webp'; 
                        }

                        $clean_text = strip_tags($description_raw);
                        $clean_text = trim(preg_replace('/\s+/', ' ', $clean_text));
                        $card_excerpt = (mb_strlen($clean_text) > 180) ? mb_substr($clean_text, 0, 180) . '...' : $clean_text;

                        $compiled_pool[] = [
                            'title'        => $title,
                            'link'         => (string)$news_item->link,
                            'card_excerpt' => $card_excerpt,
                            'full_content' => !empty($clean_text) ? $clean_text : "Live alternative asset data verified by node.",
                            'source'       => $publisher,
                            'image'        => $extracted_img,
                            'date_text'    => date('d M Y', strtotime((string)$news_item->pubDate)),
                            'timestamp'    => strtotime((string)$news_item->pubDate)
                        ];
                    }
                }
            }
        }

        if (!empty($compiled_pool)) {
            usort($compiled_pool, function($a, $b) { return $b['timestamp'] - $a['timestamp']; });
            $final_news = array_slice($compiled_pool, 0, 4);
            @file_put_contents($cache_file, json_encode($final_news, JSON_UNESCAPED_UNICODE));
        }
    }
}
?>

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

<!-- 📦 ส่วนหัวข้อประจำหน้า -->
<div class="blog-hero-section" style="margin-top: 150px; text-align: center; padding: 0 20px;">
    <span class="blog-meta" style="letter-spacing: 4px; font-size: 0.75rem; color: var(--primary-color); font-family: var(--site-font);">
        <?php echo ($site_type === 'news') ? 'AUTOMATED LIVE INSIGHT TERMINAL' : 'EDITORIAL ARTICLES & INSIGHTS'; ?>
    </span>
    <h1 class="blog-main-title" style="font-family: var(--site-font); font-size: 3.2rem; margin-top: 20px; margin-bottom: 25px; text-transform: uppercase;">
        <?php echo htmlspecialchars($web['home_title']); ?>
    </h1>
    <p class="blog-lead-in" style="font-family: 'Georgia', serif; font-style: italic; color: rgba(234, 231, 223, 0.65); max-width: 700px; margin: 0 auto 60px auto; line-height: 1.8;">
        <?php echo htmlspecialchars($web['home_subtitle']); ?>
    </p>
</div>

<!-- 📦 ส่วนแสดงผลความสมมูลแบบ LUXURY MAGAZINE LAYOUT -->
<div class="luxury-container" style="max-width: 950px; margin: 0 auto; padding: 0 20px; margin-bottom: 150px; position: relative; z-index: 2;">
    <div class="blog-editorial-layout" style="display: grid; gap: 50px; grid-template-columns: 1fr;">
        
        <?php 
        // 🚨 💻 [CASE 1: MODE NEWS - ดึงข่าวสดค่ายนอกพร้อมรูปออโต้]
        if ($site_type === 'news'): 
            if (!empty($final_news)):
                foreach ($final_news as $item): 
        ?>
                    <article class="blog-magazine-card" style="background: rgba(15, 15, 18, 0.5); border: 1px solid rgba(234, 231, 223, 0.05); border-radius: 2px; overflow: hidden; display: flex; flex-direction: column; transition: all 0.4s ease;">
                        <div class="news-image-wrapper" style="width: 100%; height: 350px; overflow: hidden; position: relative; background: #050507;">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Intel" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(30%) brightness(80%);">
                            <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 50%; background: linear-gradient(to top, rgba(9,9,11,1) 0%, rgba(9,9,11,0) 100%);"></div>
                        </div>
                        <div style="padding: 40px; margin-top: -30px; position: relative; z-index: 2;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                <span style="font-family: var(--site-font); font-size: 0.7rem; color: var(--primary-color); letter-spacing: 2px; font-weight: 600;"><?php echo htmlspecialchars($item['source']); ?></span>
                                <span style="font-family: 'Georgia', serif; font-style: italic; font-size: 0.75rem; color: rgba(234, 231, 223, 0.35);"><?php echo $item['date_text']; ?></span>
                            </div>
                            <h2 style="font-family: var(--site-font); font-size: 1.6rem; color: #eae7df; margin: 0 0 20px 0; font-weight: 400; line-height: 1.4; letter-spacing: 0.5px;">
                                <?php echo htmlspecialchars($item['title']); ?>
                            </h2>
                            <p style="font-family: 'Georgia', serif; font-style: italic; font-size: 0.95rem; color: rgba(234, 231, 223, 0.6); line-height: 1.8; margin: 0 0 35px 0; text-align: justify;">
                                <?php echo htmlspecialchars($item['card_excerpt']); ?>
                            </p>
                            <div style="border-top: 1px solid rgba(234, 231, 223, 0.04); padding-top: 25px; text-align: right;">
                                <button class="btn-trigger-intel-modal" 
                                        data-source="<?php echo htmlspecialchars($item['source']); ?> — LIVE BULLET"
                                        data-title="<?php echo htmlspecialchars($item['title']); ?>"
                                        data-full="<?php echo htmlspecialchars($item['full_content']); ?>"
                                        data-date="RELEASED: <?php echo $item['date_text']; ?>"
                                        data-link="<?php echo htmlspecialchars($item['link']); ?>"
                                        style="background: none; border: none; font-family: var(--site-font); font-size: 0.75rem; color: var(--primary-color); letter-spacing: 2px; cursor: pointer; font-weight: 600;">
                                    READ FULL INTEL —
                                </button>
                            </div>
                        </div>
                    </article>
        <?php 
                endforeach;
            endif;

        // 🚨 💻 [CASE 2: MODE BLOG - ดึงข้อมูลและรูปภาพแปรผันตรงตามที่พิมพ์สั่งในไฟล์คอนฟิก]
        else: 
            if (isset($web['articles']) && is_array($web['articles'])):
                foreach ($web['articles'] as $article): 
                    // ดึงรูปภาพจากคีย์ 'image' ในคอนฟิกมาแรนเดอร์ ถ้าเพื่อนไม่ได้ระบุ ให้ใช้ภาพพูลกลางเซฟหน้าจอ
                    $blog_img = !empty($article['image']) ? $article['image'] : 'assets/images/Bghome.webp';
        ?>
                    <article class="blog-magazine-card" style="background: rgba(15, 15, 18, 0.5); border: 1px solid rgba(234, 231, 223, 0.05); border-radius: 2px; overflow: hidden; display: flex; flex-direction: column; transition: all 0.4s ease;">
                        <!-- 🌟 [NEW] เพิ่มส่วนหัวกล่องรูปภาพที่ดึงค่าผันแปรมาจากไฟล์คอนฟิกให้โหมดบล็อกแล้วครับกัส -->
                        <div class="news-image-wrapper" style="width: 100%; height: 350px; overflow: hidden; position: relative; background: #050507;">
                            <img src="<?php echo htmlspecialchars($blog_img); ?>" alt="Editorial Content" style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(30%) brightness(80%);">
                            <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 50%; background: linear-gradient(to top, rgba(9,9,11,1) 0%, rgba(9,9,11,0) 100%);"></div>
                        </div>

                        <div style="padding: 40px; margin-top: -30px; position: relative; z-index: 2;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                                <span style="font-family: var(--site-font); font-size: 0.7rem; color: var(--primary-color); letter-spacing: 2px; font-weight: 600;"><?php echo htmlspecialchars($article['tag']); ?></span>
                                <span style="font-family: 'Georgia', serif; font-style: italic; font-size: 0.75rem; color: rgba(234, 231, 223, 0.35);"><?php echo htmlspecialchars($article['date']); ?></span>
                            </div>
                            <h2 style="font-family: var(--site-font); font-size: 1.6rem; color: #eae7df; margin: 0 0 20px 0; font-weight: 400; line-height: 1.4; letter-spacing: 0.5px;">
                                <?php echo htmlspecialchars($article['title']); ?>
                            </h2>
                            <p style="font-family: 'Georgia', serif; font-style: italic; font-size: 0.95rem; color: rgba(234, 231, 223, 0.6); line-height: 1.8; margin: 0 0 35px 0; text-align: justify;">
                                <?php echo htmlspecialchars($article['excerpt']); ?>
                            </p>
                            <div style="border-top: 1px solid rgba(234, 231, 223, 0.04); padding-top: 25px; text-align: right;">
                                <button class="btn-trigger-intel-modal" 
                                        data-source="<?php echo htmlspecialchars($article['tag']); ?>"
                                        data-title="<?php echo htmlspecialchars($article['title']); ?>"
                                        data-full="<?php echo htmlspecialchars($article['full_content']); ?>"
                                        data-date="PUBLISHED: <?php echo htmlspecialchars($article['date']); ?>"
                                        data-link="guide.php"
                                        style="background: none; border: none; font-family: var(--site-font); font-size: 0.75rem; color: var(--primary-color); letter-spacing: 2px; cursor: pointer; font-weight: 600;">
                                    READ DEEP DIVE INSIGHT —
                                </button>
                            </div>
                        </div>
                    </article>
        <?php 
                endforeach;
            endif;
        endif; 
        ?>

    </div>
</div>

<!-- ── 🌟 แผงหน้าต่าง POPUP LAYER ลักชูรี (UNIVERSAL MODAL) ── -->
<div class="luxury-modal-overlay" id="universalIntelModal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(4, 4, 5, 0.88); backdrop-filter: blur(12px); display: flex; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: opacity 0.4s ease; z-index: 9999;">
    <div class="luxury-modal-wrapper" style="background: #09090b; border: 1px solid var(--primary-color); padding: 50px; max-width: 700px; width: 90%; max-height: 85vh; overflow-y: auto; border-radius: 2px; position: relative; box-shadow: 0 35px 70px rgba(0, 0, 0, 0.95); transform: scale(0.95); transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);">
        <button id="closeIntelModalBtn" style="position: absolute; top: 25px; right: 30px; background: none; border: none; color: rgba(234, 231, 223, 0.4); font-size: 1.6rem; cursor: pointer;">&times;</button>
        <div style="margin-bottom: 20px;"><span id="mSourceTag" style="font-family: var(--site-font); font-size: 0.7rem; color: var(--primary-color); letter-spacing: 2px; font-weight: 600;">SOURCE</span></div>
        <h2 id="mNewsTitle" style="font-family: var(--site-font); font-size: 1.8rem; color: #eae7df; margin: 0 0 25px 0; font-weight: 400; line-height: 1.4;">TITLE</h2>
        <div id="mNewsBody" style="font-family: 'Georgia', serif; font-style: italic; font-size: 1.05rem; color: rgba(234, 231, 223, 0.75); line-height: 1.9; margin-bottom: 40px; text-align: justify;">CONTENT</div>
        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(234,231,223,0.05); padding-top: 25px;">
            <span id="mNewsDate" style="font-family: var(--site-font); font-size: 0.65rem; color: rgba(234, 231, 223, 0.35);">DATE</span>
            <a href="#" target="_blank" id="mOriginLink" style="font-family: var(--site-font); font-size: 0.7rem; color: #050507; background-color: var(--primary-color); text-decoration: none; padding: 12px 25px; font-weight: 600; letter-spacing: 2px;">VISIT ORIGINAL SOURCE —</a>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const modalOverlay = document.getElementById('universalIntelModal');
    const closeBtn = document.getElementById('closeIntelModalBtn');
    const mSource = document.getElementById('mSourceTag');
    const mTitle = document.getElementById('mNewsTitle');
    const mBody = document.getElementById('mNewsBody');
    const mDate = document.getElementById('mNewsDate');
    const mLink = document.getElementById('mOriginLink');

    document.querySelectorAll('.btn-trigger-intel-modal').forEach(button => {
        button.addEventListener('click', function() {
            mSource.textContent = this.getAttribute('data-source');
            mTitle.textContent = this.getAttribute('data-title');
            mBody.innerHTML = this.getAttribute('data-full');
            mDate.textContent = this.getAttribute('data-date');
            mLink.setAttribute('href', this.getAttribute('data-link'));
            
            modalOverlay.style.opacity = '1';
            modalOverlay.style.pointerEvents = 'auto';
            modalOverlay.querySelector('.luxury-modal-wrapper').style.transform = 'scale(1)';
        });
    });

    function closeUniversalModal() {
        modalOverlay.style.opacity = '0';
        modalOverlay.style.pointerEvents = 'none';
        modalOverlay.querySelector('.luxury-modal-wrapper').style.transform = 'scale(0.95)';
    }
    closeBtn.addEventListener('click', closeUniversalModal);
    modalOverlay.addEventListener('click', function(e) { if (e.target === modalOverlay) closeUniversalModal(); });
});
</script>

<?php require_once __DIR__ . '/components/footer.php'; ?>