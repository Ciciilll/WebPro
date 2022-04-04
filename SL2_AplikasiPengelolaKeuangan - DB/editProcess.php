<?php   
    include("config.php");

    if(isset($_POST['submitEdit'])){
        if($_FILES['new-profile']['tmp_name']){
            if(is_uploaded_file($_FILES['new-profile']['tmp_name'])){
                $profileData = addslashes(file_get_contents($_FILES['new-profile']['tmp_name']));
                $profileType = getimagesize($_FILES['new-profile']['tmp_name']);

                $str_query1 = "update user set namadepan='".$_POST['namadepan']."', 
                            namatengah='".$_POST['namatengah']."', 
                            namabelakang='".$_POST['namabelakang']."', 
                            tempatlahir='".$_POST['tempatlahir']."', 
                            tanggallahir='".$_POST['tanggallahir']."', 
                            nik='".$_POST['nik']."',
                            warganegara='".$_POST['warganegara']."',
                            email='".$_POST['email']."',
                            nohp='".$_POST['nohp']."', 
                            alamat='".$_POST['alamat']."', 
                            kodepos='".$_POST['kodepos']."', 
                            password='".$_POST['password1']."', 
                            profileType='".$profileType['mime']."',
                            profileData='".$profileData."'
                            WHERE username='".$_POST['username']."'";
                $query = mysqli_query($connection, $str_query1);
            }
        } else{
            $str_query = "update user set namadepan='".$_POST['namadepan']."', 
                        namatengah='".$_POST['namatengah']."', 
                        namabelakang='".$_POST['namabelakang']."', 
                        tempatlahir='".$_POST['tempatlahir']."', 
                        tanggallahir='".$_POST['tanggallahir']."', 
                        nik='".$_POST['nik']."',
                        warganegara='".$_POST['warganegara']."',
                        email='".$_POST['email']."',
                        nohp='".$_POST['nohp']."', 
                        alamat='".$_POST['alamat']."', 
                        kodepos='".$_POST['kodepos']."', 
                        password='".$_POST['password1']."'
                        WHERE username='".$_POST['username']."'";
            $query = mysqli_query($connection, $str_query);
        }
    }

    if($query){
        echo "<script>";
        echo "alert('data berhasil diupdate')";
        echo "</script>";

        echo "<script>";
        echo "window.location = 'profile.php'";
        echo "</script>";

    } else{
        echo "<script>";
        echo "alert('data gagal diupdate')";
        echo "</script>";

        echo "<script>";
        echo "window.location='index.php'";
        echo "</script>";
    }

?>