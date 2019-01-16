<!DOCTYPE html>
<html>
<head>
	<title>Shopping Card</title>
</head>
<body>
<?php 
include 'koneksi.php';
?>

	<form method="POST">
		<span>Nama Barang : </span><br>
		<input type="text" name="name"><br>
		<span>Stock</span><br>
		<input type="number" name="stock"><br>
		<input type="submit" name="add">
	</form>

	 <?php
	  if(isset($_POST['add'])){
	    $name = $_POST['name'];
	    $stock = $_POST['stock'];
	   
	    $query = "INSERT INTO tb_barang (name,stock) VALUES('$name','$stock')";

	    $sql= mysqli_query($koneksi,$query);
	    if($sql){
	      	echo'<script>window.alert("Data Berhasil Disimpan");</script>';
	    }
	  }
  	?> 
  	<hr>
  	<h3>Tabel Barang</h3>
  	<table border="2">
  		<tr>
  			<th>Nama Barang</th>
  			<th>Stock</th>
  			<th>Aksi</th>
  		</tr>
  		<?php
	        $no=1;
	        $query = "SELECT * FROM tb_barang ";
	        $sql = mysqli_query($koneksi,$query) or die(mysqli_error($koneksi));
	        while($d = mysqli_fetch_array($sql,MYSQLI_ASSOC)){
        ?>
	     <tr>
	        <td><?php echo $d['name']; ?></td>
	        <td><?php echo $d['stock']; ?></td>
	        <td><a href="addstock.php?addstock=<?php echo $d['barang_id']; ?>">Tambah Stock &nbsp; <a href="?hapus=<?php echo $d['barang_id']; ?>" onclick="return hapus();" class="btn btn-danger">Hapus</a></td>
	     </tr>
        <?php 
          }
        ?> 

         <?php
              if(isset($_GET['hapus'])){
              $barang_id = $_GET['hapus'];
              $query = "DELETE FROM tb_barang WHERE barang_id='$barang_id'";
              $result = mysqli_query($koneksi,$query);

                if($result){
                  echo '<script>window.alert("Data Berhasil di Hapus"); window.location=("index.php");</script>';
                }
              }
              ?>
  	</table>

</body>
</html>