<!DOCTYPE html>
<html>
<head>
	<title>Shopping Card</title>
</head>
<body>
<?php 
include 'koneksi.php';
?>
	<h3>Tambah Stock</h3>
	 <?php
		if(isset($_GET['addstock'])){
		  $barang_id = $_GET['addstock'];
		  $sql = "SELECT * FROM tb_barang WHERE barang_id='$barang_id'";
		  $result = mysqli_query($koneksi,$sql);
		  $data = mysqli_fetch_object($result);

		}
		  if(isset($_POST['addstock'])){
		    $stock = $_POST['stock'];
		    $query = "UPDATE tb_barang SET stock= stock+'$stock' WHERE barang_id='$barang_id'";
		    $result = mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));
		    if ($result) {
		      echo '<script>window.alert("Stock berhasil ditambah"); window.location=("index.php");</script>';
		    }
		}
	?>

	<form method="POST">
		<span>Nama Barang : </span><br>
		<input type="text" name="name" value="<?php echo $data->name ?>" readonly><br>
		<span>Stock</span><br>
		<input type="number" name="stock"><br>
		<input type="submit" name="addstock">
	</form>

</body>
</html>