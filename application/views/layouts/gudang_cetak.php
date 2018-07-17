<!DOCTYPE html>
<html>
<head>
	<title>Data Gudang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/resi.css">
</head>
<body onload="window.print()" onmouseover="window.close();">
<!-- <body> -->
	<div class="header">
		<div class="logo"></div>
		<div class="header2">
			<p class="head"><b>KSU SARANA HIDUP SEJAHTERA</b> <br>
			Jl. Raya Sulursari Ds. Sulusari Gabus Grobogan Gedengan Wonosari Grobogan Jawa Tengah 58182</p>
		</div>
	</div>
	<div class="section">
		<div class="c">
			<p class="a1"><u>Data Gudang</u></p>
		</div>
	</div>
	<div class="section">
		<div class="d">
			<table class="table">
				<tr>
					<td width="100px">Nama Gudang </td>
					<td>:</td>
					<td><?php echo $gudang->nama; ?></td>
				</tr>
				<tr>
					<td>Pengelola </td>
					<td>:</td>
					<td><?php echo $gudang->id_pengelola.' | '.$gudang->pengelola->nama; ?></td>
				</tr>
				<tr>
					<td>Kapasitas total </td>
					<td>:</td>
					<td><?php echo $gudang->kapasitas; ?> Kg</td>
				</tr>
				<tr>
					<td>Kapasitas isi</td>
					<td>:</td>
					<td>
						<?php
							if (isset($isi_sisa)) :
								echo $isi_sisa->isi;
							else :
								echo "0";
							endif;
						?>
						Kg
					</td>
				</tr>
				<tr>
					<td>Kapasitas sisa</td>
					<td>:</td>
					<td>
						<?php
							if (isset($isi_sisa)) :
								echo $isi_sisa->sisa;
							else :
								echo $gudang->kapasitas;
							endif;
						?>
						Kg
					</td>
				</tr>
				<tr>
					<td> Status</td>
					<td>:</td>
					<td>
						<?php
							if (isset($isi_sisa)) :
								if ($isi_sisa->sisa <= 0) : ?>
									Penuh
								<?php else : ?>
									Masih Tersedia
								<?php endif; ?>
						<?php else : ?>
								Masih Tersedia
						<?php endif; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="e">
			<br><center><p class="head"><u>Detail Gudang</u></p></center><br>
			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Berat (kg)</th>
						<th>Petani</th>
						<th>Tgl Pengujian</th>
						<th>No Resi</th>
						<th>Masa Akhir Resi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1;
						foreach ($gudang->pengujian as $pengujian): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $pengujian->barang->nama_barang ?></td>
								<td><?php echo $pengujian->barang->berat_barang ?></td>
								<td><?php echo $pengujian->barang->petani->nama ?></td>
								<td><?php echo $pengujian->tgl_pengujian ?></td>
								<td><?php echo $pengujian->resi->last()->no_resi ?></td>
								<td><?php echo $pengujian->resi->last()->jatuh_tempo ?></td>
							</tr>
					<?php endforeach ;?>
				</tbody>
			</table>
			<br>
		</div>
	</div>
	<div class="section1">
		<div class="m">
			<p class="ttd">
				PENGELOLA GUDANG,
				<br><br><br><br><br><br><br>
			<b><u><?php echo $gudang->pengelola->nama; ?></u></b>
			</p>
		</div>
		<div class="n">
			<p class="ttd">
				Grobogan, <?php echo longdate_indo(date('Y-m-d', time())); ?>
				<br>
				KSU SARANA HIDUP SEJAHTERA
				<br><br><br><br><br><br>
			<b><u>ARIEF HANURYANTO</u></b>
			</p>
		</div>
	</div>
</body>
</html>
