<footer class="py-3 text-center text-muted bg-black" style="position: fixed; bottom: 0; width: 100%; z-index: 10; background: rgba(0,0,0,0.5) !important; backdrop-filter: blur(5px);">
        <small>&copy; <?php echo date('Y'); ?> FAHMAI. All rights reserved.</small>
    </footer>

    <!-- คลังแสงเครื่องยนต์แอนิเมชัน -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        // 1. สร้างท่อลำดับเวลาความเร็วสูง (GSAP Timeline) ทำงานทันทีที่โหลดเว็บเสร็จ
        const introTl = gsap.timeline();

        introTl.to("#topLine", {
            scaleX: 1,
            duration: 1.4,
            ease: "power4.inOut"
        })
        .to("#mainBrand span", {
            opacity: 1,
            y: 0,
            duration: 1,
            stagger: 0.15, // สั่งให้ตัวอักษร f-a-h-m-a-i ผุดสลับฟันปลาไล่เรียงกันทีละ 0.15 วินาที
            ease: "power3.out"
        }, "-=0.4") // ให้เริ่มเล่นก่อนเส้นบนจะวิ่งเสร็จเล็กน้อยเพื่อความสมูท
        .to("#subBrand", {
            opacity: 1,
            duration: 0.8,
            ease: "power2.out"
        }, "-=0.2")
        .to("#bottomLine", {
            scaleX: 1,
            duration: 1.2,
            ease: "power4.inOut"
        }, "-=0.6");

        // 2. ลอจิกดักจับการคลิกเพื่อเข้าเว็บ (Unlock Interface)
        document.getElementById("clickTrigger").addEventListener("click", function() {
            const unlockTl = gsap.timeline();
            
            unlockTl.to("#introOverlay", {
                opacity: 0,
                duration: 1,
                ease: "power2.inOut",
                onComplete: () => {
                    document.getElementById("introOverlay").style.display = "none";
                    // ปลดล็อกหน้าระบบหลักให้พร้อมสกรอลล์
                    document.body.style.overflowX = "auto";
                    document.getElementById("siteWrapper").classList.add("active-site");
                    document.querySelector(".navbar").classList.add("show-menu");
                    
                    // รันระบบเลื่อนจอแนวนอนหลังจากหน้าระบบปลดล็อกสมบูรณ์
                    initHorizontalScroll();
                }
            });
        });

        // 3. ฟังก์ชันคุมการเลื่อนหน้าจอแนวนอนสไตล์ Virtual Gallery
        function initHorizontalScroll() {
            const sections = gsap.utils.toArray(".horiz-section");
            const container = document.querySelector(".horizontal-container");

            gsap.to(sections, {
                xPercent: -100 * (sections.length - 1),
                ease: "none",
                scrollTrigger: {
                    trigger: ".horizontal-wrapper",
                    pin: true,
                    scrub: 1,
                    snap: 1 / (sections.length - 1),
                    end: () => "+=" + container.offsetWidth
                }
            });
        }
    </script>
</body>
</html>