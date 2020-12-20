<?php
    $kode = $_GET['id'];

    $sql = $koneksi->query("select * from tb_pelanggan where kode_pelanggan= '$kode'");
    $tampil = $sql->fetch_assoc();

    $jk = $tampil['jk'];
?>






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
                                            <input type="text" name="nama" class="form-control" value="<?php echo $tampil['nama']; ?>"   />
                                        </div>
                                    </div>

                           <label for="">JENIS KELAMIN</label>
                           <div class="form-group">
                                 <div class="form-line">
                                   <select name="jk" class="form-control show-tick">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki" <?php if($jk=='Laki-Laki'){echo "selected";} ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php if($jk=='Perempuan'){echo "selected";} ?>>Perempuan</option>>Perempuan</option>
                                    </select>
                                </div>
                            </div>

                             <label for="">ALAMAT</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $tampil['alamat']; ?>"  />
                                        </div>
                                    </div>

                                <label for="">NO. HP</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="hp"  class="form-control" value="<?php echo $tampil['telpon']; ?>"  />
                                        </div>
                                    </div>

                             

                               <label for="">EMAIL</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="email" class="form-control" value="<?php echo $tampil['email']; ?>" />
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


                $sql2 = $koneksi->query("update tb_pelanggan set nama ='$nama',jk='$jk',alamat='$alamat',telpon='$hp',email='$email' where kode_pelanggan='$kode'");

                if ($sql2) {
                    ?>

                        <script type="text/javascript">
                            alert("Data Berhasil Diubah");
                            window.location.href="?page=pelanggan";
                        </script>
                    <?php
            }
        }

        ?>