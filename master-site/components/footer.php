<footer class="py-3 text-center text-muted bg-black" style="position: fixed; bottom: 0; width: 100%; z-index: 10; background: rgba(0,0,0,0.5) !important; backdrop-filter: blur(5px);">
        <small>&copy; <?php echo date('Y'); ?> FAHMAI. All rights reserved.</small>
    </footer>

    <!-- โหลดแกนหลัก GSAP และ ScrollTrigger -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

    <script>
        gsap.registerPlugin(ScrollTrigger);

        const container = document.querySelector(".horizontal-container");
        const sections = gsap.utils.toArray(".horiz-section");

        // ลอจิกสั่งล็อกหน้าจอแนวดิ่ง แล้วเปลี่ยนแรงสกรอลล์ให้วิ่งไปทางขวาแทน (สไตล์เว็บระดับโลก)
        gsap.to(sections, {
            xPercent: -100 * (sections.length - 1),
            ease: "none",
            scrollTrigger: {
                trigger: ".horizontal-wrapper",
                pin: true,        // ล็อกหน้าจอไว้ไม่ให้เลื่อนลงล่างจนกว่าจะสไลด์ขวาจบ
                scrub: 1,         // ให้ความลื่นไหลของหน้าเว็บผูกตามน้ำหนักนิ้วคนหมุนเมาส์
                snap: 1 / (sections.length - 1), // ดูดหน้าจอเข้าจุดกึ่งกลางเซกชันโดยอัตโนมัติให้เนียนตา
                end: () => "+=" + container.offsetWidth // กำหนดความลึกการเลื่อนตามความยาวหน้าเว็บจริง
            }
        });
    </script>
</body>
</html>