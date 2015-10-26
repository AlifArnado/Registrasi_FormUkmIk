<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pendataan</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
	<link rel="stylesheet" href="material/dist/css/material.min.css">
	<link rel="stylesheet" href="material/dist/js/material.min.js">
	<link rel="icon" href="picture/ik.jpg" class="img-circle">
	<link rel="stylesheet" href="style.css">
	<script src="jquery.min.js"></script>
	
	<script>
	     $(document).on("click", "#shadow-sample2, #shadow-sample3", function() {
		    var tap = ($(this).data("tap") * 1) + 1;
		    if (tap === 6) {
		      tap = 0;
		    }
		    $(this).data("tap", tap);
		    var shadow = "shadow-z-" + tap;
		    $(this).attr("class", shadow);
		  });

	     $(document).ready(function(){
			  $('#ipt').keyup(function(){
			    var jumlah=$(this).val().length;
			    if(jumlah==4){
			    $('#ipt').val($('#ipt').val()+"-");
			    }
			     if(jumlah==9){
			    $('#ipt').val($('#ipt').val()+"-");
			    }
			  });
			});

	   
	</script>
	<style type="text/css" media="screen">
		table {
             margin-left:4.8pc;
             color:black;
 		}

 		tr td {
 			max-height: -2pc;
 		}

 		td {
 			height:-2pc;
 		}

 		.logo {
 			margin-left:33pc;
 			margin-top:-0.5pc;
 		}

 		.print {
			margin-top:4.6pc;
			margin-left:5pc;
 		}

 		.btn-p {
 			margin-top:-0pc;
 		}
	</style>
</head>
<body>
	
	<div class="container">
		<div id="header" class="sample shadow-z-3">
			<h1>UKM INFORMATIKA & KOMPUTER</h1>
			<p class="kampus">STMIK AKAKOM YOGYAKARTA</p>
		</div>
		<img src="picture/ik.jpg" class="img-circle sample shadow-z-2 logo">
	</div>
	
	<div class="container content-view">
		<div class="print">
			<button type="button" class="btn btn-success btn-sm text-button" name="" onclick="window.location='index.php' "><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Back Home</button>
			<a href="export/pdf_memberik.php" target="_blank"><button type="button" class="btn btn-warning btn-sm text-button"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Export to PDF</button></a>
		</div>
		<div class="row">
		<div class="col-md-12">
		   <table class="table table-hover table-striped">
		   	<tr>
				<th bgcolor="#1e90ff">Nama Mahasiswa</th>
				<th bgcolor="#1e90ff">Jurusan</th>
				<th bgcolor="#1e90ff">Alamat Mahasiswa</th>
				<th bgcolor="#1e90ff">Asal Sekolah</th>
				<th bgcolor="#1e90ff" width="135">No Telepon</th>
		<!--	<th bgcolor="#1e90ff" align="center" width="20">Action</th> -->
			</tr>
			<?php 
				include 'koneksi.php';
				$sql = "SELECT * FROM member_ik";
				$query = mysql_query($sql);
				if ($query) {
					while ($row = mysql_fetch_array($query)) {
						echo "
                               <tr class='info'>
									<td>$row[1]</td>
									<td>$row[2]</td>
									<td>$row[3]</td>
									<td>$row[4]</td>
									<td>$row[5]</td>
							<!--	<td>
										<a href=\"data_delete.php?ID=$row[0]\" onclick=\"return confirm('Mengapus Data ".$row[1]."')\";>
										<button type='button' class='btn btn-danger btn-sm btn-p'><span class='glyphicon glyphicon-trash'></span></button>
									</td> -->
								</tr>
						";
					}
				}

			 ?>
			
			
			</table>
	</div>
</style>
</body>
</html>

