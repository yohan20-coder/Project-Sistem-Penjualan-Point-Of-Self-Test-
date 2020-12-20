<script>
 	function sum() {
 		var harga_beli = document.getElementById('harga_beli').value;
 		var harga_jual = document.getElementById('harga_jual').value;
 		var result = parseInt(harga_jual) - parseInt(harga_beli);
 		if (!isNaN(result)) {
 			document.getElementById('profit'). value = result;
 		}
 	}

 </script>


<?php
    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from tb_barang where kode_barcode = '$kode'");
    $tampil = $sql->fetch_assoc();

    $satuan = $tampil['satuan'];
?>

 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">
                                SILAKAN INPUT DATA BARANG
                            </h2>
                        </div>

                        	<div class="body">
                        	<form method="POST">

                        	<label for="">KODE BARCODE</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode" value="<?php echo $tampil['kode_barcode']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                            <label for="">NAMA BARANG</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" value="<?php echo $tampil['nama_barang']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                           <label for="">SATUAN</label>
                           <div class="form-group">
                                 <div class="form-line">
                                   <select name="satuan"  class="form-control show-tick">
                                
                                        <option value="Lusin" <?php if($satuan=='Lusin'){echo "selected";} ?>>Lusin</option>
                                        <option value="Pack" <?php if ($satuan=='Pack') {echo "selected";} ?>>Pack</option>
                                        <option value="PCS" <?php if ($satuan=='PCS') {echo "selected";} ?>>PCS</option>
                                    </select>
                                </div>
                            </div>

                             <label for="">STOK</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="stok" value="<?php echo $tampil['stok']; ?>" class="form-control"  />
                                        </div>
                                    </div>

                                <label for="">HARGA BELI</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="hbeli" value="<?php echo $tampil['harga_beli']; ?>" id="harga_beli" onkeyup="sum()" class="form-control"  />
                                        </div>
                                    </div>

                             

                               <label for="">HARGA JUAL</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="hjual" value="<?php echo $tampil['harga_jual']; ?>" id="harga_jual" onkeyup="sum()" class="form-control"  />
                                        </div>
                                    </div>



                               <label for="">PROFIT</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="prof" value="<?php echo $tampil['profit']; ?>" id="profit" readonly="" style="background-color: #e7e3e9;" class="form-control" value="0"  />
                                        </div>
                                    </div>

                                    <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">

                                </form>


        <?php
        	if (isset($_POST['simpan'])) {
        		
        		$kode = $_POST['kode'];
        		$nama = $_POST['nama'];
        		$satuan = $_POST['satuan'];
        		$stok = $_POST['stok'];
        		$hbeli = $_POST['hbeli'];
        		$hjual = $_POST['hjual'];
        		$prof = $_POST['prof'];

        		$sql2 = $koneksi->query("update tb_barang set kode_barcode='$kode',nama_barang='$nama',satuan='$satuan',harga_beli='$hbeli',stok='$stok',harga_jual='$hjual',profit='$prof' where kode_barcode='$kode'");

        		if ($sql2) {
        			?>

        				<script type="text/javascript">
        					alert("Data Berhasil Diubah");
        					window.location.href="?page=barang";
        				</script>
        			<?php
        	}
        }

        ?>