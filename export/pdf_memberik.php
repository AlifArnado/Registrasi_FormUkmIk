<?php 
	include '../koneksi.php';
   require_once ("libray/fpdf.php");
	
	$sql   = "SELECT * FROM member_ik";
	$query = mysql_query($sql);
	$data  = array();
	while ($row = mysql_fetch_assoc($query)) {
		array_push($data, $row);
	}

	$judul = "DAFTAR MEMBER UKM INFORMATIKA & KOMPUTER";
	$tanggal = "Tanggal Laporan : ".date('d - m - Y')." ";
	$jumlah_data = "Jumlah Data         : ................... Mahasiswa";
	$header = array(
			array("label"=>"No", "length"=>7, "align"=>"L"),
			array("label"=>"Nama Mahasiswa", "length"=>55, "align"=>"L"),
			array("label"=>"Jurusan", "length"=>40, "align"=>"L"),
			array("label"=>"Alamat Mahasiswa", "length"=>85, "align"=>"L"),
			array("label"=>"Asal Sekolah", "length"=>60, "align"=>"L"),
			array("label"=>"Nomor Telepon", "length"=>30, "align"=>"L"),
		);

	#create PDF
	$pdf = new FPDF('L','mm','A4');
	$pdf->AddPage();

	#tampilkan judul laporan
	$pdf->SetFont('Arial','B','15');
	$pdf->Cell(0,20, $judul, '0', 1, 'C');
	$pdf->Ln(5);
	//buat garis horisontal
	$pdf->Line(10,25,287,25);

	#tampilkan jumlah peserta
	$pdf->SetFont('','B','10');
	$pdf->Cell(0,5, $jumlah_data, '0', 1, 'L');

	#tampilkan tanggal data
	$pdf->SetFont('','B','10');
	$pdf->Cell(0,5, $tanggal, '0', 1, 'L');

	#buat header tabel
	$pdf->SetFont('Arial','B','10');
	$pdf->SetFillColor(95,158,160);
	$pdf->SetTextColor(000);

	$pdf->SetDrawColor(0,0,0);
	foreach ($header as $kolom) {
		$pdf->Cell($kolom['length'], 8, $kolom['label'], 1, '0', $kolom['align'], true);
	}
	$pdf->Ln();
	 
	#tampilkan data tabelnya
	$pdf->SetFillColor(224,235,255);
	$pdf->SetTextColor(0);
	$pdf->SetFont('Arial','','10');
	$fill=false;
	
	foreach ($data as $baris) {
		$i = 0;
		foreach ($baris as $cell) {
			$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
			$i++;
		}
		$fill = !$fill;
		$pdf->Ln();
	}
	
	//atur posisi 1.5 cm dari bawah
		//atur posisi 1.5 cm dari bawah
		$pdf->SetY(179.90);
		//buat garis horizontal
		$pdf->Line(10,$pdf->GetY(),285,$pdf->GetY());
		//Arial italic 9
		$pdf->SetFont('Arial','I',9);
		//nomor halaman
		$pdf->Cell(0,10,'Halaman '.$pdf->PageNo().' dari {nb}',0,0,'R');
		$pdf->AliasNbPages();
	
	$pdf->Output();
 ?>