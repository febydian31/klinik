<div class="container-fluid">
	<h4 class="text-center">Klinik Gemilang Medika</h4>
	<small class="text-center">jl. wonosari km 10 55792 Piyungan Special Region of Yogyakarta</small>
	<div class="row">
		<div class="col-md">
			<table class="table text-center">
				<tr>
					<th>No</th>
					<th>Nama Pasien</th>
					<th>Kelamin Pasien</th>
					<th>Umur</th>
				</tr>
				<?php $no = 1; foreach($pasien as $d) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $d['nama_pasien']; ?></td>
						<td><?= $d['jk_pasien'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
						<td><?= $d['umur_pasien']; ?></td>
					</tr>
				<?php endforeach; ?>
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