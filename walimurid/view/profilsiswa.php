<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Profil Siswa</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-lg-3">
				<p><img src="<?php echo $base.$siswa['foto_siswa']; ?>" class="img-thumbnail" style="width: 170px; height: 170px;"></p>
			</div>
			<div class="col-lg-9">
				<table class="table table-striped">
					<tr>
						<td>NISN</td>
						<td><?php echo $siswa['nisn']; ?></td>
					</tr>
					<tr>
						<td>NAMA</td>
						<td><?php echo $siswa['nama']; ?></td>
					</tr>
					<tr>
						<td>ALAMAT</td>
						<td><?php echo $siswa['temlahir']; ?></td>
					</tr>
					<tr>
						<td>TGL LAHIR</td>
						<td><?php echo tgl($siswa['tanglahir']); ?></td>
					</tr>
					<tr>
						<td>KELAS</td>
						<td><?php echo $kelas['kelas']; ?></td>
					</tr>
					<tr>
						<td>WALIMURID</td>
						<td><?php echo $wali['nama']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>