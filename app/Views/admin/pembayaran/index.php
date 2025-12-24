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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"> Daftar Pembayaran</h1>
        <a href="<?= base_url('/admin/pembayaran/create') ?>" class="btn btn-primary shadow-sm">
          <i class="icofont-plus"></i> Tambah Pembayaran
        </a>
      </div>

      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
      <?php endif; ?>

      <!-- Payment Table -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold">📋 Data Pembayaran</h6>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
              <thead class="table-dark">
                <tr>
                  <th style="width: 50px;">#</th>
                  <th>Nama Pelanggan</th>
                  <th>Layanan</th>
                  <th style="width: 140px;">Jumlah</th>
                  <th style="width: 160px;">Metode Pembayaran</th>
                  <th style="width: 120px;">Status</th>
                  <th style="width: 160px;">Tanggal Pembayaran</th>
                  <th style="width: 220px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($payments)): ?>
                  <?php $no = 1; foreach ($payments as $p): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td class="fw-bold"><?= esc($p['client_name']) ?></td>
                      <td><?= esc($p['service_name'] ?? '-') ?></td>
                      <td><strong>Rp <?= number_format($p['gross_amount'], 0, ',', '.') ?></strong></td>
                      <td><?= esc($p['payment_type'] ?? '-') ?></td>

                      <!-- Status -->
                      <td>
                        <?php if ($p['status'] == 'success'): ?>
                          <span class="badge bg-success px-3 py-2">✅ Sukses</span>
                        <?php elseif ($p['status'] == 'pending'): ?>
                          <span class="badge bg-warning text-dark px-3 py-2">⏳ Pending</span>
                        <?php elseif ($p['status'] == 'failed'): ?>
                          <span class="badge bg-danger px-3 py-2">❌ Gagal</span>
                        <?php else: ?>
                          <span class="badge bg-secondary px-3 py-2"><?= esc(ucfirst($p['status'])) ?></span>
                        <?php endif; ?>
                      </td>

                      <td><?= date('d-m-Y H:i', strtotime($p['payment_time'])) ?></td>

                      <!-- Aksi -->
                      <td>
                        <div class="d-flex justify-content-center gap-2">
                          <!-- Detail -->
                          <a href="<?= base_url('/admin/pembayaran/detail/'.$p['id']) ?>" class="btn btn-sm btn-info shadow-sm">
                            <i class="icofont-eye"></i> Detail
                          </a>
                          <!-- Edit -->
                          <a href="<?= base_url('/admin/pembayaran/edit/'.$p['id']) ?>" class="btn btn-sm btn-warning shadow-sm">
                            <i class="icofont-edit"></i> Edit
                          </a>
                          <!-- Hapus -->
                          <a href="<?= base_url('/admin/pembayaran/delete/'.$p['id']) ?>" 
                             onclick="return confirm('Yakin ingin menghapus data pembayaran ini?')" 
                             class="btn btn-sm btn-danger shadow-sm">
                            <i class="icofont-trash"></i> Hapus
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="8" class="text-center text-muted py-4">
                      <i class="icofont-warning"></i> Belum ada data pembayaran yang ditambahkan.
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
