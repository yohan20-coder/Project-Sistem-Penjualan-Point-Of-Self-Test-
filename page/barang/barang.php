  <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA BARANG
                            </h2>
                        </div>
                        <div class="body">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                            <th>Aksi</th>
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
                                            <td>
                                                <a href="?page=barang&aksi=ubah&id=<?php echo $data['kode_barcode'] ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini...???')"href="?page=barang&aksi=hapus&id=<?php echo $data['kode_barcode'] ?>" class="btn btn-danger">Del</a>
                                            </td>
                                        </tr>
                                    <?php $no++; ?>
                                    <?php } ?>
                                        
                                    </tbody>
                                </table>
                                  <a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                                  <a href="page/barang/cetak.php" target="blank" class="btn btn-default">Cetak</a>
                            </div>
                        