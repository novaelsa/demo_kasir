<?php
    include "koneksi.php";
    //save code
    if(isset($_POST['simpan'])){
        mysqli_query($con, "INSERT INTO tb_penjualan VALUES('', '$_POST[tgl_penjualan]', '$_POST[kd_barang]', '$_POST[nama_barang]', '$_POST[harga_jual]', 
                    '$_POST[jumlah_barang]', '$_POST[total]')");
        echo "<script>alert('Data Tersimpan')</script>";
        echo "<script>document.location.href = '?pembayaran'</script>";
    }
    //delete code
    if(isset($_GET['hapus'])){
        mysqli_query($con, "DELETE FROM tb_penjualan WHERE id_penjualan = '$_GET[id]'");
        echo "<script>alert('Data Terhapus')</script>";
        echo "<script>document.location.href = '?pembayaran'</script>";
    }
?>
<!-- Content Wrapper. Contains page content -->
<form method="POST">
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pembayaran</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pembayaran</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Input Transaksi</h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" class="form-control" name="tgl_penjualan" value="<?php echo @$_POST['tgl_penjualan']?>" required>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" class="form-control" name="kd_barang" placeholder="Masukkan Kode Barang" value="<?php echo @$_POST['kd_barang']?>" onchange="submit()" required>
                      <?php
                          if(isset($_POST['kd_barang'])){
                              $n = mysqli_query($con, "SELECT * FROM tb_barang WHERE kd_barang = '$_POST[kd_barang]'");
                              $brg = mysqli_fetch_array($n);
                          }
                      ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang" value="<?php echo @$brg['nama_barang'] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="number" class="form-control" name="harga_jual" placeholder="Masukkan Harga Barang"value="<?php echo @$brg['harga_barang'] ?>" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Stok Barang</label>
                      <input type="number" class="form-control" name="stok_barang" placeholder="Masukkan Stok Barang" value="<?php echo @$brg['stok_barang'] ?>" readonly>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Jumlah Barang</label>
                      <input type="number" class="form-control" name="jumlah_barang" placeholder="Masukkan Jumlah Barang"value="<?php echo @$_POST['jumlah_barang'] ?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-actions form-group">
                      <input type="submit" name="hitung" value="Hitung" class="btn btn-warning">
                    <?php
                        if(isset($_POST['hitung'])){
                          $total = $_POST['harga_jual'] * $_POST['jumlah_barang'];
                          $stok = $_POST['stok_barang'] - $_POST['jumlah_barang'];
                          $upstok = mysqli_query($con, "UPDATE tb_barang SET stok_barang = '$stok' WHERE kd_barang = '$_GET[id]'");    
                        }
                    ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                  <label>Total</label>
                  <input type="number" class="form-control" name="total" placeholder="Total Harga" value="<?php echo @$total ?>" readonly>
                </div>
                <div class="form-actions form-group">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
                </div>
            </div>
            
            <!-- /.card-body -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Penjualan</h3>
              </div>
              <a target="blank" href="cetak.php" class="btn btn-warning">Cetak</a>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Penjualan</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Jumlah Barang</th>
                    <th>Total</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                        $sql = mysqli_query($con, "SELECT * FROM tb_penjualan ORDER BY id_penjualan ASC");
                        $no = 0;
                        while($data = mysqli_fetch_array($sql)){
                        $no++;
                    ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['tgl_penjualan']?></td>
                    <td><?php echo $data['kd_barang']?></td>
                    <td><?php echo $data['nama_barang']?></td>
                    <td><?php echo $data['harga_jual']?></td>
                    <td><?php echo $data['jumlah_barang']?></td>
                    <td><?php echo $data['total']?></td>
                    <td><a target="blank" href="cetak.php?cetak&id=<?php echo $data['id_penjualan']?>" class="btn btn-warning">Cetak</a>
                        <a href="?penjualan&hapus&id=<?php echo $data['id_penjualan']?>" class="btn btn-danger">Delete</a></td>
                  </tr>
                 <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
           
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</form>