<?php
// pages/level.php
requireLogin();

$msg = '';
$msgType = 'success';

// CREATE / UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $id   = intval($_POST['id'] ?? 0);

    if (empty($nama)) {
        $msg = 'Nama level wajib diisi.';
        $msgType = 'danger';
    } elseif ($id > 0) {
        // UPDATE
        $stmt = $conn->prepare("UPDATE level SET nama=? WHERE id=?");
        $stmt->bind_param("si", $nama, $id);
        $stmt->execute();
        $msg = 'Level berhasil diperbarui!';
    } else {
        // INSERT
        $stmt = $conn->prepare("INSERT INTO level (nama) VALUES (?)");
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $msg = 'Level berhasil ditambahkan!';
    }
}

// DELETE
if (isset($_GET['delete']) && intval($_GET['delete']) > 0) {
    $delId = intval($_GET['delete']);
    $conn->query("DELETE FROM level WHERE id=$delId");
    $msg = 'Level berhasil dihapus.';
    $msgType = 'warning';
}

// EDIT - fetch data
$editData = null;
if (isset($_GET['edit']) && intval($_GET['edit']) > 0) {
    $editId = intval($_GET['edit']);
    $res = $conn->query("SELECT * FROM level WHERE id=$editId");
    $editData = $res->fetch_assoc();
}

// READ
$levels = $conn->query("SELECT * FROM level ORDER BY id ASC");
?>

<div class="mb-4">
    <h4 class="fw-bold mb-3" style="color:#e94560;">
        <i class="bi bi-list-ol me-2"></i>CRUD Level Pendidikan
    </h4>

    <?php if ($msg): ?>
    <div class="alert alert-<?= $msgType ?> alert-dismissible fade show py-2 small" role="alert">
        <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <!-- Form Add/Edit -->
    <div class="card border-0 mb-4" style="background:#1a1a2e; color:#fff;">
        <div class="card-header border-0 fw-bold" style="background:#0f3460; color:#fff;">
            <i class="bi bi-<?= $editData ? 'pencil' : 'plus-circle' ?>-fill me-2" style="color:#e94560;"></i>
            <?= $editData ? 'Edit Level' : 'Tambah Level Baru' ?>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?page=level" class="row g-2 align-items-end">
                <?php if ($editData): ?>
                <input type="hidden" name="id" value="<?= $editData['id'] ?>">
                <?php endif; ?>
                <div class="col-md-8">
                    <label class="form-label small text-muted">Nama Level (contoh: TK, SD, SMP, SMA, S1...)</label>
                    <input type="text" name="nama" class="form-control"
                           style="background:#0f3460;border-color:#533483;color:#fff;"
                           value="<?= htmlspecialchars($editData['nama'] ?? '') ?>"
                           placeholder="Masukkan nama level" required>
                </div>
                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn flex-fill fw-bold" style="background:#e94560;color:#fff;border:none;">
                        <i class="bi bi-save me-1"></i><?= $editData ? 'Update' : 'Simpan' ?>
                    </button>
                    <?php if ($editData): ?>
                    <a href="index.php?page=level" class="btn btn-outline-secondary">Batal</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="card border-0" style="background:#1a1a2e; color:#fff;">
        <div class="card-header border-0 fw-bold" style="background:#0f3460; color:#fff;">
            <i class="bi bi-table me-2" style="color:#e94560;"></i>Data Level
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead style="background:#533483;">
                        <tr>
                            <th width="60">ID</th>
                            <th>Nama Level</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($levels->num_rows > 0):
                        while ($row = $levels->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td class="text-center">
                                <a href="index.php?page=level&edit=<?= $row['id'] ?>"
                                   class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil"></i></a>
                                <a href="index.php?page=level&delete=<?= $row['id'] ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Hapus level ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="3" class="text-center text-muted py-4">Belum ada data level.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
