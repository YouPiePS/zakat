<?php
ob_start();
session_start();
include "koneksi.php";

    $username        = mysqli_real_escape_string($conn, $_POST['username']);
    $password        = mysqli_real_escape_string($conn, $_POST['password']);

    if(isset($_POST['login'])){
        $sql = mysqli_query($conn, "SELECT * FROM amil WHERE uname='$username' AND pass='$password'");
        if(mysqli_num_rows($sql)===1){
            while ($row = $sql->fetch_array()) {
                    $_SESSION['uname'] = $row['uname'];
                    echo '<script language="javascript">alert("Login Berhasil.");</script>';
                    header("location:master.php");
            }
        }
        else{
            ?>
            <script language="JavaScript">
                alert('Username dan Password tidak Terdaftar, Silahkan Coba Kembali.');
                document.location='./login.html';
            </script>
            <?php
        }
    }
?>