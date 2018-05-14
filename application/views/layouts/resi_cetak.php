<!DOCTYPE html>
<html>
<head>
	<title>Resi Gudang</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/resi.css">
</head>
<body onload="window.print()" onmouseover="window.close();">
<!-- <body> -->
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
					<td>No.seri /<i> Serial No</i></td>
					<td>:</td>
					<td><?php echo $resi->no_resi ?></td>
				</tr>
			</table>
		</div>
		<div class="b">
			<table>
				<tr>
					<td>Kode Pengaman /<i> Security Code</i></td>
					<td>:</td>
					<td>___________</td>
				</tr>
			</table>

		</div>
	</div>
	<div class="section">
		<div class="c">
			<p class="a1"><u>Resi Gudang / Warehouse Receipt</u></p>
			<p class="a2">DOKUMEN BUKTI KEPEMILIKAN / <i>PROOF OF OWNERSHIP DOCUMENT</i></p>
			<br>
			<p class="a3">Nomor / Number : <?php echo $resi->no_resi ?></p>

		</div>
	</div>
	<div class="section">
		<div class="c1">
			<p class="head">JENIS RESI GUDANG / <i>Type of receipt warehouse</i> : <b>ATAS NAMA/ On Behalf</b><br></p>
		</div>
	</div>
	<div class="section">
		<div class="d">
			Diterbitkan untuk/ <i>Published for</i> :<br>
			<table class="table">
				<tr>
					<td width="150px">Nama / <i>Name</i></td>
					<td>:</td>
					<td><?php echo $resi->pengujian->barang->petani->nama ?></td>
				</tr>
				<tr>
					<td>Alamat / <i>Address</i></td>
					<td>:</td>
					<td><?php echo $resi->pengujian->barang->petani->alamat ?></td>
				</tr>
			</table>

		</div>
	</div>
	<div class="section">
		<div class="e">
			<p class="head">TELAH DITERIMA SEJUMLAH BARANG SEBAGAIMANA TERSEBUT DI BAWAH INI UNTUK DISIMPAN DALAM GUDANG BERDASARKAN SURAT PERJANJIAN PENGELOLAAN BARANG/ <i>The good received as mentioned below have been stored in the warehouse under Management</i> : <br></p>
			<table class="table">
				<tr>
					<td width="150px">NOMOR / <i>Number</i></td>
					<td>:</td>
					<td><?php echo $resi->no_resi ?></td>
				</tr>
				<tr>
					<td>Tanggal / <i>Date</i></td>
					<td>:</td>
					<td><?php echo date_indo($resi->tgl_penerbitan) ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="f">
			<table class="table">
				<tr>
					<td width="300px">NAMA BARANG / <i>Name of Commodity</i> *)</td>
					<td>:</td>
					<td><?php echo $resi->pengujian->barang->nama_barang ?></td>
				</tr>
				<tr>
					<td>JENIS BARANG / <i>Type of Commodity</i></td>
					<td>:</td>
					<td><?php echo $resi->pengujian->barang->jenis->nama_komoditi ?></td>
				</tr>
				<tr>
					<td>MUTU BARANG / <i>Quality</i></td>
					<td>:</td>
					<td><?php echo $resi->pengujian->catatan->isi_catatan ?></td>
				</tr>
				<tr>
					<td>KELAS BARANG / <i>Class of Commodity</i>*)</td>
					<td>:</td>
					<td><?php echo $resi->kelas_barang ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="g">
			<table class="table">
				BARANG DITERIMA DAN DISIMPAN SEJAK/ <i>Goods are received and stored since</i>
				<tr>
					<td width="150px">TANGGAL/ <i>Date</i></td>
					<td>:</td>
					<td><?php echo date_indo($resi->tgl_penerbitan) ?> SAMPAI DENGAN / <i>Up to</i> <?php echo date_indo($resi->jatuh_tempo) ?></td>
				</tr>
			</table>
			<table class="table">
				DENGAN SERTIFIKAT UNTUK BARANG/ <i>Under Confornity Agency Certificate </i>:
				<tr>
					<td width="150px">Nomor / <i>Number</i></td>
					<td>:</td>
					<td><?php echo $resi->no_resi ?></td>
				</tr>
				<tr>
					<td>TANGGAL / <i>Date</i></td>
					<td>:</td>
					<td><?php echo date_indo($resi->tgl_penerbitan) ?></td>
				</tr>
				<tr>
					<td>OLEH / <i>By</i></td>
					<td>:</td>
					<td><?php echo $resi->pengujian->pengelola->nama ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="h">
			<table>
				<tr>
					<td width="250px">JUMLAH BARANG / <i>Quantity</i></td>
					<td>:</td>
					<td><?php echo $resi->pengujian->barang->berat_barang ?> Kg</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="i">
			<table>
				<tr>
					<td width="320px">BIAYA PENYIMPANAN/ <i>Rate of Storage and Handling Charges</i> </td>
					<td>:</td>
					<td>Rp. <?php echo $resi->biaya_penyimpanan ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="j">
			<table>
				<tr>
					<td width="250px">LOKASI GUDANG / <i>Warehouse Address</i></td>
					<td>:</td>
					<td><?php echo $resi->pengujian->gudang->alamat ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="k">
			<table>
				BARANG TERSEBUT TELAH DIASURANSIKAN TERHADAP RESIKO/ <i>The goods are insured for</i> :
				<tr>
					<td width="250px">NOMOR POLIS/ <i>Policy Number</i></td>
					<td>:</td>
					<td><?php echo $resi->no_polis ?></td>
				</tr>
				<tr>
					<td>MASA BERLAKU/ <i>Valid Period</i></td>
					<td>:</td>
					<td><?php echo date_indo($resi->polis_start) ?> - <?php echo date_indo($resi->polis_end) ?></td>
				</tr>
				<tr>
					<td>NAMA PERUSAHAAN ASURANSI/ <i>Insurance Company</i></td>
					<td>:</td>
					<td><?php echo $resi->polis_asuransi ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section">
		<div class="l">
			<table>
				<tr>
					<td width="250px">JATUH TEMPO SIMPAN BARANG / <i>Storing time valid up to</i></td>
					<td>:</td>
					<td><?php echo date_indo($resi->jatuh_tempo) ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="section1">
		<div class="m">
			<p class="ttd">
				PEMILIK BARANG/ <i>Goods Owner</i>,
				<br><br><br><br><br><br><br>
			<b><u><?php echo $resi->pengujian->barang->petani->nama ?></u></b>
			</p>
		</div>
		<div class="n">
			<p class="ttd">
				Grobogan, <?php echo longdate_indo($resi->tgl_penerbitan) ?>
				<br>
				KSU SARANA HIDUP SEJAHTERA
				<br><br><br><br><br><br>
			<b><u>ARIEF HANURYANTO</u></b>
			</p>
		</div>
	</div>
</body>
</html>
