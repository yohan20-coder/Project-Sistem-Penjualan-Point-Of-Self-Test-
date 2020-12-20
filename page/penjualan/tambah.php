<?php 


	$id = $_GET['id'];
	$kode_pj = $_GET['kode_pj'];
	$harga_jual = $_GET['harga_jual'];
	$kode_b = $_GET['kode_b'];

	$sql = $koneksi->query("update tb_penjualan set jumlah=(jumlah + 1) where id = '$id'");
	$sql1 = $koneksi->query("update tb_penjualan set total=(total + $harga_jual) where id = '$id'");
	$sql2 = $koneksi->query("update tb_barang set stok =(stok - 1) where kode_barcode ='$kode_b'");

	if ($sql || $sql1 || $sql2) {
		?>

		<script>
			window.location.href="?page=penjualan&kodepj=<?php echo $kode_pj ?>";
		</script>

		<?php
	}
 
 ?>