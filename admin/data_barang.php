<?php
    include "koneksi.php";
    //save code
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
            <!-- /.card-header -->
            <div class="card-body">
              
  

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