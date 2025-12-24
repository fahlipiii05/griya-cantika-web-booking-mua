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
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold"> Daftar Booking Makeup</h1>
        <a href="<?= base_url('/admin/booking/create') ?>" class="btn btn-primary shadow-sm">
          <i class="icofont-plus"></i> Tambah Booking
        </a>
      </div>

      <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
      <?php endif; ?>

      <!-- Booking Table -->
      <div class="card shadow mb-4">
        <div class="card-header py-3 bg-gradient-primary text-white d-flex justify-content-between align-items-center">
          <h6 class="m-0 font-weight-bold">📋 Data Booking</h6>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
              <thead class="table-dark">
                <tr>
                  <th style="width: 50px;">#</th>
                  <th>Nama Pelanggan</th>
                  <th>Email</th>
                  <th style="width: 120px;">Tanggal</th>
                  <th style="width: 80px;">Jam</th>
                  <th>Layanan</th>
                  <th style="width: 120px;">Status</th>
                  <th style="width: 160px;">Ubah Status</th>
                  <th style="width: 220px;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($bookings)): ?>
                  <?php $no = 1; foreach ($bookings as $b): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td class="fw-bold"><?= esc($b['client_name']) ?></td>
                      <td><?= esc($b['email']) ?></td>
                      <td><?= date('d-m-Y', strtotime($b['date'])) ?></td>
                      <td><?= esc($b['time']) ?></td>
                      <td><?= esc($b['service_name'] ?? $b['service_id']) ?></td>

                      <!-- Status -->
                      <td>
                        <?php if ($b['status'] == 'pending'): ?>
                          <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                        <?php elseif ($b['status'] == 'confirmed'): ?>
                          <span class="badge bg-success px-3 py-2">Dikonfirmasi</span>
                        <?php else: ?>
                          <span class="badge bg-danger px-3 py-2">Ditolak</span>
                        <?php endif; ?>
                      </td>

                      <!-- Ubah Status -->
                      <td>
                        <form action="<?= base_url('admin/booking/updateStatus/' . $b['id']); ?>" method="post">
                          <select name="status" onchange="this.form.submit()" 
                                  class="form-select form-select-sm border-secondary shadow-sm text-center"
                                  style="width: 140px; margin: 0 auto;">
                            <option value="pending" <?= $b['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="confirmed" <?= $b['status'] == 'confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                            <option value="rejected" <?= $b['status'] == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                          </select>
                        </form>
                      </td>

                      <!-- Aksi -->
                      <td>
                        <div class="d-flex justify-content-center gap-2">
                          <!-- Detail -->
                          <a href="<?= base_url('/admin/booking/detail/'.$b['id']) ?>" class="btn btn-sm btn-info shadow-sm">
                            <i class="icofont-eye"></i> Detail
                          </a>
                          <!-- Edit -->
                          <a href="<?= base_url('/admin/booking/edit/'.$b['id']) ?>" class="btn btn-sm btn-warning shadow-sm">
                            <i class="icofont-edit"></i> Edit
                          </a>
                          <!-- Hapus -->
                          <a href="<?= base_url('/admin/booking/delete/'.$b['id']) ?>" 
                             onclick="return confirm('Yakin ingin menghapus booking ini?')" 
                             class="btn btn-sm btn-danger shadow-sm">
                            <i class="icofont-trash"></i> Hapus
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="9" class="text-center text-muted py-4">
                      <i class="icofont-warning"></i> Belum ada data booking yang ditambahkan.
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
