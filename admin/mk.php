<?php
    include "koneksi.php";
    //save code
    //delete code
    //edit code
    if(isset($_GET['edit'])){
        $ed = mysqli_query($con, "SELECT * FROM tb_barang WHERE kd_barang = '$_GET[id]'");
        $edit = mysqli_fetch_array($ed);
    }
    //update code
    if(isset($_POST['update'])){
        mysqli_query($con, "UPDATE tb_barang SET kd_barang = '$_POST[kd_barang]', nama_barang = '$_POST[nama_barang]',
                    harga_barang = '$_POST[harga_barang]', harga_jual = '$_POST[harga_jual]', stok_barang = '$_POST[stok_barang]' WHERE kd_barang = '$_GET[id]'");
        echo "<script>alert('Data Terubah')</script>";
        echo "<script>document.location.href = '?mk'</script>";
    }
?>
<form method="POST">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Input Data Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" class="form-control" name="kd_barang" placeholder="Masukkan Kode Barang" value="<?php echo @$edit['kd_barang']?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan Nama Barang" value="<?php echo @$edit['nama_barang']?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Harga Barang</label>
                      <input type="number" class="form-control" name="harga_barang" placeholder="Masukkan Harga Barang" value="<?php echo @$edit['harga_barang']?>" disabled>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Harga Jual</label>
                      <input type="number" class="form-control" name="harga_jual" placeholder="Masukkan Harga Jual" value="<?php echo @$edit['harga_jual']?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Stok Barang</label>
                      <input type="number" class="form-control" name="stok_barang" placeholder="Masukkan Stok Barang" value="<?php echo @$edit['stok_barang']?>" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-actions form-group">
                        <input type="submit" name="update" value="Update" class="btn btn-success">
                    </div>
                  </div>
                </div>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          </div>

          //
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga Barang</th>
                    <th>Harga Jual</th>
                    <th>Stok Barang</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                        $sql = mysqli_query($con, "SELECT * FROM tb_barang ORDER BY kd_barang ASC");
                        $no = 0;
                        while($data = mysqli_fetch_array($sql)){
                        $no++;
                    ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['kd_barang']?></td>
                    <td><?php echo $data['nama_barang']?></td>
                    <td><?php echo $data['harga_barang']?></td>
                    <td><?php echo $data['harga_jual']?></td>
                    <td><?php echo $data['stok_barang']?></td>
                    <td><a href="?mk&edit&id=<?php echo $data['kd_barang']?>" class="btn btn-warning">Edit</a></td>
                  </tr>
                 <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>