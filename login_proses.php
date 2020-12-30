<?php
session_start();

include "koneksi.php";
if(isset($_POST['submit']))
{               
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    
                    
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0)
    {
        $error = "Username or Password is invalid";
    }
    else
    {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['nip_user'] = $row['nip_user'];
        $_SESSION['nama_user'] = $row['nama_user'];
        $_SESSION['jabatan_user'] = $row['jabatan_user'];
        
        if($row['level'] == "1")
        {
            
            header("Location:dashboard/index.php");
        }
        else if($row['level'] == "2")
        {
            
            header("Location:dashboard/index.php");
        }
        else
        {
            header("location:index.php?pesan=belum_login");
            //$error = "Failed Login";
        }
    }
    if (!isset($_SESSION['level']))
    {
        header("location:index.php?pesan=gagal");
        //echo "<script> alert('ANDA BELUM TERDAFTAR !');document.location.href='index.php'</script>";
    }
}           
?>