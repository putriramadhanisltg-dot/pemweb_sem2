<?php
// includes/menu.php
$currentPage = $_GET['page'] ?? 'home';
$user = getCurrentUser();
?>
<!-- MENU - 12 Grid dengan Bootstrap Navbar -->
<div class="col-12 p-0">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#0f3460;">
        <div class="container-fluid px-3">
            <a class="navbar-brand fw-bold" href="index.php?page=home">
                <i class="bi bi-code-slash me-1" style="color:#e94560;"></i>MyPortfolio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage=='home'?'active fw-bold':'' ?>" href="index.php?page=home">
                            <i class="bi bi-house-fill me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage=='about'?'active fw-bold':'' ?>" href="index.php?page=about">
                            <i class="bi bi-person-fill me-1"></i>About Me
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $currentPage=='contact'?'active fw-bold':'' ?>" href="index.php?page=contact">
                            <i class="bi bi-chat-dots-fill me-1"></i>Contact Me
                        </a>
                    </li>
                    <!-- My Studies Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= in_array($currentPage,['level','studies'])?'active fw-bold':'' ?>"
                           href="#" id="studiesDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-book-fill me-1"></i>My Studies
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="studiesDropdown">
                            <li>
                                <a class="dropdown-item <?= $currentPage=='level'?'active':'' ?>" href="index.php?page=level">
                                    <i class="bi bi-list-ol me-1"></i>Level
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item <?= $currentPage=='studies'?'active':'' ?>" href="index.php?page=studies">
                                    <i class="bi bi-mortarboard me-1"></i>Studies
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Auth Section -->
                <ul class="navbar-nav ms-auto">
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-warning fw-bold" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-person-check-fill me-1"></i>
                                <?= htmlspecialchars($_SESSION['username']) ?>
                                <span class="badge bg-secondary ms-1"><?= $_SESSION['role'] ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                <li><span class="dropdown-item-text text-muted small">Login sebagai:</span></li>
                                <li><span class="dropdown-item-text fw-bold"><?= htmlspecialchars($_SESSION['username']) ?></span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="index.php?page=logout">
                                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                                </a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $currentPage=='login'?'active':'' ?>" href="index.php?page=login">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Login
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
