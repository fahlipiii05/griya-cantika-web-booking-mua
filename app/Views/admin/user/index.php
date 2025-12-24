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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><i class="icofont-users-alt-5"></i> Manajemen User</h1>
        <a href="<?= base_url('admin/user/create') ?>" class="btn btn-primary shadow-sm">
          <i class="icofont-plus"></i> Tambah User
        </a>
      </div>

      <!-- Flash Message -->
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="icofont-check-circled"></i> <?= session()->getFlashdata('success'); ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>

      <!-- User Table -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold"><i class="icofont-user"></i> 📋 Daftar User Terdaftar</h6>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
              <thead class="table-dark">
                <tr>
                  <th style="width: 50px;">#</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th style="width: 120px;">Role</th>
                  <th style="width: 200px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($users)): ?>
                  <?php $no = 1; foreach ($users as $u): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td class="fw-semibold"><?= esc($u['name']) ?></td>
                      <td><?= esc($u['email']) ?></td>
                      <td>
                        <span class="badge px-3 py-2 fs-6 bg-<?= $u['role'] === 'admin' ? 'danger' : 'success' ?>">
                          <?= ucfirst($u['role']) ?>
                        </span>
                      </td>
                      <td>
                        <div class="d-flex justify-content-center gap-2">
                          <!-- Detail (opsional jika ingin ditambahkan nanti) -->
                          <!-- <a href="<?= base_url('admin/user/detail/'.$u['id']) ?>" class="btn btn-sm btn-info shadow-sm">
                            <i class="icofont-eye"></i> Detail
                          </a> -->

                          <a href="<?= base_url('admin/user/edit/'.$u['id']) ?>" class="btn btn-sm btn-warning shadow-sm">
                            <i class="icofont-edit"></i> Edit
                          </a>

                          <a href="<?= base_url('admin/user/delete/'.$u['id']) ?>"
                             onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')"
                             class="btn btn-sm btn-danger shadow-sm">
                            <i class="icofont-trash"></i> Hapus
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="5" class="text-center text-muted py-4">
                      <i class="icofont-warning"></i> Belum ada user yang terdaftar.
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
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
