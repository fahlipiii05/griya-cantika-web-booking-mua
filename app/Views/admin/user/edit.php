<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <!-- Begin Page Content -->
    <div class="container-fluid py-4">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><i class="icofont-edit"></i> Edit Data User</h1>
        <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary shadow-sm">
          <i class="icofont-arrow-left"></i> Kembali
        </a>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card shadow-lg border-0">
            <div class="card-header bg-gradient-primary text-white py-3">
              <h5 class="m-0 font-weight-bold"><i class="icofont-user"></i> Form Edit User</h5>
            </div>
            <div class="card-body">

              <form action="<?= base_url('admin/user/update/' . $user['id']) ?>" method="post">
                
                <!-- Nama -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">Nama Lengkap</label>
                  <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>" placeholder="Masukkan nama user" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">Email</label>
                  <input type="email" name="email" class="form-control" value="<?= esc($user['email']) ?>" placeholder="Masukkan email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                  <label class="form-label fw-semibold">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti">
                  <small class="text-muted"><i class="icofont-info-circle"></i> Kosongkan jika tidak ingin mengubah password.</small>
                </div>

                <!-- Role -->
                <div class="mb-4">
                  <label class="form-label fw-semibold">Peran (Role)</label>
                  <select name="role" class="form-select" required>
                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                  </select>
                </div>

                <div class="d-flex justify-content-end gap-2">
                  <a href="<?= base_url('admin/user') ?>" class="btn btn-secondary">
                    <i class="icofont-close"></i> Batal
                  </a>
                  <button type="submit" class="btn btn-success">
                    <i class="icofont-save"></i> Perbarui User
                  </button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <?= $this->include('layouts/admin/footer') ?>
</div>
<!-- End of Content Wrapper -->
