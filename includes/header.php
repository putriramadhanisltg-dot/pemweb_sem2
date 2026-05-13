<?php
// includes/header.php
?>
<!-- HEADER - 12 Grid dengan Bootstrap Carousel - TEMA PINK 🌸 -->
<div class="col-12 p-0">
    <div id="headerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-bg slide-1">
                    <div class="sakura-dots"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                        <div class="carousel-icon mb-3">
                            <i class="bi bi-person-circle" style="font-size:3rem; color:#fff;"></i>
                        </div>
                        <h1 class="display-4 fw-bold text-white">Selamat Datang 🌸</h1>
                        <p class="lead text-white" style="opacity:0.9;">Personal Home Page — Tugas 1 Web Programming</p>
                        <a href="index.php?page=home" class="btn btn-pink-outline btn-lg mt-2 px-4">Lihat Profil</a>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="carousel-bg slide-2">
                    <div class="sakura-dots"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                        <div class="carousel-icon mb-3">
                            <i class="bi bi-mortarboard-fill" style="font-size:3rem; color:#fff;"></i>
                        </div>
                        <h1 class="display-4 fw-bold text-white">Riwayat Pendidikan 🎓</h1>
                        <p class="lead text-white" style="opacity:0.9;">Jejak perjalanan akademik dari TK hingga Perguruan Tinggi</p>
                        <a href="index.php?page=studies" class="btn btn-pink-outline btn-lg mt-2 px-4">Lihat Studies</a>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="carousel-bg slide-3">
                    <div class="sakura-dots"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
                        <div class="carousel-icon mb-3">
                            <i class="bi bi-envelope-fill" style="font-size:3rem; color:#fff;"></i>
                        </div>
                        <h1 class="display-4 fw-bold text-white">Hubungi Saya 💌</h1>
                        <p class="lead text-white" style="opacity:0.9;">Terhubung melalui media sosial dan kontak yang tersedia</p>
                        <a href="index.php?page=contact" class="btn btn-pink-outline btn-lg mt-2 px-4">Kontak</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<style>
/* ===== CAROUSEL PINK THEME ===== */
.carousel-bg {
    height: 320px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

/* Slide 1 - Pink ke Magenta */
.slide-1 {
    background: linear-gradient(135deg, #afaaf6 0%, #286bf0 50%, #2b057d 100%);
}

/* Slide 2 - Rose ke Pink Gelap */
.slide-2 {
    background: linear-gradient(135deg, #1d0364 0%, hsl(256, 87%, 33%) 50%, #936dfb 100%);
}

/* Slide 3 - Pink Muda ke Ungu Pink */
.slide-3 {
    background: linear-gradient(135deg, #8996f6 0%, #6c43e8 50%, #06052e 100%);
}

/* Dekorasi titik-titik bunga di background */
.sakura-dots {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background-image:
        radial-gradient(circle, rgba(255,255,255,0.12) 2px, transparent 2px),
        radial-gradient(circle, rgba(255,255,255,0.08) 1px, transparent 1px);
    background-size: 40px 40px, 20px 20px;
    background-position: 0 0, 10px 10px;
    pointer-events: none;
}

.carousel-caption {
    position: relative;
    top: auto; left: auto; right: auto; bottom: auto;
    padding-top: 0;
    z-index: 2;
}

/* Tombol outline putih yang cantik */
.btn-pink-outline {
    background: transparent;
    border: 2px solid rgba(255,255,255,0.85);
    color: white;
    border-radius: 25px;
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    backdrop-filter: blur(4px);
}
.btn-pink-outline:hover {
    background: white;
    color: #c44569;
    border-color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}

/* Indikator carousel warna putih */
.carousel-indicators [data-bs-target] {
    background-color: rgba(255,255,255,0.5);
    border-radius: 50%;
    width: 10px;
    height: 10px;
    border: none;
}
.carousel-indicators .active {
    background-color: white;
}

/* Icon slide animasi masuk */
.carousel-icon i {
    filter: drop-shadow(0 2px 8px rgba(0,0,0,0.2));
}

/* Animasi teks saat slide aktif */
.carousel-item.active .carousel-caption h1 {
    animation: fadeSlideUp 0.6s ease both;
}
.carousel-item.active .carousel-caption p {
    animation: fadeSlideUp 0.6s ease 0.15s both;
}
.carousel-item.active .carousel-caption a {
    animation: fadeSlideUp 0.6s ease 0.3s both;
}
@keyframes fadeSlideUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}
</style>