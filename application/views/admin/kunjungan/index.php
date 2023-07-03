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
      <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#formModalKunjungan">
        <i class="fas fa-plus"></i> Tambah Data Kunjungan
      </button>
      <a href="<?= base_url('laporan/kunjungan'); ?>" target="_blank" class="btn btn-secondary mb-2"><i class="fas fa-print"></i></a>
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
                  <td>Tanggal</td>
                  <td>Pasien</td>
                  <td>Umur</td>
                  <td>Dokter</td>
                  <td>Rekam Medis</td>
                  <td>Aksi</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($kunjungan as $u) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $u['tgl_berobat']; ?></td>
                    <td><?= $u['nama_pasien']; ?></td>
                    <td><?= $u['umur_pasien']; ?></td>
                    <td><?= $u['nama_dokter']; ?></td>
                    <td>
                      <a href="<?= base_url('admin/kunjungan/rekam/' . $u['id_berobat']); ?>" class="btn btn-success btn-sm">Rekam</a>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/kunjungan/ubah/') . $u['id_berobat']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('admin/kunjungan/hapus/') . $u['id_berobat']; ?>" class="btn btn-danger" onclick="return confirm('Yakin Hapus ?')"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="formModalKunjungan" tabindex="-1" aria-labelledby="formModalLabelKunjungan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelKunjungan">Tambah Data Kunjungan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('admin/kunjungan'); ?>
        <div class="form-group">
          <label for="pasien">Pasien</label>
          <select name="pasien" id="pasien" class="form-control">
            <option value="">-- Pilih Pasien --</option>
            <?php foreach($pasien as $p) : ?>
              <option value="<?= $p['id_pasien']; ?>"><?= $p['nama_pasien']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="muted text-danger"><?= form_error('pasien'); ?></small>
        </div>
        <div class="form-group">
          <label for="dokter">Dokter</label>
          <select name="dokter" id="dokter" class="form-control">
            <option value="">-- Pilih Pasien --</option>
            <?php foreach($dokter as $d) : ?>
              <option value="<?= $d['id_dokter']; ?>"><?= $d['nama_dokter']; ?></option>
            <?php endforeach; ?>
          </select>
          <small class="muted text-danger"><?= form_error('dokter'); ?></small>
        </div>
        <div class="form-group">
          <label for="tgl">Tanggal Berobat</label>
          <input type="date" name="tgl" id="tgl" class="form-control">
          <small class="muted text-danger"><?= form_error('tgl'); ?></small>
        </div>
        <!-- <div class="form-group">
          <label for="keluhan">Keluhan</label>
          <textarea name="keluhan" id="keluhan" class="form-control"></textarea>
          <small class="muted text-danger"><?= form_error('keluhan'); ?></small>
        </div>
        <div class="form-group">
          <label for="diagnosa">Diagnosa</label>
          <input type="text" name="diagnosa" id="diagnosa" class="form-control">
          <small class="muted text-danger"><?= form_error('diagnosa'); ?></small>
        </div> -->
        <!-- <div class="form-group">
          <label for="penata">Penatalaksanaan</label>
          <select name="penata" id="penata" class="form-control">
            <option value="">-- Pilih Penatalaksaan --</option>
            <option value="Rawat Inap">Rawat Inap</option>
            <option value="Rawat Jalan">Rawat Jalan</option>
            <option value="Rujuk">Rujuk</option>
            <option value="Lainnya">Lainnya</option>
          </select>
          <small class="muted text-danger"><?= form_error('penata'); ?></small>
        </div> -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-dark">Tambah</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>