<?php
    include "koneksi.php";
    $master = new sql($connection);

    $fetch_beras = $master->besarbayar('beras')->fetch_array();
    $fetch_uang = $master->besarbayar('uang')->fetch_array();
    $fetch_dist = $master->bsrdistribusi()->fetch_array();
    $fetch_orang = $master->distribusi()->fetch_array();
    $fetch_muzakki = $master->all_org_muzakki()->fetch_array();
    $fetch_mustahik = $master->all_org_mustahik()->fetch_array();
    $konversi = $fetch_uang['SUM(besar_bayar)'] / 37500 * 2.5;
    $total = $fetch_beras['SUM(besar_bayar)'] + $konversi;

    date_default_timezone_set('Asia/Jakarta'); 
    $today = date("d-m-Y");
?>
<!DOCTYPE html>
<html>
	<head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
		<script>
			function generatePDF() {
			const element = document.getElementById('container_content');
			var opt = {
				  margin:       0.2,
				  filename:     'laporan_pengumpulan.pdf',
				  image:        { type: 'jpeg', quality: 0.98 },
				  html2canvas:  { scale: 2 },
				  jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
				};
				// Choose the element that our invoice is rendered in.
				html2pdf().set(opt).from(element).save();
                var foo = document.write('<meta http-equiv="refresh" content="0.8;url=./master.php">');
			}
		</script>
		</head>
<body style="font-family: 'Work Sans', sans-serif;">
<div class="container_content" id="container_content" >
    <div style="width: 720px; height: 1050px; padding: 10px;">
        <div style="margin: 0 auto;">
            <div style="display: flex; padding: 2px; margin: 0 auto; text-align: center;">
                <div style="margin: 0 auto;">
                    <h3 style="font-weight: 700; font-size: 16px;">DKM Masjid Agung XYZ</h3>
                    <p style="font-size: 12px;">Jl.XYZ RT.01 RW.10 Rivet Town</p>
                    <p style="font-size: 12px;">Kec. Belobog Kab. Jarilo-VI</p>
                    <p style="font-size: 12px;">Jawa Barat, 46415</p>
                </div>
            </div>
            <hr style="border-bottom: 1px black solid;">
            <div style="padding: 10px;">
                <h1 style="font-weight: 700; font-size: 16px; text-align: center;">LAPORAN HASIL PENGUMPULAN ZAKAT FITRAH</h1>
                <?php
                    $total_orang = $fetch_mustahik['SUM(jml_tanggungan)'] + $fetch_muzakki['SUM(jml_tanggungan)'];
                ?>
                <p style="text-align: left; font-size: 13px;">Per Tanggal <?=$today?>, DKM Masjid Agung XYZ telah mengumpulkan zakat dengan total <span style="font-weight: 700;"> <?=$total_orang?> Jiwa.</span> Dengan detail sebagai berikut :</p>
                <h4 style="font-weight: 700; font-size: 14px;">Data Muzakki dan Mustahik</h4>
                <p style="font-size: 12px;">- Muzakki : <?=$master->all_muzakki()->num_rows?></p>
                <p style="font-size: 12px;">- Total Jiwa Muzakki : <?=$fetch_muzakki['SUM(jml_tanggungan)']?></p>
                <p style="font-size: 12px;">- Mustahik : <?=$master->all_mustahik()->num_rows?></p>
                <p style="font-size: 12px;">- Total Jiwa Mustahik : <?=$fetch_mustahik['SUM(jml_tanggungan)']?></p>
                <h4 style="font-weight: 700; font-size: 14px;">Jumlah Zakat Terkumpul</h4>
                <p style="font-size: 12px;">- Total Beras : <?=$fetch_beras['SUM(besar_bayar)']?> kg</p>
                <p style="font-size: 12px;">- Total Uang = Rp.<?=$fetch_uang['SUM(besar_bayar)']?> / Rp.37.500 = <?=$konversi?> kg</p>
                <p style="font-size: 12px;">- Total Keseluruhan Beras = <?=$fetch_beras['SUM(besar_bayar)']?> + <?=$konversi?> = <?=number_format((float)$total, 2, '.', '')?> kg</p>
                
                <br>
            </div>
            <div style="text-align: right; margin-right: 70px;">
                <p style="font-size: 12px;"><?=$today?></p>
                <img src="./img/tandatangan.png" alt=""  style="height: 100px; margin-right: 20px; border-bottom: 1px black solid; text-align: center;">
                <p style="font-size: 12px;">Ketua DKM Masjid Agung XYZ</p>
            </div>
            <h1></h1>
        </div>
    </div>
</div>

<script>
    generatePDF();
</script>
<!--<meta http-equiv="refresh" content="0.2;url=./laporan.php" />-->
</body>
</html>