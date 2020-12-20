<?php 

	 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	$koneksi = new mysqli("localhost","root","", "db_post");


 ?>

 <style type="text/css">
 	@media print{
 		input.noPrint{
 			display: none;
 		}
 	}
 	caption{
 		margin-bottom: 10px;
 		margin-top: 20px;
 	}
 	#tabel{
 		margin-right: 3%;
 	}
 	td{
 		text-align: center;
 	}
 	
 </style>

<?php 

 		 $tgl_awal = $_POST['tgl_awal'];
		 $tgl_akhir = $_POST['tgl_akhir'];

 ?>

<div id="tabel">
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption><u><strong>Laporan Penjualan Toko Flobamora <br> Periode <?php echo date('d F Y',strtotime( $tgl_awal)); ?> Sampai <?php echo date('d F Y', strtotime($tgl_akhir)); ?></strong></u></caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Kode Barcode</th>
			<th>Nama Barang</th>
			<th>Harga Jual</th>
			<th>Jumlah</th>
			<th>Total</th>
			<th>Profit</th>
		</tr>
	</thead>
	<tbody>
		 <?php

		 //$tgl_awal = $_POST['tgl_awal'];
		 //$tgl_akhir = $_POST['tgl_akhir'];

		  $no = 1; 

		 ?>
          <?php $sql = $koneksi->query("select * from tb_barang, tb_penjualan where tb_barang.kode_barcode = tb_penjualan.kode_barcode and tgl_penjualan between '$tgl_awal' and '$tgl_akhir'"); ?>
           <?php while($data = $sql->fetch_assoc()){

           		$profit = $data['profit'] * $data['jumlah'];


           	?>

                  <tr>
                     <td><?php echo $no;?></td>
                      <td><?php echo date('d F Y', strtotime($data['tgl_penjualan']));?></td>
                      <td><?php echo $data['kode_barcode'];?></td>
                      <td><?php echo $data['nama_barang']; ?></td>
                 	  <td>Rp. <?php echo number_format($data['harga_jual']); ?></td>
                 	  <td><?php echo $data['jumlah']; ?></td>
              		  <td>Rp. <?php echo number_format( $data['total']); ?></td>
                      <td>Rp. <?php echo number_format( $profit); ?></td>
                                           
                   </tr>
          <?php $no++; ?>
          <?php 

      		$total_pj = $total_pj + $data['total'];
      		$total_profit = $total_profit + $profit;

	      	}
      	?>
	</tbody>
		<tr>
			<th colspan="6">Total Penjualan Dan Profit</th>
			<td>Rp. <?php echo number_format( $total_pj); ?></td>
			<td>Rp. <?php echo number_format( $total_profit); ?></td>
		</tr>
</table>
</div>
<br>
<input type="button" class="noPrint" value="Print" onclick="window.print()">