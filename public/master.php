<?php
  session_start();
  ob_start();
  include "koneksi.php";

  $sqlamil = mysqli_query($conn, "SELECT * FROM amil WHERE uname = '$_SESSION[uname]'");
  $amil    =mysqli_fetch_array($sqlamil);
  $master = new sql($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/faf88445ba.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Zakaty</title>
</head>
<body class="font-worksans">
    <div class="flex">
      <?php
      include "header.php";
                $fetch_beras = $master->besarbayar('beras')->fetch_array();
                $fetch_uang = $master->besarbayar('uang')->fetch_array();
                $fetch_dist = $master->bsrdistribusi()->fetch_array();
                $fetch_orang = $master->distribusi()->fetch_array();
                $konversi = $fetch_uang['SUM(besar_bayar)'] / 37500 * 2.5;
                $total = $fetch_beras['SUM(besar_bayar)'] + $konversi;
                $sisa = $total - $fetch_dist['SUM(besar)'];
      ?>
      <div class="text-center mx-auto w-5/6">
        
      
      <footer class="shadow bg-gray-800">
          <div class="w-full mx-auto max-w-screen-xl p-4 md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center"><h1 class="font-bold text-4xl text-center">Dashboard</h1>
          </span>
          <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">

          </ul>
          </div>
      </footer>
      
        <p class="my-10 font-bold text-2xl">Data Saat Ini</p>
        <div class="justify-around">
          <div class="text-center flex mx-auto justify-evenly my-10">
            <div>
              <h1 class="bg-gray-700 font-bold text-white text-lg border border-gray-800 p-3">Muzakki</h1>
              <h2 class="font-bold text-2xl border border-black border-b-transparent p-5"><?=$master->all_muzakki()->num_rows?></h2>
              <p class="bg-gray-700 font-bold text-white border border-gray-800">Orang</p>
            </div>
            <div>
              <h1 class="bg-gray-700 font-bold text-white text-lg border border-gray-800 p-3">Mustahik</h1>
              <h2 class="font-bold text-2xl border border-black border-b-transparent p-5"><?=$master->all_mustahik()->num_rows?></h2>
              <p class="bg-gray-700 font-bold text-white border border-gray-800">Orang</p>
            </div>
            <div>
                <h1 class="bg-gray-700 font-bold text-white text-lg border border-gray-800 p-3">Distribusi</h1>
                <h2 class="font-bold text-2xl border border-black border-b-transparent p-5"><?=$fetch_orang['SUM(jml_tanggungan)']?></h2>
                <p class="bg-gray-700 font-bold text-white border border-gray-800">Orang</p>
            </div>
            <div>
                <h1 class="bg-gray-700 font-bold text-white text-lg border border-gray-800 p-3">Sisa Beras</h1>
                <h2 class="font-bold text-2xl border border-black border-b-transparent p-5"><?=number_format((float)$sisa, 2, '.', '')?></h2>
                 <p class="bg-gray-700 font-bold text-white border border-gray-800">Kg</p>
            </div>
          </div>
          <div class="text-center flex mx-auto justify-evenly my-10">
          </div>
            <div class="">
            <p class="font-bold text-2xl">Terkumpul</p>
              <div class="text-left p-4">
                <div class="text-center flex mx-auto justify-evenly">
                  <div>
                    <h1 class="bg-gray-700 font-bold text-white text-lg border border-gray-800 p-3">Beras</h1>
                    <h2 class="font-bold text-2xl border border-black border-b-transparent p-5"><?=$fetch_beras['SUM(besar_bayar)']?></h2>
                    <p class="bg-gray-700 font-bold text-white border border-gray-800">Kg</p>
                  </div>
                  <div>
                    <h1 class="bg-gray-700 font-bold text-white text-lg border border-gray-800 p-3">Uang</h1>
                    <h2 class="font-bold text-2xl border border-black border-b-transparent p-5"><?=$fetch_uang['SUM(besar_bayar)']?></h2>
                    <p class="bg-gray-700 font-bold text-white border border-gray-800">Rupiah</p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
     </div>
</body>
</html>