<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <script>
        // 1. แอนิเมชั่นเปิดตัวเส้นสายคำว่า FAHMAI รันทันทีเมื่อโหลดหน้าเว็บเสร็จ
        const introTl = gsap.timeline();
        introTl.to("#topLine", { scaleX: 1, duration: 1.4, ease: "power4.inOut" })
        .to("#mainBrand span", { opacity: 1, y: 0, duration: 1, stagger: 0.15, ease: "power3.out" }, "-=0.4")
        .to("#subBrand", { opacity: 1, duration: 0.8, ease: "power2.out" }, "-=0.2")
        .to("#bottomLine", { scaleX: 1, duration: 1.2, ease: "power4.inOut" }, "-=0.6");

        // 2. ลอจิกควบคุมการคลิกเพื่อเปลี่ยนผ่านมิติหน้าจอ (Transition System)
        document.getElementById("clickTrigger").addEventListener("click", function() {
            const transitionTl = gsap.timeline();
            
            // เฟดปิดม่านหน้าแรกลงช้าๆ
            transitionTl.to("#introOverlay", {
                opacity: 0,
                duration: 1.2,
                ease: "power2.inOut",
                onComplete: () => {
                    // ซ่อนหน้าแรกถาวรเพื่อไม่ให้บังเลเยอร์
                    document.getElementById("introOverlay").style.display = "none";
                    
                    // ปลดล็อกเปิดสวิตช์หน้าแกลเลอรีเงียบๆ ให้แสดงตัวออกมา
                    const conceptContainer = document.getElementById("conceptSection");
                    conceptContainer.classList.add("show-concept");
                    
                    // สั่งให้ชิ้นส่วนข้อความต่างๆ ค่อยๆ เฟดผุดไล่เลียงกัน (Stagger Reveal)
                    gsap.to(".concept-reveal", {
                        opacity: 1,
                        y: 0,
                        duration: 1.4,
                        stagger: 0.2, // หน่วงเวลาระหว่างชิ้นเนื้อหาชิ้นละ 0.2 วินาทีเพื่อให้เรียงตัวสวยงาม
                        ease: "power3.out"
                    });
                }
            });
        });
    </script>
</body>
</html>