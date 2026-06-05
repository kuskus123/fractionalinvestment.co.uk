<?php
/**
 * 🧪 LIVE NEWS TERMINAL - SANDBOX TESTING PAGE
 * หน้าต่างทดสอบระบบดึงข้อมูลดิบจาก 3 ลิงก์ตรงของ อ.บอล (ไม่กระทบโค้ดหลัก)
 */

// 1. คลังแสงลิงก์ตรงที่อาจารย์บอลส่งมาในแชต
$target_links = [
    'THE SPIRITS BUSINESS' => 'https://www.thespiritsbusiness.com/feed/',
    'THE DRINKS BUSINESS'  => 'https://www.thedrinksbusiness.com/feed/',
    'WHISKY INTELLIGENCE'  => 'https://www.whiskyintelligence.com/feed/'
];

$compiled_pool = [];

// 2. เริ่มลูปส่องทีละเว็บ ดึงพิกัดข่าวสารหลังบ้าน
foreach ($target_links as $publisher => $url) {
    
    // ใช้ cURL จำลองร่างเป็นเบราว์เซอร์เข้าไปขอเปิดลิงก์ ป้องกันการโดนระบบ Security ดีดออก
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AssetParser/1.0');
    $raw_xml = curl_exec($ch);
    curl_close($ch);
    
    if ($raw_xml) {
        // แปลงเศษตัวอักษรดิบที่อ่านยาก ให้กลายเป็นโครงสร้าง Object ที่ PHP เข้าถึงง่าย
        $xml_object = @simplexml_load_string($raw_xml);
        
        if ($xml_object && isset($xml_object->channel->item)) {
            foreach ($xml_object->channel->item as $news_item) {
                
                // สกัดหัวข้อข่าว
                $title = (string)$news_item->title;
                
                // สกัดเนื้อข่าวพารากราฟจริงจากแท็ก description (จุดที่ดึงยากๆ)
                $description_raw = (string)$news_item->description;
                $clean_text = strip_tags($description_raw); // ล้างเศษโค้ด HTML ตกค้างออกให้หมด
                $clean_text = trim(preg_replace('/\s+/', ' ', $clean_text)); // ยุบย่อช่องว่างให้เรียบโปร่ง
                
                // บีบขนาดคำย่อเนื้อหาให้กระชับพอดีสายตา
                $excerpt = (mb_strlen($clean_text) > 150) ? mb_substr($clean_text, 0, 150) . '...' : $clean_text;
                
                // ถมข้อความประคองระบบไว้หากเว็บไหนปล่อย description ว่างเปล่า
                if (empty($excerpt)) {
                    $excerpt = "Live market monitoring and global alternative asset distribution data verified by official node.";
                }
                
                // โยนข้อมูลที่สกัดเสร็จแล้ว เข้าไปรวมกันในกองกลาง
                $compiled_pool[] = [
                    'title'     => $title,
                    'link'      => (string)$news_item->link,
                    'excerpt'   => $excerpt,
                    'source'    => $publisher,
                    'date_text' => date('d M Y', strtotime((string)$news_item->pubDate)),
                    'timestamp' => strtotime((string)$news_item->pubDate)
                ];
            }
        }
    }
}

// 3. 🌟 ไม้ตายลอจิก: สั่งเรียงลำดับเวลาข่าวกองกลางทั้งหมด แล้วคัดเอา "3 ข่าวล่าสุด" ที่สดใหม่ที่สุดของโลกมาแสดงผล
if (!empty($compiled_pool)) {
    usort($compiled_pool, function($a, $b) {
        return $b['timestamp'] - $a['timestamp']; // เอาเวลาล่าสุดขึ้นก่อน
    });
    // หั่นอาร์เรย์ล็อกสล็อตไว้แค่ 3 ข่าวล่าสุดตามแผนเป๊ะๆ
    $final_news = array_slice($compiled_pool, 0, 3);
} else {
    $final_news = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚡ LUXURY LIVE INTEL SANDBOX</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Georgia&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0; padding: 60px 20px;
            background: radial-gradient(circle at top center, #161410 0%, #060608 70%) no-repeat fixed;
            background-color: #060608;
            color: #eae7df;
            font-family: 'Segoe UI', sans-serif;
        }
        .sandbox-header { text-align: center; margin-bottom: 50px; }
        .sandbox-header h1 { font-family: 'Cinzel', serif; font-size: 2rem; color: #bfa030; letter-spacing: 3px; margin: 0 0 10px 0; }
        .sandbox-header p { font-family: 'Georgia', serif; font-style: italic; color: rgba(234, 231, 223, 0.5); margin: 0; }
        
        /* โครงสร้างหน้ากระดาน 3 กล่องขนานตามแผน */
        .test-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px; max-width: 1100px; margin: 0 auto;
        }
        .test-card {
            background: linear-gradient(135deg, rgba(25, 25, 30, 0.4) 0%, rgba(10, 10, 12, 0.7) 100%);
            border: 1px solid rgba(191, 160, 48, 0.12);
            border-radius: 4px; padding: 30px;
            display: flex; flex-direction: column; justify-content: space-between;
            transition: all 0.4s ease;
        }
        .test-card:hover { border-color: #bfa030; transform: translateY(-3px); }
        .card-tag { font-family: 'Cinzel', serif; font-size: 0.65rem; color: #bfa030; letter-spacing: 2px; margin-bottom: 12px; display: block; }
        .card-title { font-family: 'Cinzel', serif; font-size: 1.1rem; line-height: 1.4; color: #eae7df; margin: 0 0 15px 0; }
        .card-excerpt { font-family: 'Georgia', serif; font-size: 0.9rem; line-height: 1.6; color: rgba(234, 231, 223, 0.6); margin: 0 0 25px 0; text-align: justify; }
        .card-meta { font-family: 'Cinzel', serif; font-size: 0.65rem; color: rgba(234, 231, 223, 0.35); display: flex; justify-content: space-between; align-items: center; }
        .btn-link { color: #bfa030; text-decoration: none; letter-spacing: 1px; }
    </style>
</head>
<body>

    <div class="sandbox-header">
        <h1>LUXURY LIVE INTEL SANDBOX</h1>
        <p>กำลังลูปดึงข้อมูลจริง 3 ข่าวล่าสุดรวมค่าย จากจุดฝังตัวหลังบ้านที่ อ.บอล แนะนำ</p>
    </div>

   <?php if (!empty($final_news)): ?>
        <div class="test-grid">
            <?php foreach ($final_news as $item): ?>
                <div class="test-card">
                    <div>
                        <span class="card-tag"><?php echo htmlspecialchars($item['source']); ?></span>
                        <h3 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h3>
                        <p class="card-excerpt"><?php echo htmlspecialchars($item['excerpt']); ?></p>
                    </div>
                    <div class="card-meta">
                        <span>RELEASED: <?php echo $item['date_text']; ?></span>
                        <a href="<?php echo htmlspecialchars($item['link']); ?>" target="_blank" class="btn-link">VIEW SITE —</a>
                    </div>
                </div>
            <?php endforeach; ?> </div>
    <?php else: ?>
        <p style="text-align: center; color: rgba(234, 231, 223, 0.4); font-family: 'Georgia', serif; font-style: italic;">
            ERR: สัญญาณการเชื่อมต่อไทม์ไลน์ขัดข้อง ไม่สามารถเจาะอ่านข้อมูลดิบได้
        </p>
    <?php endif; ?>

</body>
</html>