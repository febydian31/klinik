<main role="main" class="col-md-15 ml-sm-auto col-lg-15 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><? '' ?></h1>
    <div class="btn-toolbar mb-10 mb-md-0">
      <div class="btn-group mr-2">
      </div>
    </div>
  </div>
  <div class="row mb-10">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#formModalPasien">
        <i class="fas fa-plus"></i> Tambah Data Pasien
      </button>
      <a href="<?= base_url('laporan/pasien'); ?>" target="_blank" class="btn btn-secondary mb-2"><i class="fas fa-print"></i></a>
      <?php if(validation_errors()) : ?>
        <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
      <?php endif; ?>
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Nama Pasien</td>
                  <td>Kelamin</td>
                  <td>Umur</td>
                  <td>Aksi</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($pasien as $u) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u['nama_pasien']; ?></td>
                    <td><?= $u['jk_pasien'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                    <td><?= $u['umur_pasien']; ?></td>
                    <td>
                      <a href="<?= base_url('admin/pasien/ubah/') . $u['id_pasien']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('admin/pasien/hapus/') . $u['id_pasien']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="formModalPasien" tabindex="-1" aria-labelledby="formModalLabelDokter" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelDokter">Tambah Data Pasien</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('admin/pasien'); ?>
        <div class="form-group">
          <label for="nama">Nama Pasien</label>
          <input type="text" name="nama" id="nama" class="form-control">
          <small class="muted text-danger"><?= form_error('nama'); ?></small>
        </div>
        <div class="form-group">
          <label for="jk">Nama Pasien</label>
          <select name="jk" id="jk" class="form-control">
            <option value="">-- Pilih Jenis Kelamin --</option>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
          </select>
          <small class="muted text-danger"><?= form_error('jk'); ?></small>
        </div>
        <div class="form-group">
          <label for="umur">Umur Pasien</label>
          <input type="number" name="umur" id="umur" class="form-control">
          <small class="muted text-danger"><?= form_error('umur'); ?></small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Tambah</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>