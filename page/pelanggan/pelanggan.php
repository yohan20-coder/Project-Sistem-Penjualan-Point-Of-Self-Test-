  <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA PELANGGAN
                            </h2>
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No. Hp</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                   


                                    <tbody>

                                        <?php $no = 1; ?>
                                        <?php $sql = $koneksi->query("select * from tb_pelanggan"); ?>
                                        <?php while($data = $sql->fetch_assoc()){?>

                                            <tr>
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['jk']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td><?php echo $data['telpon']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td>
                                                <a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['kode_pelanggan'] ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini...???')"href="?page=pelanggan&aksi=hapus&id=<?php echo $data['kode_pelanggan'] ?>" class="btn btn-danger">Del</a>
                                            </td>
                                        </tr>
                                    <?php $no++; ?>
                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                                  <a href="?page=pelanggan&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                            </div>
                        