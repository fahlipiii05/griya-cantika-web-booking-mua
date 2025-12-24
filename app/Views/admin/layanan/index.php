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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"> Daftar Layanan Makeup</h1>
        <a href="<?= base_url('/admin/layanan/create') ?>" class="btn btn-primary shadow-sm">
          <i class="icofont-plus"></i> Tambah Layanan
        </a>
      </div>

      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
      <?php endif; ?>

      <!-- Layanan Table -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white">
          <h6 class="m-0 font-weight-bold">📋 Data Layanan</h6>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
              <thead class="table-dark">
                <tr>
                  <th style="width: 50px;">#</th>
                  <th style="width: 120px;">Gambar</th>
                  <th>Nama Layanan</th>
                  <th>Deskripsi</th>
                  <th style="width: 180px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($layanan)): ?>
                  <?php $no = 1; foreach ($layanan as $l): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td>
                        <?php if (!empty($l['gambar'])): ?>
                          <img src="<?= base_url('uploads/layanan/' . $l['gambar']) ?>" alt="<?= esc($l['nama']) ?>" width="90" class="rounded shadow-sm">
                        <?php else: ?>
                          <span class="text-muted">Tidak ada gambar</span>
                        <?php endif; ?>
                      </td>
                      <td class="fw-bold"><?= esc($l['nama']) ?></td>
                      <td class="text-start"><?= esc(substr($l['deskripsi'], 0, 120)) ?><?= strlen($l['deskripsi']) > 120 ? '...' : '' ?></td>
                      <td>
  <div class="d-flex justify-content-center gap-2">
    <!-- Tombol Detail -->
    <a href="<?= base_url('/admin/layanan/detail/'.$l['id']) ?>" class="btn btn-sm btn-info shadow-sm">
      <i class="icofont-eye"></i> Detail
    </a>

    <!-- Tombol Edit -->
    <a href="<?= base_url('/admin/layanan/edit/'.$l['id']) ?>" class="btn btn-sm btn-warning shadow-sm">
      <i class="icofont-edit"></i> Edit
    </a>

    <!-- Tombol Hapus -->
    <a href="<?= base_url('/admin/layanan/delete/'.$l['id']) ?>" 
       onclick="return confirm('Yakin ingin menghapus layanan ini?')" 
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
                      <i class="icofont-warning"></i> Belum ada layanan yang ditambahkan.
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
