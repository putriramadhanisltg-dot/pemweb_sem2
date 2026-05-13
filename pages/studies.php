<?php
// pages/studies.php
requireLogin();

$msg = '';
$msgType = 'success';

// Handle file upload helper
function uploadFoto($file) {
    if ($file['error'] === UPLOAD_ERR_NO_FILE) return null;
    $allowed = ['image/jpeg','image/png','image/gif','image/webp'];
    if (!in_array($file['type'], $allowed)) return false;
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'sekolah_' . time() . '_' . rand(100,999) . '.' . $ext;
    $dest = __DIR__ . '/../uploads/' . $filename;
    if (!is_dir(__DIR__ . '/../uploads')) mkdir(__DIR__ . '/../uploads', 0755, true);
    if (move_uploaded_file($file['tmp_name'], $dest)) return $filename;
    return false;
}
// CREATE / UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama        = trim($_POST['nama'] ?? '');
    $idlevel     = intval($_POST['idlevel'] ?? 0);
    $keterangan  = trim($_POST['keterangan'] ?? '');
    $tahun_lulus = intval($_POST['tahun_lulus'] ?? 0);
    $id          = intval($_POST['id'] ?? 0);
    
    // ✅ FIX 1: Ambil foto existing dengan benar
    $foto = isset($_POST['existing_foto']) ? trim($_POST['existing_foto']) : '';

    // ✅ FIX 2: Proses upload foto baru (jika ada)
    if (isset($_FILES['foto_sekolah']) && $_FILES['foto_sekolah']['error'] !== UPLOAD_ERR_NO_FILE) {
        $upload = uploadFoto($_FILES['foto_sekolah']);
        if ($upload !== false && $upload !== null) {
            $foto = $upload;
        } elseif ($upload === false) {
            $msg = 'Format foto tidak valid. Gunakan JPG, PNG, GIF, atau WEBP.';
            $msgType = 'danger';
            goto skip_save;
        }
    }

    if (empty($nama) || $idlevel <= 0) {
        $msg = 'Nama dan level wajib diisi.';
        $msgType = 'danger';
    } elseif ($id > 0) {
        // ✅ FIX 3: bind_param UPDATE = "sisssi" (6 parameter)
        // nama(s), idlevel(i), keterangan(s), tahun_lulus(i), foto_sekolah(s), id(i)
        $stmt = $conn->prepare("UPDATE studies SET nama=?, idlevel=?, keterangan=?, tahun_lulus=?, foto_sekolah=? WHERE id=?");
        $stmt->bind_param("sisssi", $nama, $idlevel, $keterangan, $tahun_lulus, $foto, $id);
        $stmt->execute();
        $msg = 'Data studies berhasil diperbarui!';
    } else {
        // ✅ FIX 4: bind_param INSERT = "sisss" (5 parameter)
        // nama(s), idlevel(i), keterangan(s), tahun_lulus(i), foto_sekolah(s)
        // NOTE: tahun_lulus seharusnya 'i' bukan 's' kalau kolom database INT
        $stmt = $conn->prepare("INSERT INTO studies (nama, idlevel, keterangan, tahun_lulus, foto_sekolah) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sisss", $nama, $idlevel, $keterangan, $tahun_lulus, $foto);
        $stmt->execute();
        $msg = 'Data studies berhasil ditambahkan!';
    }
    
    skip_save:
}



// DELETE
if (isset($_GET['delete']) && intval($_GET['delete']) > 0) {
    $delId = intval($_GET['delete']);
    $conn->query("DELETE FROM studies WHERE id=$delId");
    $msg = 'Data berhasil dihapus.';
    $msgType = 'warning';
}

// EDIT
$editData = null;
if (isset($_GET['edit']) && intval($_GET['edit']) > 0) {
    $editId = intval($_GET['edit']);
    $res = $conn->query("SELECT * FROM studies WHERE id=$editId");
    $editData = $res->fetch_assoc();
}

// READ with JOIN
$studies = $conn->query("
    SELECT s.*, l.nama AS nama_level
    FROM studies s
    JOIN level l ON s.idlevel = l.id
    ORDER BY s.id ASC
");

$levels = $conn->query("SELECT * FROM level ORDER BY id ASC");
?>

<div class="mb-4">
    <h4 class="fw-bold mb-3" style="color:#e94560;">
        <i class="bi bi-mortarboard me-2"></i>CRUD Riwayat Pendidikan (Studies)
    </h4>

    <?php if ($msg): ?>
    <div class="alert alert-<?= $msgType ?> alert-dismissible fade show py-2 small" role="alert">
        <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <!-- Form -->
    <div class="card border-0 mb-4" style="background:#1a1a2e; color:#fff;">
        <div class="card-header border-0 fw-bold" style="background:#0f3460; color:#fff;">
            <i class="bi bi-<?= $editData ? 'pencil' : 'plus-circle' ?>-fill me-2" style="color:#e94560;"></i>
            <?= $editData ? 'Edit Data Studies' : 'Tambah Data Studies' ?>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?page=studies" enctype="multipart/form-data">
                <?php if ($editData): ?>
                <input type="hidden" name="id" value="<?= $editData['id'] ?>">
                <input type="hidden" name="existing_foto" value="<?= htmlspecialchars($editData['foto_sekolah'] ?? '') ?>">
                <?php endif; ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small text-muted">Nama Sekolah/Institusi *</label>
                        <input type="text" name="nama" class="form-control"
                               style="background:#0f3460;border-color:#533483;color:#fff;"
                               value="<?= htmlspecialchars($editData['nama'] ?? '') ?>"
                               placeholder="Nama institusi pendidikan" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small text-muted">Level *</label>
                        <select name="idlevel" class="form-select" style="background:#0f3460;border-color:#533483;color:#fff;" required>
                            <option value="">-- Pilih Level --</option>
                            <?php
                            $levels->data_seek(0);
                            while ($lv = $levels->fetch_assoc()): ?>
                            <option value="<?= $lv['id'] ?>"
                                <?= isset($editData['idlevel']) && $editData['idlevel'] == $lv['id'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($lv['nama']) ?>
                            </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small text-muted">Tahun Lulus</label>
                        <input type="number" name="tahun_lulus" class="form-control"
                               style="background:#0f3460;border-color:#533483;color:#fff;"
                               value="<?= htmlspecialchars($editData['tahun_lulus'] ?? '') ?>"
                               placeholder="contoh: 2020" min="1990" max="2100">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label small text-muted">Keterangan</label>
                        <textarea name="keterangan" class="form-control" rows="2"
                                  style="background:#0f3460;border-color:#533483;color:#fff;"
                                  placeholder="Deskripsi singkat tentang institusi ini"><?= htmlspecialchars($editData['keterangan'] ?? '') ?></textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label small text-muted">Foto Sekolah</label>
                        <input type="file" name="foto_sekolah" class="form-control"
                               style="background:#0f3460;border-color:#533483;color:#adb5bd;"
                               accept="image/*">
                        <?php if (!empty($editData['foto_sekolah'])): ?>
                        <small class="text-muted">File saat ini: <?= htmlspecialchars($editData['foto_sekolah']) ?></small>
                        <?php endif; ?>
                    </div>
                    <div class="col-12 d-flex gap-2">
                        <button type="submit" class="btn fw-bold px-4" style="background:#e94560;color:#fff;border:none;">
                            <i class="bi bi-save me-1"></i><?= $editData ? 'Update' : 'Simpan' ?>
                        </button>
                        <?php if ($editData): ?>
                        <a href="index.php?page=studies" class="btn btn-outline-secondary">Batal</a>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Data -->
    <div class="card border-0" style="background:#1a1a2e; color:#fff;">
        <div class="card-header border-0 fw-bold" style="background:#0f3460; color:#fff;">
            <i class="bi bi-table me-2" style="color:#e94560;"></i>Data Studies
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead style="background:#533483;">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Keterangan</th>
                            <th>Tahun Lulus</th>
                            <th>Foto</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($studies->num_rows > 0):
                        while ($row = $studies->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td class="fw-bold"><?= htmlspecialchars($row['nama']) ?></td>
                            <td><span class="badge" style="background:#533483;"><?= htmlspecialchars($row['nama_level']) ?></span></td>
                            <td class="small text-muted" style="max-width:200px;"><?= htmlspecialchars(substr($row['keterangan'],0,60)) ?>...</td>
                            <td><?= $row['tahun_lulus'] ?: '-' ?></td>
                            <td>
    <?php if (!empty($row['foto_sekolah'])): ?>
    <img src="uploads/<?= htmlspecialchars($row['foto_sekolah']) ?>" 
         width="55" height="55"
         style="object-fit:cover; border-radius:6px; border:2px solid #533483;"
         alt="<?= htmlspecialchars($row['nama']) ?>"
         onerror="this.outerHTML='<small class=\'text-danger\'>Foto tidak ditemukan</small>'">
    <?php else: ?>
    <small class="text-muted">—</small>
    <?php endif; ?>
</td>
                            <td class="text-center">
                                <a href="index.php?page=studies&edit=<?= $row['id'] ?>"
                                   class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil"></i></a>
                                <a href="index.php?page=studies&delete=<?= $row['id'] ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Hapus data ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="7" class="text-center text-muted py-4">Belum ada data studies.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
