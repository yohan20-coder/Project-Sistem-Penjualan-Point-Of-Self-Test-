<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">
                                SILAKAN INPUT DATA PELANGGAN
                            </h2>
                        </div>

                        	<div class="body">
                        	<form method="POST">


                            <label for="">NAMA PELANGGAN</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control"  />
                                        </div>
                                    </div>

                           <label for="">JENIS KELAMIN</label>
                           <div class="form-group">
                                 <div class="form-line">
                                   <select name="jk" class="form-control show-tick">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                             <label for="">ALAMAT</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat" class="form-control"  />
                                        </div>
                                    </div>

                                <label for="">NO. HP</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" name="hp"  class="form-control"  />
                                        </div>
                                    </div>

                             

                               <label for="">EMAIL</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control"  />
                                        </div>
                                    </div>


                                    <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">

                                </form>


        <?php
        	if (isset($_POST['simpan'])) {
        		
        		
        		$nama = $_POST['nama'];
        		$jk = $_POST['jk'];
        		$alamat = $_POST['alamat'];
        		$hp = $_POST['hp'];
        		$email = $_POST['email'];

        		$sql = $koneksi->query("insert into tb_pelanggan(nama,jk,alamat,telpon,email) values('$nama','$jk','$alamat','$hp','$email')");

        		if ($sql) {
        			?>

        				<script type="text/javascript">
        					alert("Data Berhasil Disimpan");
        					window.location.href="?page=pelanggan";
        				</script>
        			<?php
        	}
        }

        ?>