<!-- master-site/components/footer.php -->
    
    <footer class="py-3 text-center" style="position: fixed; bottom: 0; width: 100%; z-index: 10; background: transparent;">
        <small style="color: rgba(234, 231, 223, 0.2); font-family: 'Cinzel', serif; letter-spacing: 2px;">
            &copy; <?php echo date('Y'); ?> FAHMAI. All rights reserved.
        </small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>

    <script>
        // 1. แอนิเมชั่นเปิดตัวเส้นสายคำว่า FAHMAI หน้าวาร์ปด่านแรก
        const introTl = gsap.timeline();
        introTl.to("#topLine", { scaleX: 1, duration: 1.4, ease: "power4.inOut" })
        .to("#mainBrand span", { opacity: 1, y: 0, duration: 1, stagger: 0.15, ease: "power3.out" }, "-=0.4")
        .to("#subBrand", { opacity: 1, duration: 0.8, ease: "power2.out" }, "-=0.2")
        .to("#bottomLine", { scaleX: 1, duration: 1.2, ease: "power4.inOut" }, "-=0.6");

        // 2. ลอจิกควบคุมการคลิกผ่านหน้าจอ Splash Screen เข้าห้องมืดสลัว
        const clickTrigger = document.getElementById("clickTrigger");
        if (clickTrigger) {
            clickTrigger.addEventListener("click", function() {
                gsap.to("#introOverlay", {
                    opacity: 0,
                    duration: 1.2,
                    ease: "power2.inOut",
                    onComplete: () => {
                        document.getElementById("introOverlay").style.display = "none";
                        
                        const conceptContainer = document.getElementById("conceptSection");
                        if (conceptContainer) {
                            conceptContainer.classList.add("show-concept");
                            initGoldenDust(); // ละอองฝุ่นทองเริ่มรันยาวๆ
                            
                            gsap.to("#darkRoomGateContent .concept-reveal", {
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

        // 3. 🌟 ลอจิกไม้ตายฉากเปลี่ยนผ่านมิติ (The Cinematic Enterprise Transition)เมื่อกด ENTER —
        const btnEnterHomepage = document.getElementById("btnEnterHomepage");
        if (btnEnterHomepage) {
            btnEnterHomepage.addEventListener("click", function(e) {
                e.preventDefault();
                
                const conceptContainer = document.getElementById("conceptSection");
                const trueHomepageSection = document.getElementById("trueHomepageSection");
                const globalNavbar = document.getElementById("globalNavbar");
                const navigationDots = document.getElementById("navigationDots");
                
                const transitionTimeline = gsap.timeline();
                
                // สเต็ป ก: สั่งดีดตัวอักษรข้อความดั้งเดิมจมหายลงไปข้างล่าง
                transitionTimeline.to("#darkRoomGateContent", {
                    opacity: 0,
                    y: 40,
                    duration: 0.8,
                    ease: "power2.in",
                    onComplete: () => {
                        document.getElementById("darkRoomGateContent").style.display = "none";
                        if(navigationDots) navigationDots.style.display = "none";
                        
                        // ระเบิดขยายวงแสงไฟฉายหลังฉากให้กระจายสว่างขึ้นนุ่มๆ คุมโทน
                        conceptContainer.classList.add("light-expanded");
                        // ปลดล็อกระบบ Body บังคับเบราว์เซอร์ให้ไถสกรอลล์เมาส์แนวดิ่งได้ปกติแล้ว!
                        document.body.classList.add("homepage-unlocked");
                    }
                })
                // สเต็ป ข: ดึงแถบเมนูนำทางลับหล่นลงมาจากขอบบนจออย่างพรีเมียม
                .to(globalNavbar, {
                    onStart: () => globalNavbar.classList.add("nav-visible")
                })
                // สเต็ป ค: สไลด์ม้วนดึงข้อมูลบอร์ดตัวจริงโฮมเพจ สวนขยับขึ้นมาจากล่างจออย่างอลังการ
                .to(trueHomepageSection, {
                    onStart: () => trueHomepageSection.classList.add("content-reveal"),
                    duration: 0.5
                })
                // สเต็ป ง: สั่งลากหน้าจอให้สกรอลล์เลื่อนลงมาโฟกัสที่เนื้อหาโฮมเพจท่อนล่างให้อัตโนมัติแบบนุ่มๆ
                .to(window, {
                    scrollTo: { y: window.innerHeight * 0.35 },
                    duration: 1.6,
                    ease: "power3.inOut"
                }, "-=0.4");
            });
        }

        // 4. เครื่องยนต์จำลองละอองฝุ่นทองคำสลัว (Ultra-Subtle Golden Dust Engine)
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

            class DustParticle {
                constructor() { this.reset(); this.y = Math.random() * canvas.height; }
                reset() {
                    this.x = Math.random() * canvas.width;
                    this.y = canvas.height + Math.random() * 20;
                    this.size = Math.random() * 1.5 + 0.3;
                    this.speedY = Math.random() * 0.3 + 0.08;
                    this.speedX = Math.random() * 0.15 - 0.075;
                    this.opacity = Math.random() * 0.4 + 0.1;
                }
                update() {
                    this.y -= this.speedY; this.x += this.speedX;
                    if (this.y < 0) this.reset();
                }
                draw() {
                    ctx.fillStyle = `rgba(191, 160, 48, ${this.opacity})`; ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2); ctx.fill();
                }
            }
            function setup() {
                for (let i = 0; i < 60; i++) { particlesArray.push(new DustParticle()); }
            }
            function loop() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                for (let i = 0; i < particlesArray.length; i++) {
                    particlesArray[i].update(); particlesArray[i].draw();
                }
                requestAnimationFrame(loop);
            }
            setup(); loop();
        }
    </script>
</body>
</html>