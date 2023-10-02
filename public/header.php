<?php
    $fetch_amil = $master->amil()->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sidebar</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<div class="w-1/6 bg-gray-900 h-screen">
        <div class="fixed w-1/6 bg-gray-900 h-screen">
        <div>
          <img src="./img/<?=$fetch_amil['img']?>" alt="" class="w-24 rounded-full my-6 bg-blue-900 mx-auto">
          <p class="text-center text-white mt-3 font-bold"><?=$fetch_amil['uname']?></p>
        </div>
        <div class="text-white p-7">
          <a href="master.php" class="p-1 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-800">Dashboard</a>
          <a href="muzakki.php" class="p-1 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-800">Data Muzakki</a>
          <a href="mustahik.php" class="p-1 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-800">Data Mustahik</a>
          <a href="zakat.php" class="p-1 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-800">Pengumpulan Zakat</a>
          <a href="distribusi.php" class="p-1 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-800">Distribusi Zakat</a>

          <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer  hover:bg-blue-800">
          <i class="fa-solid fa-print"></i>
           <div class="flex justify-between w-full items-center" onclick="dropDown()">
             <span class="text-[15px] ml-4 text-gray-200">Laporan Zakat</span>
             <span class="text-sm rotate-180" id="arrow">
               <i class="bi bi-chevron-down"></i>
             </span>
           </div>
         </div>
        <div class=" leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="submenu">
          <a href="lappengumpulan.php" class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-blue-600 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200">Pengumpulan</a>
          <a href="lapdistribusi.php" class="block w-full whitespace-nowrap bg-transparent px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-blue-600 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200">Distribusi</a>
        </div>
        </div>
 
        <div class="text-white w-1/2 mx-14 fixed bottom-0 m-5">
          <button class="border border-red-800 bg-red-700 rounded-lg p-2 duration-300 hover:bg-red-600"><a href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a></button>
        </div>
      </div>
      </div>
      
      <script>
        function dropDown() {
          document.querySelector('#submenu').classList.toggle('hidden')
          document.querySelector('#arrow').classList.toggle('rotate-180')
        }
        dropDown()
      
        function Openbar() {
          document.querySelector('.sidebar').classList.toggle('left-[-300px]')
        }
      </script>
</body>

</html>