<?php
    $nama ='ryo';
    $nim = md5('211011400877');

    session_start();

    $namamahasiswa = $_POST['nama'];
    $nomer = $_POST['nim'];

    if($namamahasiswa==$nama&&MD5($nomer)==$nim){
        $_SESSION['login']=TRUE;
        if(isset($_POST['remember'])){
            $time = time();
            setcookie('login', $nama, $time+3600);
        }
        header('location:./Pert-16_Latihan-3_home.php');
        exit();
    }else{
        header('location:./Pert-16_Latihan-3.php');
    }
?>