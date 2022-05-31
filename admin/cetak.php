 <!DOCTYPE html>
<html>
<head>
	<title>Cetak Struk</title>
</head>
<body>

<?php
include "koneksi.php";
		$sql=mysqli_query($con,"select * from tb_penjualan where id_penjualan = '$_GET[id]'");
		while($data=mysqli_fetch_array($sql)){
?>
<form>
	<table  width="50%" align="center">
		<tr align="center">
			<th><b>MINIMARKET</b></th>
		</tr>
		<tr align="center">
			<th><b>" MITRA INDAH "</b></th>
		</tr>
		<tr align="center">
			<th><b>Jl.Raya Sukabumi Km.15 HE SukmaTalang 2 Cimande</b></th>
		</tr>
	</table>
	
<hr width="50%">
	<table align="center">
		<tr>
			<td><b>Bon  X987-123-9054WH77 Kasir : Admin</b></td>
		</tr>
	</table>	
<hr width="50%">
	<table  width="50%" style="border-collapse:collapse" align="center">
		<tr align="center">
			<td colspan="2"><?php echo @$data['nama_barang']?></td>
			<td><?php echo @$data['jumlah_barang']?></td>
			<td><?php echo @$data['harga_jual']?></td>
			<td><?php echo @$data['total']?></td>
		</tr>
		<tr>
			<td>Total</td>
			<td><?php echo @$data['jumlah_barang']?></td>
			<td></td>
			<td></td>
			<td align="center"><?php echo @$data['total']?></td>
		</tr>
		<tr>
			<td colspan="4">Total Belanja</td>
			<td align="center"><?php echo @$data['total']?></td>
		</tr>
		<tr>
			<td colspan="4">Tunai</td>
			<td align="center">70000</td>
		</tr>
		<tr>
			<td colspan="4">Kembalian</td>
			<td align="center">5000</td>
		</tr>
	</table>
<hr width="50%">
	<table  width="50%" style="border-collapse:collapse" align="center">
		<tr>
			<td>Tanggal. <?php echo @$data['tgl_penjualan']?></td>
		</tr>
	</table>
<hr width="50%">
	<table  width="50%" style="border-collapse:collapse" align="center">
		<tr align="center">
			<td>SMS/WA : 085746328080</td>
		</tr>
		<tr align="center">
			<td>--TERIMA KASIH ATAS KUNJUNGAN ANDA--</td>
		</tr>
	</table>
<?php } ?>
</form>
<style>
	window.print();
</style>
</body>
</html>