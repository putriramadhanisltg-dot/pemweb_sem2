<?php
// includes/footer.php
?>
<!-- FOOTER - 12 Grid dengan Bootstrap Alerts -->
<div class="col-12 p-0 mt-auto">
    <footer style="background:#0f3460; border-top: 3px solid #e94560;">
        <div class="container-fluid px-4 py-3">
            <!-- Bootstrap Alert sebagai info footer -->
            <div class="alert alert-dark d-flex align-items-center mb-2 py-2" role="alert"
                 style="background:rgba(255,255,255,0.05); border-color:#e94560; color:#adb5bd;">
                <i class="bi bi-info-circle-fill me-2" style="color:#e94560;"></i>
                <div class="small">
                    <strong class="text-white">Tugas 1 — Personal Home Page</strong> |
                    Mata Kuliah: Pemrograman Web |
                    Bootstrap 5 + PHP + MySQL
                </div>
            </div>

            <div class="alert alert-dark d-flex align-items-center mb-0 py-2" role="alert"
                 style="background:rgba(233,69,96,0.1); border-color:#533483; color:#adb5bd;">
                <i class="bi bi-c-circle me-2" style="color:#533483;"></i>
                <div class="small">
                    &copy; <?= date('Y') ?> — Dibuat dengan <i class="bi bi-heart-fill text-danger mx-1"></i> menggunakan
                    <a href="https://getbootstrap.com" target="_blank" class="text-warning text-decoration-none">Bootstrap 5</a> &
                    <a href="https://bootswatch.com" target="_blank" class="text-warning text-decoration-none">Bootswatch</a>
                </div>
            </div>
        </div>
    </footer>
</div>
