

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
	<link rel="stylesheet" href="export/js-master/jquery.dropdown.css">
	<script src="export/js-master/jquery.dropdown.js"></script>
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
	<style type="text/css">
		#dropdown-menu h2 {
           padding: 14px;
		   margin: 0;
		   font-size: 16px;
		   font-weight: 400;
		  }
		  #dropdown-menu .sample {
		    width: 200px;
		  }
		  #dropdown-menu .form-group {
		    margin: 30px 0;
		  }
	</style>
</head>
<body>
	
	<div class="container">
		<div id="header" class="sample shadow-z-3">
			<h1>UKM INFORMATIKA & KOMPUTER</h1>
			<p class="kampus">STMIK AKAKOM YOGYAKARTA</p>
		</div>
		
		<div class="menu shadow-z-3">
			<h3>LES'T JOIN US!!</h3>
			<div class="tombol-menu">
				<a href="data-view.php" target=""><button class="btn btn-fab btn-raised btn-info"><i class="mdi-action-description"></i></button></a>
			</div>
		</div>
		
		<img src="picture/ik.jpg" class="img-circle sample shadow-z-2">
	</div>
	
	<div class="container content">
		<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" role="form" method="POST">
				<div class="form-group">
				   <label for="inputNamaPeserta" class="control-label">Nama Mahasiswa</label>
				   <input type="text" class="form-control floating-label" name="nama_mahasiswa" placeholder="Nama Mahasiswa">
				  <!-- validati -->

				</div>
				<div class="form-group">
				   <label for="inputJurusan" class="control-label">Jurusan</label>
				    <div id="dropdown-menu">
				    	<div class="sample">
				    	  <select name="jurusan" class="form-control">
					  	    <?php 
				                  $jurusan=array('Teknik Informatika','Sistem Informasi','Manajemen Informatika','Teknik Komputer','Komputerisasi Akutansi');
				                  $jrs=array('TI','SI','MI','TK','KA');
				                  for ($i=0; $i <= 4 ; $i++) { 
				                    echo "
				                    <option value='$jurusan[$i]'>$jurusan[$i]</option>
				                    ";
				                  }
				                 ?>
				          </select>
				    	</div>
				    </div>
					 
				  <!-- validati -->

				</div>
				<div class="form-group">
				   <label for="inputAlamat" class="control-label">Alamat Mahasiswa</label>
				   <input type="text" class="form-control" name="alamat_mahasiswa" placeholder="Alamat Mahasiswa">
				  <!-- validati -->

				</div>
				<div class="form-group">
				   <label for="inputAsalSekolah" class="control-label">Asal Sekolah</label>
				   <input type="text" class="form-control" name="asal_sekolah" placeholder="Asal Sekolah">
				  <!-- validati -->

				</div>
				<div class="form-group">
				   <label for="inputNoTlpn" class="control-label">No Hp.</label>
				   <input type="text" class="form-control floating-label" id="ipt" maxlength="14" name="no_hp" placeholder="+62">
				</div>
				
				<div class="form-group">
					<button class="btn btn-raised btn-info" name="submit">
						<span class="glyphicon glyphicon-ok text-button" aria-hidden="true"> Submit</span>
					</button>
				</div>
			</form>

			<?php 
				include 'koneksi.php';
				if (isset($_POST['submit'])) {
					$nama_mahasiswa    = $_POST['nama_mahasiswa'];
					$jurusan           = $_POST['jurusan'];
					$alamat_mahasiswa  = $_POST['alamat_mahasiswa'];
					$asal_sekolah      = $_POST['asal_sekolah'];
					$no_hp             = $_POST['no_hp'];
             	    
             	    if (empty($nama_mahasiswa) || empty($alamat_mahasiswa) || empty($asal_sekolah) || empty($no_hp)) {
             	    	$message = "Warning Message";
             	    	echo "
							<div class='alert alert-danger message ' role='alert'>
							   <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'> $message</span>
							</div>
             	    	";
             	    } else {
             	    	$message = "Success Message";
             	    	$sql = 	"INSERT INTO member_ik VALUES 
								 ('','$nama_mahasiswa','$jurusan','$alamat_mahasiswa','$asal_sekolah','$no_hp');
             	    	         ";
             	    	mysql_query($sql) or die(mysql_error());
             	    	echo "
							<div class='alert alert-success message' role='alert'>
							   <span class='glyphicon glyphicon-ok-sign' aria-hidden='true'> $message</span>
							</div>
             	    	";
             	    } 
				}
				

			 ?>

	<!-- end div container -->
		</div>
    </body>
    <!--- end body -->
</html>