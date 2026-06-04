<footer class="py-4 text-center text-muted border-top border-secondary bg-dark">
        <div class="container">
            <small>&copy; <?php echo date('Y'); ?> Cask Investment Portfolio. All rights reserved.</small>
        </div>
    </footer>

    <!-- 1. โหลดคลังสคริปต์หลักของ Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 2. โหลดเครื่องยนต์หลัก GSAP และตัวดักการสกรอลล์ ScrollTrigger สำหรับเอฟเฟกต์ระดับโปร -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <!-- 3. ลอจิกควบคุมแอนิเมชันสไตล์ Interactive Web อาศัยทรัพยากร GPU -->
    <script>
        // เปิดใช้งานโมดูลดักจับการเลื่อนหน้าจอ
        gsap.registerPlugin(ScrollTrigger);

        // 🌟 เอฟเฟกต์ที่ 1: ตัวอักษรผุดเลื่อนขึ้นมาทีละแถวอย่างนุ่มนวลเมื่อเลื่อนจอมาถึง
        gsap.utils.toArray('.gsap-reveal').forEach((text) => {
            gsap.to(text, {
                scrollTrigger: {
                    trigger: text,
                    start: "top 85%", // เริ่มทำเมื่อข้อความโผล่พ้นขอบล่างจอมา 15%
                    toggleActions: "play none none none" // เล่นรอบเดียวจบเพื่อความคลีน
                },
                opacity: 1,
                y: 0,
                duration: 1.2,
                ease: "power3.out"
            });
        });

        // 🌟 เอฟเฟกต์ที่ 2: เปลี่ยนสีพื้นหลังตัวเว็บยืดหยุ่นตามเซกชันปัจจุบัน (สไตล์ lunchlab.fr)
        gsap.utils.toArray('section[data-bg]').forEach((section) => {
            const targetColor = section.getAttribute('data-bg');
            
            ScrollTrigger.create({
                trigger: section,
                start: "top 50%", // เปลี่ยนสีเมื่อกึ่งกลางของเซกชันเลื่อนมาถึงกลางจอ
                end: "bottom 50%",
                onEnter: () => document.body.style.backgroundColor = targetColor,
                onEnterBack: () => document.body.style.backgroundColor = targetColor
            });
        });

        // 🌟 เอฟเฟกต์ที่ 3: ระบบการ์ดเหลื่อมความเร็วพารัลแลกซ์ (Parallax Cards) 
        gsap.utils.toArray('.card-parallax').forEach((card) => {
            const speed = card.getAttribute('data-speed');
            
            gsap.to(card, {
                scrollTrigger: {
                    trigger: card,
                    start: "top bottom",
                    end: "bottom top",
                    scrub: true // สั่งให้อนิเมชั่นผูกความเร็วตามน้ำหนักการหมุนเมาส์ของยูสเซอร์
                },
                y: speed,
                ease: "none"
            });
        });
    </script>
</body>
</html>