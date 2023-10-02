<?php
  session_start();
  ob_start();
  include "koneksi.php";
  $nm_db = 'bayarzakat';
  include "limit.php";
  $master = new sql($connection);

  $bayarzakat = $master->bayar();
  if(isset($_POST['search'])){
    $bayarzakat = search($_POST['keyword']);
}
  
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <title>Zakaty</title>
</head>
<body class="font-worksans">
    <div>
          <button id="defaultModalButton" data-modal-toggle="defaultModal" class="bg-green-700 text-white absolute top-40 right-10 p-2 rounded-lg drop-shadow-lg z-50 duration-300 hover:bg-green-600">Tambah Data</button>
          <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center">
                                Pengumpulan Zakat
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                                X<span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <form action="aksi.php?aksi=tambahzakat" method="post">
                            <div class="gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepala Keluarga Muzakki</label>
                                    <select id="nama" name="nama" class="nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block p-2.5" style="width: 100%;">
                                    <option selected="" value="">-Pilih Nama-</option>
                                    <?php
                                        $sqlmuzakki = $master->all_muzakki();
                                        foreach($sqlmuzakki as $muzakki) :
                                    ?>
                                        <option value="<?=$muzakki['nama']?>"><?=$muzakki['nama']?> (<?=$muzakki['jml_tanggungan']?>)</option>
                                    <?php endforeach;?>
                                    </select>
                                </div>
                                <div>
                                    <label for="besar" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Tanggungan</label>
                                    <input type="number" name="jml_tanggungan" id="jml_tanggungan" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 mb-4">
                                </div>
                                <div>
                                    <div class="flex items-center mb-4">
                                        <input id="uang" type="radio" value="uang" name="jenis" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600">
                                        <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Uang</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input checked id="beras" type="radio" value="beras" name="jenis" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600">
                                        <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Beras</label> 
                                    </div>
                                </div>
                                <div class="mt-4" >
                                    <h4>Total dibayar : <span class="font-bold mt-4" id="calculation"></span></h4>
                                </div>
                            </div>
                            <button type="submit" name="tambah" class="text-white bg-green-700 hover:bg-green-600 text-center border drop-shadow-lg rounded-lg p-2">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <div class="flex">
    <?php
      include "header.php";
      ?>
      <div class="mx-auto w-5/6">

      <footer class="shadow bg-gray-800">
          <div class="w-full mx-auto max-w-screen-xl p-4 md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400"><h1 class="font-bold text-4xl text-center">Pengumpulan Zakat</h1>
          </span>
          <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">

          </ul>
          </div>
      </footer>

      <div class ="p-10">
        <div>
            <form action="" method="post">
                <input type="text" placeholder="Cari..." name="keyword" class="my-5 border border-gray-900 rounded-lg p-2">
                <button type="submit" name="search" class="fa fa-search border border-gray-900 rounded-lg bg-zinc-100 p-3"></button>
            </form>
        </div>
        <?php include "halaman.php";?>
        <div class="mx-auto">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left border border-black">
                    <table class="w-full text-sm text-left border border-black">
                    <thead class="text-xs border border-black">
                        <tr>
                            <th scope="col" class="py-3 text-center">
                                ID Bayar
                            </th>
                            <th scope="col" class="py-3 text-center">
                                Nama Kepala Keluarga
                            </th>
                            <th scope="col" class="py-3 text-center">
                                Tanggungan
                            </th>
                            <th scope="col" class="py-3 text-center">
                                Jenis Bayar
                            </th>
                            <th scope="col" class="py-3 text-center">
                                Besar
                            </th>
                            <th scope="col" class="py-3 text-center">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    ?>
                    <?php foreach($bayarzakat as $zakat) : ?>
                        <tr class="py-4 hover:bg-gray-300">
                            <th scope="row" class="py-4 font-medium text-black text-center">
                                <?=$zakat['id_zakat']?>
                            </th>
                            <td class="py-4 text-center">
                                <?=$zakat['nama_kk']?>
                            </td>
                            <td class="py-4 text-center">
                                <?=$zakat['jml_tanggungan']?>
                            </td>
                            <td class="py-4 text-center">
                                <?php if ($zakat['beras'] == 1){
                                    echo "Beras";
                                }else{
                                    echo "Uang";
                                }
                                ?>
                            </td>
                            <td class="py-4 text-center">
                            
                            <?php
                            if ($zakat['beras'] == 1){
                                echo number_format((float)$zakat['besar_bayar'], 1, '.', '');
                                echo "kg";
                            }else{
                                echo $zakat['besar_bayar'];
                            }
                            ?>
                            </td>
                            <td class="py-4 flex justify-center text-center">
                                <button id="defaultModalButton" data-modal-toggle="edit<?=$i?>" class="bg-green-700 p-2 rounded-lg font-medium drop-shadow-lg z-50 text-white duration-300 hover:bg-green-600 mx-2">Edit</button>
                                    <div id="edit<?=$i?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center">
                                                        Edit Zakat
                                                    </h3>
                                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit<?=$i?>">
                                                        X<span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <form action="aksi.php?aksi=editzakat" method="post">
                                                    <div class="gap-4 mb-4 sm:grid-cols-2">
                                                    <input type="text" name="before" value="<?=$zakat['nama_kk']?>" class="hidden">
                                                    <input type="text" name="id" value="<?=$zakat['id_zakat']?>" class="hidden">
                                                        <div>
                                                            <label for="nama2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kepala Keluarga Muzakki</label>
                                                            <select id="nama2" name="nama2" class="nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block p-2.5 " style="width: 100%;">
                                                                <option selected="<?=$zakat['nama_kk']?>" value="<?=$zakat['nama_kk']?>"><?=$zakat['nama_kk']?></option>
                                                                <?php
                                                                    $sqlmuzakki = $master->all_muzakki();
                                                                    foreach($sqlmuzakki as $muzakki) :
                                                                ?>
                                                                    <option value="<?=$muzakki['nama']?>"><?=$muzakki['nama']?> (<?=$muzakki['jml_tanggungan']?>)</option>
                                                                <?php endforeach;?>
                                                                </select>
                                                        </div>
                                                        <div>
                                                            <label for="besar" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Tanggungan</label>
                                                            <input type="number" name="jml_tanggungan2" value="<?=$zakat['jml_tanggungan'];?>" id="jml_tanggungan2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 mb-4" placeholder="Besar yang dibayar..." required>
                                                        </div>
                                                        <div>
                                                            <div class="flex items-center mb-4">
                                                                <input <?php if($zakat['uang'] == 1){
                                                                    echo "checked";
                                                                }else{
                                                                    echo "";
                                                                }?> id="uang" type="radio" value="uang" name="jenis2" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600">
                                                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Uang</label>
                                                            </div>
                                                            <div class="flex items-center">
                                                                <input <?php if($zakat['beras'] == 1){
                                                                    echo "checked";
                                                                }else{
                                                                    echo "";
                                                                }?> id="beras" type="radio" value="beras" name="jenis2" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600">
                                                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Beras</label> 
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h4>Total dibayar : <span class="font-bold" id="calculation2"></span></h4>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="edit" class="text-black text-center border border-black rounded-lg p-2">Edit</button>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                                <button class="bg-green-700 p-2 rounded-lg font-medium drop-shadow-lg z-50 text-white duration-300 hover:bg-green-600 mx-2"><a href="./cetakzakat.php?nama=<?=$zakat['nama_kk']?>&amp;besar=<?=$zakat['besar_bayar']?>&amp;beras=<?=$zakat['beras']?>&amp;uang=<?=$zakat['uang']?>">Cetak</a></button>
                                <form action="aksi.php?aksi=hapuszakat" method="post">
                                    <input type="text" name="id" value="<?=$zakat['id_zakat']?>" class="hidden">
                                    <button type="submit" name="hapus" class="bg-red-700 p-2 rounded-lg font-medium drop-shadow-lg z-50 text-white duration-300 hover:bg-red-600 mx-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++ ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
      <script type="text/javascript">
        $(document).ready(function() {
            $('#nama').select2();
        });
        
        $(".nama").select2({
        width: 'resolve'
        });

        $(document).ready(function() {
            $('#nama2').select2();
        });
        
        $(".nama2").select2({
        width: 'resolve'
        });

        function calculate_cost() {
        let count = parseInt(document.getElementById('jml_tanggungan').value);
        if (count > 0) {
            let size = 0;
            let cost = 0;
            for (var i = 0 ; i < document.getElementsByName('jenis').length; i++) {
                if (document.getElementsByName('jenis')[i].checked) {
                        size = 37500;
                        cost = count * size;
                        document.getElementById('calculation').innerHTML = 'Rp. '+cost;
                        break;
                }else if(document.getElementsByName('jenis')[i+1].checked){
                    size = 2.5;
                    cost = count * size;
                    document.getElementById('calculation').innerHTML = cost+' Kg';
                    break;
                }
            }
        }
    }

    for (var i = 0 ; i < document.getElementsByName('jenis').length; i++) {
    document.getElementsByName('jenis')[i].onclick = function() { 
        calculate_cost(); 
    }
    }
    document.getElementById('jml_tanggungan2').onchange = function() { 
        calculate_cost(); 
    }

    function calculate_cost2() {
        let count = parseInt(document.getElementById('jml_tanggungan2').value);
        if (count > 0) {
            let size = 0;
            let cost = 0;
            for (var i = 0 ; i < document.getElementsByName('jenis2').length; i++) {
                if (document.getElementsByName('jenis2')[i].checked) {
                        size = 37500;
                        cost = count * size;
                        document.getElementById('calculation2').innerHTML = 'Rp. '+cost;
                        break;
                }else if(document.getElementsByName('jenis2')[i+1].checked){
                    size = 2.5;
                    cost = count * size;
                    document.getElementById('calculation2').innerHTML = cost+' Kg';
                    break;
                }
            }
        }
    }

    for (var i = 0 ; i < document.getElementsByName('jenis2').length; i++) {
    document.getElementsByName('jenis2')[i].onclick = function() { 
        calculate_cost2(); 
    }
    }
    document.getElementById('jml_tanggungan2').onchange = function() { 
        calculate_cost2(); 
    }
        </script>
</body>
</html>

<?php 
    function search($keyword){
        global $conn;

        $query = "SELECT * FROM bayarzakat WHERE nama_kk LIKE '%$keyword%'";
        return mysqli_query($conn, $query);
    }
?>