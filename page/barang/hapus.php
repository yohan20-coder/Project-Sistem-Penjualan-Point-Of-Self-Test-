<?php 

 $kode = $_GET['id'];

    $sql = $koneksi->query("delete from tb_barang where kode_barcode = '$kode'");

    if ($sql) {
    	

 ?>

 				<script type="text/javascript">
        					alert("Data Berhasil Dihapus");
        					window.location.href="?page=barang";
        				</script>

        			<?php
        		}
        	?>