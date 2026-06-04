<!-- master-site/components/footer.php -->
    
    <footer class="py-3 text-center" style="position: fixed; bottom: 0; width: 100%; z-index: 10; background: transparent;">
        <small style="color: rgba(234, 231, 223, 0.2); font-family: 'Cinzel', serif; letter-spacing: 2px;">
            &copy; <?php echo date('Y'); ?> FAHMAI. All rights reserved.
        </small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <script>
        // 1. แอนิเมชั่นเปิดตัวเส้นสายคำว่า FAHMAI
        const introTl = gsap.timeline();
        introTl.to("#topLine", { scaleX: 1, duration: 1.4, ease: "power4.inOut" })
        .to("#mainBrand span", { opacity: 1, y: 0, duration: 1, stagger: 0.15, ease: "power3.out" }, "-=0.4")
        .to("#subBrand", { opacity: 1, duration: 0.8, ease: "power2.out" }, "-=0.2")
        .to("#bottomLine", { scaleX: 1, duration: 1.2, ease: "power4.inOut" }, "-=0.6");

        // 2. ลอจิกควบคุมการคลิกเปลี่ยนมิติหน้าจอ
        const clickTrigger = document.getElementById("clickTrigger");
        if (clickTrigger) {
            clickTrigger.addEventListener("click", function() {
                const transitionTl = gsap.timeline();
                
                transitionTl.to("#introOverlay", {
                    opacity: 0,
                    duration: 1.2,
                    ease: "power2.inOut",
                    onComplete: () => {
                        document.getElementById("introOverlay").style.display = "none";
                        
                        const conceptContainer = document.getElementById("conceptSection");
                        if (conceptContainer) {
                            conceptContainer.classList.add("show-concept");
                            
                            // เปิดระบบคำนวณละอองฝุ่นทันทีที่หน้าจอเปิดตัว
                            initGoldenDust();
                            
                            gsap.to(".concept-reveal", {
                                opacity: 1,
                                y: 0,
                                duration: 1.4,
                                stagger: 0.2,
                                ease: "power3.out"
                            });
                        }
                    }
                });
            });
        }

        // 3. 🌟 เครื่องยนต์จำลองละอองฝุ่นทองคำสลัว (Ultra-Subtle Golden Dust Engine)
        function initGoldenDust() {
            const canvas = document.getElementById('particleCanvas');
            if (!canvas) return;
            
            const ctx = canvas.getContext('2d');
            let particlesArray = [];
            
            function setCanvasSize() {
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;
            }
            window.addEventListener('resize', setCanvasSize);
            setCanvasSize();

            // โครงสร้างของละอองฝุ่นแต่ละเม็ด
            class DustParticle {
                constructor() {
                    this.reset();
                    this.y = Math.random() * canvas.height; // กระจายตัวสุ่มทั่วจอตั่งแต่เริ่ม
                }
                reset() {
                    this.x = Math.random() * canvas.width;
                    this.y = canvas.height + Math.random() * 20; // เริ่มต้นจากขอบล่างจอ
                    this.size = Math.random() * 1.5 + 0.3;       // เม็ดละเอียดเล็กๆ ไม่หนาเตอะ
                    this.speedY = Math.random() * 0.3 + 0.08;    // ความเร็วลอยขึ้นแบบเอื่อยเฉื่อยสโลว์โมชั่น
                    this.speedX = Math.random() * 0.15 - 0.075;   // ลอยส่ายซ้ายขวาตามแรงลมจางๆ
                    this.opacity = Math.random() * 0.4 + 0.1;     // ค่าความโปร่งแสงบางเบา
                }
                update() {
                    this.y -= this.speedY;
                    this.x += this.speedX;
                    // ถ้าลอยพ้นขอบบน หรือจางหาย ให้กลับไปเริ่มต้นใหม่ด้านล่าง
                    if (this.y < 0) {
                        this.reset();
                    }
                }
                draw() {
                    ctx.fillStyle = `rgba(191, 160, 48, ${this.opacity})`;
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fill();
                }
            }

            // สั่งสร้างละอองฝุ่นหมุนเวียนในระบบ (60 เม็ดกำลังหรู ไม่รกสายตา)
            function setup() {
                particlesArray = [];
                for (let i = 0; i < 60; i++) {
                    particlesArray.push(new DustParticle());
                }
            }

            // ลูปแอนิเมชั่นอัปเดตตำแหน่งเฟรมต่อเฟรม
            function loop() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                for (let i = 0; i < particlesArray.length; i++) {
                    particlesArray[i].update();
                    particlesArray[i].draw();
                }
                requestAnimationFrame(loop);
            }

            setup();
            loop();
        }
    </script>
</body>
</html>