<?php 


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
 		margin-right: 9%;
 	}
 	td{
 		text-align: center;
 	}
 	
 </style>


<div id="tabel">
<table border="1" width="100%" style="border-collapse: collapse;">
	<caption><strong>Laporan Data Barang</strong></caption>
	<thead>
		<tr>
			<th>No</th>
			<th>Kode Barcode</th>
			<th>Nama Barang</th>
			<th>Satuan</th>
			<th>Harga Beli</th>
			<th>Stok</th>
			<th>Harga Jual</th>
			<th>Profit</th>
		</tr>
	</thead>
	<tbody>
		 <?php $no = 1; ?>
          <?php $sql = $koneksi->query("select * from tb_barang"); ?>
           <?php while($data = $sql->fetch_assoc()){?>

                  <tr>
                     <td><?php echo $no;?></td>
                      <td><?php echo $data['kode_barcode'];?></td>
                      <td><?php echo $data['nama_barang']; ?></td>
                 	  <td><?php echo $data['satuan']; ?></td>
                 	  <td><?php echo $data['harga_beli']; ?></td>
              		  <td><?php echo $data['stok']; ?></td>
                       <td><?php echo $data['harga_jual']; ?></td>
                       <td><?php echo $data['profit']; ?></td>
                                           
                   </tr>
          <?php $no++; ?>
          <?php } ?>
	</tbody>
</table>
</div>
<br>
<input type="button" class="noPrint" value="Print" onclick="window.print()">