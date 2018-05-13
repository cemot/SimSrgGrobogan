<!DOCTYPE html>
<html>
<head>
	<title>Resi Gudang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pengajuan.css">

</head>
<!-- <body onload="window.print()"> -->
<body>
	<div class="header">
		<div class="logo"></div>
		<div class="header2">
			<p class="head"><b>KSU SARANA HIDUP SEJAHTERA</b> <br>
			Jl. Raya Sulursari Ds. Sulusari Gabus Grobogan Gedengan Wonosari Grobogan Jawa Tengah 58182 <br>
			Nomor Persetujuan / <i>Approval Number</i> : 14/BAPPEBTI/KEP-SRG/SP/PG/02/2018</p>
		</div>
	</div>
	<div class="section">
		<div class="a">
			<table>
				<tr>
					<td>Nomor</td>
					<td>:</td>
					<td><?php echo $barang->id_barang ?></td>
				</tr>
				<tr>
					<td>Lampiran</td>
					<td>:</td>
					<td>-</td>
				</tr>
				<tr>
					<td>Perihal</td>
					<td>:</td>
					<td><u>Permohonan Simpan Barang</u></td>
				</tr>
			</table>
		</div>
		<div class="b">
			<table>
				<tr>
					<td><?php echo date("D, d M Y",strtotime($barang->tgl_pengajuan)) ?></td>
				</tr>
				<tr>
					<td>
						Kepada Yth. <br>
						Direktur Utama <br> KSU SARANA HIDUP SEJAHTERA <br>
						selaku Pengelola Gudang <br>
						di Tempat
					</td>
				</tr>
			</table>

		</div>
	</div>
	<div class="section_pengajuan">
		<div class="section_pengajuan_isi">
			<p>Dengan ini kami mengajukan permohonan untuk dapat menyimpan barang di Gudang yang Saudara kelola untuk dapat diterbitkan
				Resi Gudang atas Perintah/Nama*). Bersama ini kami sampaikan data-data sebagai berikut:</p>
			<br>
			<p><b>I. Identitas Pemohon</b></p>
			<p>
				<table>
					<tr>
						<td style="width:5%">a.</td>
						<td style="width:30%">Nama</td>
						<td style="width:5%">:</td>
						<td style="width:60%"><?php echo $barang->petani->nama ?></td>
					</tr>
					<tr>
						<td>b.</td>
						<td>Nomor Identitas (KTP)</td>
						<td>:</td>
						<td><?php echo $barang->petani->no_ktp ?></td>
					</tr>
					<tr>
						<td>c.</td>
						<td>Jabatan Pemohon</td>
						<td>:</td>
						<td>Petani</td>
					</tr>
					<tr>
						<td>d.</td>
						<td>Alamat Pemohon</td>
						<td>:</td>
						<td><?php echo $barang->petani->alamat ?></td>
					</tr>
					<tr>
						<td>e.</td>
						<td>Nomor Telepon</td>
						<td>:</td>
						<td><?php echo $barang->petani->no_tlp ?></td>
					</tr>
				</table>
			</p>
			<br>
			<p><b>II. Deskripsi Barang</b></p>
			<p>
				<table>
					<tr>
						<td style="width:5%">a.</td>
						<td style="width:30%">Jenis Barang</td>
						<td style="width:5%">:</td>
						<td style="width:60%"></td>
					</tr>
					<tr>
						<td>b.</td>
						<td>Jumlah / Volume</td>
						<td>:</td>
						<td><?php echo $barang->berat_barang ?> Kg</td>
					</tr>
					<tr>
						<td>c.</td>
						<td>Tahun Panen</td>
						<td>:</td>
						<td>Bulan : <?php echo $barang->bulan_panen ?> Tahun : <?php echo $barang->tahun_panen ?></td>
					</tr>
					<tr>
						<td>d.</td>
						<td>Kemasan</td>
						<td>:</td>
						<td><?php echo $barang->kemasan ?></td>
					</tr>
					<tr>
						<td>e.</td>
						<td>Pengangkut</td>
						<td>:</td>
						<td><?php echo $barang->pengangkut ?></td>
					</tr>
				</table>
			</p>
			<br>
			<p><b>III. Gudang Yang Dituju Untuk Menyimpan Barang</b></p>
			<p>
				<table>
					<tr>
						<td style="width:5%">a.</td>
						<td style="width:30%">Nama Gudang</td>
						<td style="width:5%">:</td>
						<td style="width:60%">
							<?php
								if ($barang->gudang) {
									echo $barang->gudang->nama_gudang;
								}
							?>
						</td>
					</tr>
					<tr>
						<td>b.</td>
						<td>Alamat Gudang</td>
						<td>:</td>
						<td>
							<?php
								if ($barang->gudang) {
									echo $barang->gudang->alamat_gudang;
								}
							?>
						</td>
					</tr>
				</table>
			</p>
			<br>
			<p><b>III. Tanggal Rencana Peyimpanan</b></p>
			<p>
				<table>
					<tr>
						<td style="width:5%">a.</td>
						<td style="width:30%">Tanggal</td>
						<td style="width:5%">:</td>
						<td style="width:60%"><?php echo date("d M Y",strtotime($barang->tgl_pengajuan)) ?></td>
					</tr>
				</table>
			</p>
			<br>
			<p>Demikian, atas kerjasamanya diucapkan terima kasih.</p>
		</div>
	</div>
	<div class="section1">
		<div class="n" style="float:right;">
			<p class="ttd">
				Grobogan, <?php echo date("D, d M Y",strtotime($barang->tgl_pengajuan)) ?>
				<br>
				Pemohon
				<br><br><br><br><br><br>
			<b><u><?php echo $barang->petani->nama ?></u></b>
			<br>
			Jabatan : Petani
			</p>
		</div>
	</div>
</body>
</html>
