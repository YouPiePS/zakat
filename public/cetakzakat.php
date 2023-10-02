<?php
    include "koneksi.php";
    $nama = $_GET['nama'];
    $besar = $_GET['besar'];
    if($_GET['beras'] == 1){
        $jenis = "Beras sebanyak : $besar kg";
    }elseif($_GET['uang'] == 1){
        $jenis = "Uang sebesar : Rp.$besar,-";
    }

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
		<script type="text/javascript">
			function generatePDF() {
			const element = document.getElementById('container_content');
			var opt = {
				  margin:       0.2,
				  filename:     '<?=$nama?>.pdf',
				  image:        { type: 'jpeg', quality: 0.98 },
				  html2canvas:  { scale: 2 },
				  jsPDF:        { unit: 'in', format: 'a5', orientation: 'landscape' }
				};
				// Choose the element that our invoice is rendered in.
				html2pdf().set(opt).from(element).save();

                var foo = document.write('<meta http-equiv="refresh" content="0.8;url=./zakat.php">');
			}
		</script>
		</head>
	<body style="font-family: 'Work Sans', sans-serif;">
    <div class="container_content" id="container_content" >
        <div style="black solid; width: 700px; padding: 10px;">
            <div style="display: flex; padding: 2px; margin: 0 auto; text-align: center;">
                <div style="margin: 0 auto;">
                    <h3 style="font-weight: 700; font-size: 16px;">DKM Masjid Agung XYZ</h3>
                    <p style="font-size: 12px;">Jl.XYZ RT.01 RW.10 Rivet Town</p>
                    <p style="font-size: 12px;">Kec. Belobog Kab. Jarilo-VI</p>
                    <p style="font-size: 12px;">Jawa Barat, 46415</p>
                </div>
            </div>
            <hr style="border-bottom: 1px black solid;">
            <div style="padding: 5px;">
                <h4 style="font-weight: 700; text-align: center;">Tanda Bukti Pembayaran</h4>
                <p>Pengirim : <?=$nama?></p>
                <p><?=$jenis?></p>
                <p>Tujuan : Bayar Zakat Fitrah</p>
                <div style="text-align: right;">
                    <p style="font-size: 12px;"><?=$today?></p>
                    <img src="./img/tandatangan.png" alt="" style="height: 100px; margin-right: 20px; border-bottom: 1px black solid; text-align: center;">
                    <p style="font-size: 12px;">Ketua DKM Masjid Agung XYZ</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        generatePDF();
    </script>
    <!--<script>
        generatePDF();
    </script>
    <meta http-equiv="refresh" content="0.2;url=./zakat.php" />-->
</body>
</html>