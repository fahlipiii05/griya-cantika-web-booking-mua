<?= $this->include('layouts/admin/header') ?>
<?= $this->include('layouts/admin/sidebar') ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
    <?= $this->include('layouts/admin/topbar') ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">
           Manajemen Portfolio
        </h1>
        <a href="<?= base_url('/admin/portfolio/create') ?>" class="btn btn-primary shadow-sm">
          <i class="icofont-plus"></i> Tambah Portfolio
        </a>
      </div>

      <!-- Flash Message -->
      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
      <?php endif; ?>

      <!-- Portfolio Card Grid -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📁 Daftar Portfolio</h6>
        </div>

        <div class="card-body">
          <?php if (!empty($portfolio)): ?>
            <div class="row">
              <?php foreach ($portfolio as $p): ?>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                  <div class="card shadow-sm h-100 border-0">
                    <!-- Gambar -->
                    <img src="<?= base_url('uploads/portfolio/' . $p['gambar']) ?>" 
                         class="card-img-top" 
                         alt="<?= esc($p['judul']) ?>" 
                         style="height: 220px; object-fit: cover; border-radius: 8px 8px 0 0;">

                    <!-- Konten -->
                    <div class="card-body d-flex flex-column text-center">
                      <h5 class="fw-bold text-primary mb-2"><?= esc($p['judul']) ?></h5>
                      <p class="text-muted" style="min-height: 60px;">
                        <?= esc(substr($p['deskripsi'], 0, 90)) ?><?= strlen($p['deskripsi']) > 90 ? '...' : '' ?>
                      </p>

                      <span class="badge bg-secondary mb-3 text-capitalize">
                        <?= esc($p['kategori']) ?>
                      </span>

                      <!-- Aksi -->
                      <div class="d-flex justify-content-center gap-2 mt-auto">
                        <a href="<?= base_url('admin/portfolio/edit/' . $p['id']) ?>" class="btn btn-sm btn-warning shadow-sm">
                          <i class="icofont-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('admin/portfolio/delete/' . $p['id']) ?>" 
                           class="btn btn-sm btn-danger shadow-sm" 
                           onclick="return confirm('Yakin ingin menghapus portfolio ini?')">
                          <i class="icofont-trash"></i> Hapus
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <div class="text-center py-5">
              <i class="icofont-warning text-muted" style="font-size: 50px;"></i>
              <p class="mt-3 text-muted">Belum ada portfolio yang ditambahkan.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- End of Main Content -->

  <?= $this->include('layouts/admin/footer') ?>
</div>
<!-- End of Content Wrapper -->
