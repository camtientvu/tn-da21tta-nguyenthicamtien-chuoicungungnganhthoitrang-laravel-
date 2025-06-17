<!-- Footer -->
<footer class="py-5 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5><i class="fas fa-industry me-2"></i>Fashion SCM</h5>
                <p>
                    <i class="fas fa-map-marker-alt me-2"></i>126 Nguyễn Thiện Thành, Phường 5, Trà Vinh
                </p>
                <p><i class="fas fa-phone me-2"></i>(+84) 09698 98713</p>
                <p><i class="fas fa-envelope me-2"></i>fashion_scm@gmail.com</p>
            </div>
            <div class="col-md-6">
                <h5><i class="fas fa-map me-2"></i>Bản đồ</h5>
                <iframe
                    src="https://www.google.com/maps?q=10.762622,106.660172&z=15&output=embed"
                    width="100%"
                    height="200"
                    style="border: 0; border-radius: 8px"
                    allowfullscreen
                    loading="lazy"></iframe>
            </div>
        </div>
        <hr />
        <div class="text-center">
            © 2025 -2026 Hệ Thống Quản Lý Chuỗi Cung Ứng Ngành Thời Trang.
        </div>
    </div>
</footer>

<script>
    const canvas = document.getElementById('seasonCanvas');
    const ctx = canvas.getContext('2d');
    let width = window.innerWidth;
    let height = window.innerHeight;
    canvas.width = width;
    canvas.height = height;

    const season = getCurrentSeason();
    const particles = [];
    const splashes = [];
    const total = 100;

    function getCurrentSeason() {
        const month = new Date().getMonth() + 1;
        if ([3, 4, 5].includes(month)) return 'spring';
        if ([7, 8].includes(month)) return 'summer';
        if ([6, 9, 10, 11].includes(month)) return 'autumn';
        return 'winter';
    }

    function createParticles() {
        for (let i = 0; i < total; i++) {
            particles.push({
                x: Math.random() * width,
                y: Math.random() * height,
                size: Math.random() * 6 + 4,
                speedY: season === 'summer' ? Math.random() * 1.2 + 0.4 : Math.random() * 0.8 + 0.3,
                speedX: season === 'summer' ? (Math.random() - 0.5) * 1.2 : (Math.random() * 0.6 - 0.3),
                angle: Math.random() * 180,
                rotateSpeed: Math.random() * 2 - 1,
                opacity: Math.random() * 0.8 + 0.2
            });
        }
    }

    function drawParticles() {
        ctx.clearRect(0, 0, width, height);
        for (let p of particles) {
            ctx.save();
            ctx.globalAlpha = p.opacity;
            ctx.translate(p.x, p.y);
            ctx.rotate((p.angle * Math.PI) / 180);

            switch (season) {
                case 'spring':
                    drawPetal(p.size);
                    break;
                case 'summer':
                    drawRain(p.size);
                    break;
                case 'autumn':
                    drawLeaf(p.size);
                    break;
                case 'winter':
                    drawSnow(p.size);
                    break;
            }

            ctx.restore();
        }

        drawSplashes();
        moveParticles();
    }

    function drawPetal(size) {
        ctx.fillStyle = '#ff69b4';
        ctx.beginPath();
        ctx.ellipse(0, 0, size / 2, size, 0, 0, 2 * Math.PI);
        ctx.fill();
    }

    // Chỉnh Mưa
function drawRain(size) {
    ctx.save();
    ctx.shadowColor = 'rgba(110, 198, 255, 0.3)';
    ctx.shadowBlur = 6;
    ctx.fillStyle = 'rgba(110, 198, 255, 0.7)'; // Màu xanh ánh sáng
    ctx.beginPath();
    ctx.arc(0, 0, size / 3, 0, Math.PI * 2); // Hạt mưa tròn
    ctx.fill();
    ctx.restore();
}

    /////

    function drawLeaf(size) {
        ctx.fillStyle = '#ffa500';
        ctx.beginPath();
        ctx.moveTo(0, 0);
        ctx.quadraticCurveTo(size, size * 1.5, 0, size * 3);
        ctx.quadraticCurveTo(-size, size * 1.5, 0, 0);
        ctx.fill();
    }

    function drawSnow(size) {
        ctx.fillStyle = '#ffffff';
        ctx.beginPath();
        ctx.arc(0, 0, size / 2, 0, Math.PI * 2);
        ctx.fill();
    }

    function moveParticles() {
        for (let p of particles) {
            p.y += p.speedY;
            p.x += p.speedX;
            p.angle += p.rotateSpeed;

            if (p.y > height) {
                if (season === 'summer') {
                    createSplash(p.x, height);
                }
                p.y = -10;
                p.x = Math.random() * width;
            }
        }

        for (let i = splashes.length - 1; i >= 0; i--) {
            const s = splashes[i];
            s.radius += 0.5;
            s.alpha -= 0.02;
            if (s.alpha <= 0) splashes.splice(i, 1);
        }
    }

    function createSplash(x, y) {
        splashes.push({
            x: x,
            y: y - 2,
            radius: 1,
            alpha: 0.5
        });
    }

    function drawSplashes() {
        for (let s of splashes) {
            ctx.beginPath();
            ctx.arc(s.x, s.y, s.radius, 0, Math.PI * 2);
            ctx.strokeStyle = `rgba(110, 198, 255, ${s.alpha})`;
            ctx.lineWidth = 1;
            ctx.stroke();
        }
    }

    function animate() {
        drawParticles();
        requestAnimationFrame(animate);
    }

    window.addEventListener('resize', () => {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width;
        canvas.height = height;
    });

    // ⚡️ Summer lightning & rainbow
    if (season === 'summer') {
        function drawLightning() {
            const startX = Math.random() * width;
            let x = startX,
                y = 0;

            ctx.strokeStyle = '#ffffff';
            ctx.lineWidth = 2.5;
            ctx.shadowBlur = 15;
            ctx.shadowColor = '#ffffff';

            ctx.beginPath();
            ctx.moveTo(x, y);

            while (y < height / 1.5) {
                const dx = (Math.random() - 0.5) * 30;
                const dy = Math.random() * 30;
                x += dx;
                y += dy;
                ctx.lineTo(x, y);
            }

            ctx.stroke();

            drawRainbow();
            document.body.style.backgroundColor = 'rgba(255,255,255,0.1)';
            setTimeout(() => document.body.style.backgroundColor = '', 150);
        }

        function drawRainbow() {
            const gradient = ctx.createLinearGradient(0, height / 2, width, height / 2);
            gradient.addColorStop(0, 'rgba(255, 0, 0, 0.2)');
            gradient.addColorStop(0.2, 'rgba(255, 165, 0, 0.2)');
            gradient.addColorStop(0.4, 'rgba(255, 255, 0, 0.2)');
            gradient.addColorStop(0.6, 'rgba(0, 255, 0, 0.2)');
            gradient.addColorStop(0.8, 'rgba(0, 0, 255, 0.2)');
            gradient.addColorStop(1, 'rgba(128, 0, 128, 0.2)');

            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(width / 2, height, width / 1.5, Math.PI, Math.PI * 2);
            ctx.fill();
        }

        setInterval(() => {
            if (Math.random() < 0.4) drawLightning();
        }, 5000);
    }

    createParticles();
    animate();
</script>



</body>


<script>
    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        text: '{{ session('
        success ') }}',
        confirmButtonText: 'OK'
    });
    @endif

    @if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Lỗi khi thêm sản phẩm vượt số lượng hoặc không đúng',
        text: '{{ session('
        error ') }}',
        confirmButtonText: 'OK'
    });
    @endif
</script>


<!-- Thêm vào cuối body -->
<script>
    document.addEventListener('click', function(e) {
        const heart = document.createElement("div");
        heart.innerHTML = "💖";
        heart.style.position = "fixed";
        heart.style.left = e.pageX + "px";
        heart.style.top = e.pageY + "px";
        heart.style.fontSize = "24px";
        heart.style.pointerEvents = "none";
        heart.style.opacity = 1;
        document.body.appendChild(heart);

        let rise = 0;
        const timer = setInterval(() => {
            rise++;
            heart.style.top = (e.pageY - rise) + "px";
            heart.style.opacity -= 0.02;
            if (rise > 100) {
                clearInterval(timer);
                document.body.removeChild(heart);
            }
        }, 10);
    });
</script>


</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="/theme/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/theme/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->

<!-- Sparkline -->
<script src="/theme/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/theme/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/theme/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/theme/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/theme/admin/plugins/moment/moment.min.js"></script>
<script src="/theme/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/theme/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/theme/admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/theme/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/theme/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/theme/admin/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/theme/admin/dist/js/pages/dashboard.js"></script>



<!-- DataTables  & Plugins -->
<script src="/theme/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/theme/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/theme/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/theme/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/theme/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/theme/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/theme/admin/plugins/jszip/jszip.min.js"></script>
<script src="/theme/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/theme/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/theme/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/theme/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/theme/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/theme/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/theme/admin/dist/js/demo.js"></script>
<!-- Page specific script -->
<style>
    .dataTables_filter input {
        width: 300px;
        /* Set the width of the search box */
        padding: 8px;
        /* Add some padding */
        border: 1px solid #ccc;
        /* Border color */
        border-radius: 4px;
        /* Rounded corners */
        font-size: 14px;
        /* Font size */
    }

    .dataTables_filter {
        margin-bottom: 10px;
        /* Space below the filter */
    }
</style>

<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true, // Allow changing the number of rows displayed
            "pageLength": 10, // Display 5 rows per page by default
            "searching": true, // Enable search box
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ mục",
                "zeroRecords": "Không tìm thấy kết quả",
                "info": "Hiển thị trang _PAGE_ trên _PAGES_",
                "infoEmpty": "Không có dữ liệu",
                "infoFiltered": "(lọc từ _MAX_ mục)",
                "search": "Tìm kiếm:",
                "paginate": {
                    "first": "Đầu tiên",
                    "last": "Cuối cùng",
                    "next": "Tiếp theo",
                    "previous": "Trước đó"
                }
            }
        });
    });
</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/684828ac77026219101b6440/1itcttoua';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->