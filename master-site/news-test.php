<?php
/**
 * 🧪 LIVE NEWS TERMINAL - LUXURY MODAL POPUP (SANDBOX OPTION 1)
 * ระบบดึงข้อมูลข่าวสาร 3 ค่ายของ อ.บอล พร้อมระบบเปิดอ่านพารากราฟเต็มในหน้าต่างป๊อปอัพหรู
 */

$target_links = [
    'THE SPIRITS BUSINESS' => 'https://www.thespiritsbusiness.com/feed/',
    'THE DRINKS BUSINESS'  => 'https://www.thedrinksbusiness.com/feed/',
    'WHISKY INTELLIGENCE'  => 'https://www.whiskyintelligence.com/feed/'
];

$compiled_pool = [];

foreach ($target_links as $publisher => $url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AssetParser/1.0');
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
                
                // สกัดเนื้อความบทความเต็มพารากราฟที่แฝงอยู่ใน XML Feed
                $description_raw = (string)$news_item->description;
                $clean_text = strip_tags($description_raw);
                $clean_text = trim(preg_replace('/\s+/', ' ', $clean_text));
                
                // กล่องการ์ดหน้าบ้านจะหั่นข้อความให้สั้นกระชับ 120 ตัวอักษร
                $card_excerpt = (mb_strlen($clean_text) > 120) ? mb_substr($clean_text, 0, 120) . '...' : $clean_text;
                
                if (empty($clean_text)) {
                    $clean_text = "Live market monitoring and global alternative asset distribution data verified by official node.";
                    $card_excerpt = $clean_text;
                }
                
                $compiled_pool[] = [
                    'title'        => $title,
                    'link'         => (string)$news_item->link,
                    'card_excerpt' => $card_excerpt,
                    'full_content' => $clean_text, // 🌟 ฝังเนื้อหาเต็มพารากราฟเตรียมไว้ให้ JavaScript ดึงไปใช้
                    'source'       => $publisher,
                    'date_text'    => date('d M Y', strtotime((string)$news_item->pubDate)),
                    'timestamp'    => strtotime((string)$news_item->pubDate)
                ];
            }
        }
    }
}

if (!empty($compiled_pool)) {
    usort($compiled_pool, function($a, $b) {
        return $b['timestamp'] - $a['timestamp'];
    });
    $final_news = array_slice($compiled_pool, 0, 3); // ล็อกเป้าหมาย 3 ข่าวล่าสุดรวมค่ายตามแผน
} else {
    $final_news = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚡ LUXURY MODAL INTEL TERMINAL</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Georgia&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0; padding: 60px 20px;
            background: radial-gradient(circle at top center, #161410 0%, #060608 70%) no-repeat fixed;
            background-color: #060608; color: #eae7df; font-family: 'Segoe UI', sans-serif;
        }
        .sandbox-header { text-align: center; margin-bottom: 50px; }
        .sandbox-header h1 { font-family: 'Cinzel', serif; font-size: 2rem; color: #bfa030; letter-spacing: 3px; margin: 0 0 10px 0; }
        .sandbox-header p { font-family: 'Georgia', serif; font-style: italic; color: rgba(234, 231, 223, 0.5); margin: 0; }
        
        /* Layout หน้ากระดาน Grid 3 กล่อง */
        .test-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1100px; margin: 0 auto; }
        .test-card { 
            background: linear-gradient(135deg, rgba(25, 25, 30, 0.4) 0%, rgba(10, 10, 12, 0.7) 100%);
            border: 1px solid rgba(191, 160, 48, 0.12); border-radius: 4px; padding: 30px;
            display: flex; flex-direction: column; justify-content: space-between; transition: all 0.4s ease;
        }
        .test-card:hover { border-color: #bfa030; transform: translateY(-3px); }
        .card-tag { font-family: 'Cinzel', serif; font-size: 0.65rem; color: #bfa030; letter-spacing: 2px; margin-bottom: 12px; display: block; }
        .card-title { font-family: 'Cinzel', serif; font-size: 1.1rem; line-height: 1.4; color: #eae7df; margin: 0 0 15px 0; }
        .card-excerpt { font-family: 'Georgia', serif; font-size: 0.9rem; line-height: 1.6; color: rgba(234, 231, 223, 0.5); margin: 0 0 25px 0; text-align: justify; }
        .card-meta { font-family: 'Cinzel', serif; font-size: 0.65rem; color: rgba(234, 231, 223, 0.35); display: flex; justify-content: space-between; align-items: center; }
        
        /* ปุ่มเปิดคลังข้อมูลลับ */
        .btn-open-modal { 
            color: #bfa030; background: none; border: none; font-family: 'Cinzel', serif; 
            font-size: 0.7rem; letter-spacing: 1px; cursor: pointer; padding: 0; transition: color 0.3s;
        }
        .btn-open-modal:hover { color: #eae7df; }

        /* ── 🌟 สไตล์ระบบ LUXURY MODAL POPUP ── */
        .luxury-modal-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(6, 6, 8, 0.85); backdrop-filter: blur(8px);
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none; transition: opacity 0.4s ease; z-index: 9999;
        }
        .luxury-modal-overlay.active { opacity: 1; pointer-events: auto; }
        
        .luxury-modal-wrapper {
            background: #0d0c0e; border: 1px solid #bfa030; padding: 40px;
            max-width: 650px; width: 90%; border-radius: 4px; position: relative;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.9);
            transform: scale(0.9); transition: transform 0.4s ease;
        }
        .luxury-modal-overlay.active .luxury-modal-wrapper { transform: scale(1); }
        
        .modal-close-trigger {
            position: absolute; top: 20px; right: 20px; background: none; border: none;
            color: rgba(234, 231, 223, 0.4); font-size: 1.5rem; cursor: pointer; transition: color 0.3s;
        }
        .modal-close-trigger:hover { color: #bfa030; }
        
        .modal-source-tag { font-family: 'Cinzel', serif; font-size: 0.7rem; color: #bfa030; letter-spacing: 2px; display: block; margin-bottom: 15px; }
        .modal-news-title { font-family: 'Cinzel', serif; font-size: 1.4rem; line-height: 1.4; color: #eae7df; margin: 0 0 20px 0; border-bottom: 1px solid rgba(191,160,48,0.15); padding-bottom: 15px; }
        .modal-news-body { font-family: 'Georgia', serif; font-size: 1.05rem; line-height: 1.8; color: rgba(234, 231, 223, 0.75); margin-bottom: 30px; text-align: justify; }
        
        .modal-footer-area { display: flex; justify-content: space-between; align-items: center; border-top: 1px solid rgba(234,231,223,0.05); padding-top: 20px; }
        .modal-date { font-family: 'Cinzel', serif; font-size: 0.65rem; color: rgba(234, 231, 223, 0.35); }
        .btn-visit-origin { 
            font-family: 'Cinzel', serif; font-size: 0.7rem; color: #060608; background-color: #bfa030;
            text-decoration: none; padding: 10px 20px; border-radius: 2px; letter-spacing: 1px; font-weight: 600; transition: all 0.3s;
        }
        .btn-visit-origin:hover { background-color: #eae7df; }
    </style>
</head>
<body>

    <div class="sandbox-header">
        <h1>LUXURY LIVE INTEL TERMINAL</h1>
        <p>รูปแบบที่ 1: ระบบเปิดอ่านพารากราฟข่าวจริงในหน้าต่างลับโดยไม่ต้องออกจากเว็บไซต์</p>
    </div>

    <?php if (!empty($final_news)): ?>
        <div class="test-grid">
            <?php foreach ($final_news as $item): ?>
                <div class="test-card">
                    <div>
                        <span class="card-tag"><?php echo htmlspecialchars($item['source']); ?></span>
                        <h3 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p class="card-excerpt"><?php echo htmlspecialchars($item['card_excerpt']); ?></p>
                    </div>
                    <div class="card-meta">
                        <span><?php echo $item['date_text']; ?></span>
                        <!-- 🌟 ฝังข้อมูลเนื้อหาเต็มพารากราฟลึกไว้ใน Data Attributes -->
                        <button class="btn-open-modal" 
                                data-source="<?php echo htmlspecialchars($item['source']); ?>"
                                data-title="<?php echo htmlspecialchars($item['title']); ?>"
                                data-full="<?php echo htmlspecialchars($item['full_content']); ?>"
                                data-date="RELEASED: <?php echo $item['date_text']; ?>"
                                data-link="<?php echo htmlspecialchars($item['link']); ?>">
                            READ INTEL —
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p style="text-align: center; color: rgba(234, 231, 223, 0.4); font-family: 'Georgia', serif; font-style: italic;">
            ERR: สัญญาณการเชื่อมต่อข้อมูลขัดข้อง
        </p>
    <?php endif; ?>

    <!-- ── 🌟 แผงหน้าต่าง POPUP LAYER (ซ่อนไว้รอใช้งาน) ── -->
    <div class="luxury-modal-overlay" id="intelModalOverlay">
        <div class="luxury-modal-wrapper">
            <button class="modal-close-trigger" id="closeModalBtn">&times;</button>
            <span class="modal-source-tag" id="modalSource">SOURCE</span>
            <h2 class="modal-news-title" id="modalTitle">NEWS TITLE</h2>
            <div class="modal-news-body" id="modalBody">NEWS BODY CONTENT</div>
            <div class="modal-footer-area">
                <span class="modal-date" id="modalDate">DATE</span>
                <a href="#" target="_blank" class="btn-visit-origin" id="modalOriginLink">VISIT ORIGINAL SITE —</a>
            </div>
        </div>
    </div>

    <!-- ── 🌟 ระบบ JavaScript ควบคุมกลไกป๊อปอัพ ── -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalOverlay = document.getElementById('intelModalOverlay');
            const closeModalBtn = document.getElementById('closeModalBtn');
            
            // องค์ประกอบภายในหน้าต่างป๊อปอัพ
            const mSource = document.getElementById('modalSource');
            const mTitle = document.getElementById('modalTitle');
            const mBody = document.getElementById('modalBody');
            const mDate = document.getElementById('modalDate');
            const mLink = document.getElementById('modalOriginLink');

            // 1. ดักเมาส์เมื่อมีการกดปุ่ม READ INTEL บนการ์ดทุกใบ
            document.querySelectorAll('.btn-open-modal').forEach(button => {
                button.addEventListener('click', (e) => {
                    // ดึงข้อมูลที่ PHP แอบฝังไว้พ่นใส่ป๊อปอัพ
                    mSource.textContent = button.getAttribute('data-source') + " — EXCLUSIVE INTEL";
                    mTitle.textContent = button.getAttribute('data-title');
                    mBody.textContent = button.getAttribute('data-full');
                    mDate.textContent = button.getAttribute('data-date');
                    mLink.setAttribute('href', button.getAttribute('data-link'));

                    // เปิดหน้าต่างป๊อปอัพให้สว่างขึ้นมา
                    modalOverlay.classList.add('active');
                });
            });

            // 2. ปิดหน้าต่างเมื่อกดกากบาท
            closeModalBtn.addEventListener('click', () => {
                modalOverlay.classList.remove('active');
            });

            // 3. ปิดหน้าต่างเมื่อกดพื้นที่สีดำรอบนอกป๊อปอัพ
            modalOverlay.addEventListener('click', (e) => {
                if (e.target === modalOverlay) {
                    modalOverlay.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>