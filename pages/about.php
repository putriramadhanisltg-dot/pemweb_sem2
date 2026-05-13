<?php
// pages/about.php
?>
<div class="mb-4">
    <h4 class="fw-bold mb-3" style="color:#e94560;"><i class="bi bi-person-fill me-2"></i>About Me</h4>

    
    <div class="accordion" id="aboutAccordion">

        <!-- Hobi -->
        <div class="accordion-item border-0 mb-2" style="background:#1a1a2e; border-radius:8px; overflow:hidden;">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHobi"
                        style="background:#0f3460; color:#fff; font-weight:600;">
                    <i class="bi bi-heart-fill me-2" style="color:#e94560;"></i>Hobi Saya
                </button>
            </h2>
            <div id="collapseHobi" class="accordion-collapse collapse show" data-bs-parent="#aboutAccordion">
                <div class="accordion-body" style="background:#1a1a2e; color:#adb5bd;">
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 rounded" style="background:#0f3460;">
                                <i class="bi bi-camera-fill" style="font-size:1.8rem;color:#e94560;"></i>
                                <p class="mb-0 mt-2 small text-white">Fotografi</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 rounded" style="background:#0f3460;">
                                <i class="bi bi-controller" style="font-size:1.8rem;color:#e94560;"></i>
                                <p class="mb-0 mt-2 small text-white">Gaming</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 rounded" style="background:#0f3460;">
                                <i class="bi bi-music-note-beamed" style="font-size:1.8rem;color:#e94560;"></i>
                                <p class="mb-0 mt-2 small text-white">Musik</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="text-center p-3 rounded" style="background:#0f3460;">
                                <i class="bi bi-bicycle" style="font-size:1.8rem;color:#e94560;"></i>
                                <p class="mb-0 mt-2 small text-white">Bersepeda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Favorite Menu / Makanan -->
        <div class="accordion-item border-0 mb-2" style="background:#1a1a2e; border-radius:8px; overflow:hidden;">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFavorite"
                        style="background:#0f3460; color:#fff; font-weight:600;">
                    <i class="bi bi-cup-hot-fill me-2" style="color:#e94560;"></i>Favorite Menu
                </button>
            </h2>
            <div id="collapseFavorite" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                <div class="accordion-body" style="background:#1a1a2e; color:#adb5bd;">
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color:#e94560;"></i><span class="text-white">Nasi Goreng</span> — Makanan favorit sejak kecil</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color:#e94560;"></i><span class="text-white">Rendang</span> — Kuliner Nusantara terbaik</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color:#e94560;"></i><span class="text-white">Mie Ayam</span> — Sarapan favorit</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill me-2" style="color:#e94560;"></i><span class="text-white">Es Teh Manis</span> — Minuman harian</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pengalaman Organisasi -->
        <div class="accordion-item border-0 mb-2" style="background:#1a1a2e; border-radius:8px; overflow:hidden;">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrg"
                        style="background:#0f3460; color:#fff; font-weight:600;">
                    <i class="bi bi-people-fill me-2" style="color:#e94560;"></i>Pengalaman Organisasi
                </button>
            </h2>
            <div id="collapseOrg" class="accordion-collapse collapse" data-bs-parent="#aboutAccordion">
                <div class="accordion-body" style="background:#1a1a2e; color:#adb5bd;">
                    <div class="timeline">
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <div style="width:12px;height:12px;background:#e94560;border-radius:50%;margin-top:5px;"></div>
                            </div>
                            <div>
                                <h6 class="text-white mb-0">Ketua OSIS SMAN 1 Sosa </h6>
                                <small class="text-muted">2022 - 2024</small>
                                <p class="small mt-1">Memimpin organisasi siswa, mengelola berbagai kegiatan sekolah dan ekstrakurikuler.</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="me-3">
                                <div style="width:12px;height:12px;background:#533483;border-radius:50%;margin-top:5px;"></div>
                            </div>
                            <div>
                                <h6 class="text-white mb-0">Anggota Sisfor</h6>
                                <small class="text-muted">2026 - 2028</small>
                                <p class="small mt-1">Divisi HUMAS.</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
