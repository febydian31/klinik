<div class="container-fluid">
	<h4 class="text-center">Klinik Gemilang Medika</h4>
	<small class="text-center">jl. wonosari km 10 55792 Piyungan Special Region of Yogyakarta</small>
	<div class="row">
		<div class="col-md">
			<table class="table table-striped">
        <thead>
          <tr>
            <td>No</td>
            <td>Tanggal Kunjungan</td>
            <td>Pasien</td>
            <td>Umur</td>
            <td>Kelamin</td>
            <td>Keluhan</td>
            <td>Diagnosa</td>
            <td>Penatalaksanaan</td>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($kunjungan as $u) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $u['tgl_berobat']; ?></td>
              <td><?= $u['nama_pasien']; ?></td>
              <td><?= $u['umur_pasien']; ?></td>
              <td><?= $u['jk_pasien'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
              <td><?= $u['keluhan']; ?></td>
              <td><?= $u['diagnosa']; ?></td>
              <td><?= $u['penatalaksaan']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 offset-md-8">
			<table>
				<tr>
					<td></td>
					<td>
						<?php $tgl = date_create(date('d-m-Y')); ?>
						<p>Yogyakarta, <?= date_format($tgl, 'd M Y'); ?>
							<br>
							Administrator <br><br>
							______________________
						</p>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<script>
	window.print();
</script>