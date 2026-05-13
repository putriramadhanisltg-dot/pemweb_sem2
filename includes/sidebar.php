<?php
// includes/sidebar.php
$currentPage = $_GET['page'] ?? 'home';
?>
<!-- SIDEBAR - 3 Grid dengan Bootstrap List Group -->
<div class="col-md-3 p-0">
    <div class="sidebar-wrapper h-100" style="background:#16213e; min-height: 400px;">
        <div class="p-3">
            <!-- Profile Mini -->
            <div class="text-center mb-4">
                <img src="/web_saya/assets/img/putri.jpeg"
                class="rounded-circle"
            style="width:70px;height: 70px;px;object-fit:cover;"
                </div>
                <p class="text-white fw-bold mb-0 small">Putri Ramadhani Silitonga</p>
                <small class="text-muted">Mahasiswi Aktif</small>
            </div>

            <!-- Navigation List Group -->
            <p class="text-uppercase text-muted small fw-bold mb-2 px-1" style="letter-spacing:1px;">Menu</p>
            <div class="list-group list-group-flush rounded">
                <a href="index.php?page=home"
                   class="list-group-item list-group-item-action border-0 <?= $currentPage=='home'?'active':'' ?>"
                   style="background:<?= $currentPage=='home'?'#e94560':'transparent' ?>;color:<?= $currentPage=='home'?'#fff':'#adb5bd' ?>;">
                    <i class="bi bi-house-fill me-2"></i>Home
                </a>
                <a href="index.php?page=about"
                   class="list-group-item list-group-item-action border-0 <?= $currentPage=='about'?'active':'' ?>"
                   style="background:<?= $currentPage=='about'?'#e94560':'transparent' ?>;color:<?= $currentPage=='about'?'#fff':'#adb5bd' ?>;">
                    <i class="bi bi-person-fill me-2"></i>About Me
                </a>
                <a href="index.php?page=contact"
                   class="list-group-item list-group-item-action border-0 <?= $currentPage=='contact'?'active':'' ?>"
                   style="background:<?= $currentPage=='contact'?'#e94560':'transparent' ?>;color:<?= $currentPage=='contact'?'#fff':'#adb5bd' ?>;">
                    <i class="bi bi-chat-dots-fill me-2"></i>Contact Me
                </a>
            </div>

            <p class="text-uppercase text-muted small fw-bold mb-2 px-1 mt-3" style="letter-spacing:1px;">My Studies</p>
            <div class="list-group list-group-flush rounded">
                <a href="index.php?page=level"
                   class="list-group-item list-group-item-action border-0 <?= $currentPage=='level'?'active':'' ?>"
                   style="background:<?= $currentPage=='level'?'#e94560':'transparent' ?>;color:<?= $currentPage=='level'?'#fff':'#adb5bd' ?>;">
                    <i class="bi bi-list-ol me-2"></i>Level
                </a>
                <a href="index.php?page=studies"
                   class="list-group-item list-group-item-action border-0 <?= $currentPage=='studies'?'active':'' ?>"
                   style="background:<?= $currentPage=='studies'?'#e94560':'transparent' ?>;color:<?= $currentPage=='studies'?'#fff':'#adb5bd' ?>;">
                    <i class="bi bi-mortarboard me-2"></i>Studies
                </a>
            </div>

            <!-- Quick Stats -->
            <div class="mt-4 p-3 rounded" style="background:#0f3460;">
                <p class="text-white small fw-bold mb-2"><i class="bi bi-bar-chart-fill me-1" style="color:#e94560;"></i>Quick Stats</p>
                <div class="d-flex justify-content-between text-muted small mb-1">
                    <span>Pendidikan</span><span class="text-white">5 jenjang</span>
                </div>
                <div class="d-flex justify-content-between text-muted small mb-1">
                    <span>Hobi</span><span class="text-white">4 item</span>
                </div>
                <div class="d-flex justify-content-between text-muted small">
                    <span>Sosmed</span><span class="text-white">4 platform</span>
                </div>
            </div>
        </div>
    </div>
</div>
