<?php
ob_start(); // ← INI SOLUSINYA, harus di baris paling atas
require_once 'config.php';

$page = $_GET['page'] ?? 'home';
$allowedPages = ['home', 'about', 'contact', 'login', 'logout', 'level', 'studies'];

if (!in_array($page, $allowedPages)) {
    $page = 'home';
}

if ($page === 'logout') {
    session_destroy();
    header("Location: index.php?page=home");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Home Page — Tugas 1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #121212; font-family: 'Segoe UI', sans-serif; }
        .accordion-button::after { filter: invert(1); }
        .accordion-button:not(.collapsed) { box-shadow: none; }
        .table-dark { --bs-table-bg: #1a1a2e; --bs-table-hover-bg: rgba(233,69,96,0.1); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #121212; }
        ::-webkit-scrollbar-thumb { background: #e94560; border-radius: 3px; }
        .form-control:focus, .form-select:focus {
            border-color: #e94560 !important;
            box-shadow: 0 0 0 0.2rem rgba(233,69,96,0.2) !important;
            color: #fff !important;
        }
        #main-content { min-height: 400px; background: #121212; padding: 1.5rem; color: #eee; }
        .list-group-item:hover { background: rgba(233,69,96,0.15) !important; color: #fff !important; }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div class="row g-0">
        <?php include 'includes/header.php'; ?>
        <?php include 'includes/menu.php'; ?>
        <div class="col-12">
            <div class="row g-0">
                <?php include 'includes/sidebar.php'; ?>
                <div class="col-md-9" id="main-content">
                    <?php
                    $pageFile = "pages/{$page}.php";
                    if (file_exists($pageFile)) {
                        include $pageFile;
                    } else {
                        echo '<div class="alert alert-danger">Halaman tidak ditemukan.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>