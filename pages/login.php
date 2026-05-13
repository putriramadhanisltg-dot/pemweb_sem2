<?php
// pages/login.php
if (isLoggedIn()) {
    header("Location: index.php?page=home");
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = 'Username dan password wajib diisi.';
    } else {
        $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            header("Location: index.php?page=home");
            exit();
        } else {
            $error = 'Username atau password salah!';
        }
    }
}
?>

<div class="d-flex justify-content-center align-items-center" style="min-height:400px;">
    <div class="card border-0 shadow-lg" style="width:420px; background:#1a1a2e; color:#fff;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <div class="mx-auto mb-3" style="width:60px;height:60px;background:#e94560;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-lock-fill text-white" style="font-size:1.5rem;"></i>
                </div>
                <h4 class="fw-bold">Login</h4>
                <p class="text-muted small">Masuk untuk mengakses fitur CRUD</p>
            </div>

            <?php if ($error): ?>
            <div class="alert alert-danger py-2 small" role="alert">
                <i class="bi bi-exclamation-circle-fill me-1"></i><?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="index.php?page=login">
                <div class="mb-3">
                    <label class="form-label small text-muted">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:#0f3460;border-color:#533483;color:#adb5bd;">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="username" class="form-control"
                               style="background:#0f3460;border-color:#533483;color:#fff;"
                               placeholder="Masukkan username"
                               value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="form-label small text-muted">Password</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:#0f3460;border-color:#533483;color:#adb5bd;">
                            <i class="bi bi-key"></i>
                        </span>
                        <input type="password" name="password" class="form-control"
                               style="background:#0f3460;border-color:#533483;color:#fff;"
                               placeholder="Masukkan password">
                    </div>
                </div>
                <button type="submit" class="btn w-100 fw-bold" style="background:#e94560;color:#fff;border:none;">
                    <i class="bi bi-box-arrow-in-right me-1"></i>Login
                </button>
            </form>

            <div class="text-center mt-3">
                <small class="text-muted">Default: admin / password</small>
            </div>
        </div>
    </div>
</div>
