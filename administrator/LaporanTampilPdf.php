    <?
	include "../librari/inc.koneksidb.php";
        #ambil data di tabel dan masukkan ke array
    $query = "select distinct analisahasil.id_log,log.nama,log.alamat,hamapenyakit.jnspnykt  from ((log inner join analisahasil 
on log.id_log=analisahasil.id_log) inner join hamapenyakit on 
analisahasil.id_penyakit=hamapenyakit.id_pnykt) order by analisahasil.id_log";
    $sql = mysql_query ($query);
    $data = array();
    while ($row = mysql_fetch_assoc($sql)) {
    array_push($data, $row);
    }
     
    #setting judul laporan dan header tabel
    $judul = "LAPORAN SEMUA AKTIVITAS PAKAR BELIMBING";
    $header = array(
    array("label"=>"Id Log", "length"=>15, "align"=>"L"),
    array("label"=>"Nama Pengguna", "length"=>40, "align"=>"L"),
    array("label"=>"Alamat", "length"=>70, "align"=>"L"),
    array("label"=>"Penyakit", "length"=>65, "align"=>"L")
    );
     
    #sertakan library FPDF dan bentuk objek
    require_once ("fpdf17/fpdf.php");
    $pdf = new FPDF();
    $pdf->AddPage();
     
    #tampilkan judul laporan
    $pdf->SetFont('Arial','B','16');
    $pdf->Cell(0,20, $judul, '0', 1, 'C');
     
    #buat header tabel
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(209,246,246);
    $pdf->SetTextColor(10,25,25);
    $pdf->SetDrawColor(128,0,0);
    foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
    }
    $pdf->Ln();
     
    #tampilkan data tabelnya
    $pdf->SetFillColor(224,235,255);
    $pdf->SetTextColor(0);
    $pdf->SetFont('');
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
     
    #output file PDF
    $pdf->Output();
    ?>

