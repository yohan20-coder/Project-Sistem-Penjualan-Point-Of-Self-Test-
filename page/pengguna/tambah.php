<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-center">
                                SILAKAN INPUT DATA PENGUNA
                            </h2>
                        </div>

                        	<div class="body">
                        	<form method="POST" enctype="multipart/form-data">


                            <label for="">USERNAME</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="username" class="form-control"  />
                                        </div>
                                    </div>

                           <label for="">NAMA PENGGUNA</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama" class="form-control"  />
                                        </div>
                                    </div>

                             <label for="">PASSWORD</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="pass" class="form-control"  />
                                        </div>
                                    </div>

                            <label for="">LEVEL</label>
                           <div class="form-group">
                                 <div class="form-line">
                                   <select name="level" class="form-control show-tick">
                                        <option value="">-- Pilih Level --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Kasir">Kasir</option>
                                    </select>
                                </div>
                            </div>

                             

                               <label for="">FOTO</label>
                              <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" class="form-control"  />
                                        </div>
                                    </div>


                                    <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">

                                </form>


        <?php
        	if (isset($_POST['simpan'])) {
        		
        		
        		$username = $_POST['username'];
        		$nama = $_POST['nama'];
        		$pass = $_POST['pass'];
        		$level = $_POST['level'];


        		$foto=$_FILES['foto']['name'];
                $lokasi=$_FILES['foto']['tmp_name'];
                $upload = move_uploaded_file($lokasi, "images/".$foto);

              
               if(isset($upload)) {



        	  $sql = $koneksi->query("insert into tb_pengguna (username,nama,password,level,foto) values('$username','$nama','$pass','$level','$foto')");

        		if ($sql) {
        			?>

        				<script type="text/javascript">
        					alert("Data Berhasil Disimpan");
        					window.location.href="?page=pengguna";
        				</script>
        			<?php
        	   }
            }
        }
        ?>