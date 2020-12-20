<?php 

		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$koneksi = new mysqli("localhost","root","", "db_post");
 		$kasir = $_GET['kasir'];

 		$kodepj = $_GET['kode_pjl'];


 ?>

<style type="text/css">

	@media print{
 		input.noPrint{
 			display: none;
 		}
 	}

</style>


 <h4>Struk Belanja</h4>

<h4 style="text-align: center;">TOKO FLOBAMORA</h4>
<h4 style="text-align: center;">Jln. Sam Ratulangi No.135 Hp: 082247949173</h4>

<hr>

 <table>

 	<?php 

 		$sql = $koneksi->query("select * from tb_penjualan, tb_pelanggan where tb_penjualan.id_pelanggan = tb_pelanggan.kode_pelanggan and kode_penjualan='$kodepj'");
 		$tampil = $sql->fetch_assoc();

 	 ?>


 	<tr>
 		<td>Kode Penjualan &nbsp&nbsp</td>
 		<td>:&nbsp&nbsp<?php echo $tampil['kode_penjualan']; ?></td>
 	</tr>

 	<tr>
 		<td>Tanggal &nbsp&nbsp</td>
 		<td>:&nbsp&nbsp<?php echo $tampil['tgl_penjualan']; ?></td>
 	</tr>

 	<tr>
 		<td>Pelanggan &nbsp&nbsp</td>
 		<td>:&nbsp&nbsp<?php echo $tampil['nama']; ?></td>
 	</tr>

 	<tr>
 		<td>Kasir &nbsp&nbsp</td>
 		<td>:&nbsp&nbsp<?php echo $kasir; ?></td>
 	</tr>

</table>
<hr>

<table>
	<p><b>Daftar Belanjaan :</b></p>
<?php 

	$sql2 = $koneksi->query("select * from tb_penjualan, tb_penjualan_detail, tb_barang where tb_penjualan.kode_penjualan = tb_penjualan_detail.kode_penjualan and tb_penjualan.kode_barcode = tb_barang.kode_barcode and tb_penjualan.kode_penjualan ='$kodepj'");


		while ($tampil2 = $sql2->fetch_assoc()) {
			
 ?>

	<tr>
 		<td><?php echo $tampil2['nama_barang']; ?></td>
 		<td>Rp.<?php echo number_format($tampil2['harga_jual']).',-'.'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'. $tampil2['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'?></td>

 		<td><?php echo number_format($tampil2['total']).',-'; ?></td>
 	</tr>


<?php 

	$diskon = $tampil2['diskon'];
	$potongan = $tampil2['potongan'];
	$bayar = $tampil2['bayar'];
	$kembali = $tampil2['kembali'];
	$total = $tampil2['jtotal'];
	$total_bayar = $total_bayar + $tampil2['total'];

} ?>


<tr>
	<td><hr></td>
</tr>

<tr>
	<th colspan="2">Total</th>
	<td>Rp.<?php echo number_format($total_bayar) ?></td>
</tr>

<tr>
	<th colspan="2">Diskon</th>
	<td><?php echo $diskon ?>%</td>
</tr>

<tr>
	<th colspan="2">Potongan Diskon</th>
	<td>Rp.<?php echo number_format($potongan); ?></td>
</tr>

<tr>
	<th colspan="2">Sub Total</th>
	<td>Rp.<?php echo number_format($total); ?></td>
</tr>

<tr>
	<th colspan="2">Bayar</th>
	<td>Rp.<?php echo number_format($bayar); ?></td>
</tr>

<tr>
	<th colspan="2">Kembalian</th>
	<td>Rp.<?php echo number_format($kembali); ?></td>
</tr>

 </table>
<hr>
 <table>
 	<tr>
 		<td>Barang yang sudah dibeli tidak bisa di kembalikan</td>
 	</tr>
 </table>
<br>

<input type="button" class="noPrint" name="" value="Print" onclick="window.print()">
