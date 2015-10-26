<?php 
  include 'koneksi.php';
  
  $id = $_GET['ID'];

  $sql = "DELETE FROM member_ik where nomor = '$id' ";
 
  $query = mysql_query($sql, $connec) or die("Gagal Menghapus Data");

  if ($query) {
  	header("location: http://localhost/UKMIK/data-view.php");
  }

?>