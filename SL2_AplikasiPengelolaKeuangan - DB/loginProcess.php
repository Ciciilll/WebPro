<?php
    session_start();
    include("config.php");
    
    if(isset($_POST['loginSubmit'])){
        // echo " <script>
        //     alert ('$_POST[username]');
        // </script>";
        $str_query = "SELECT * FROM user WHERE username = '".$_POST['loginusername']."'";
        $query = mysqli_query($connection, $str_query);
        $data = mysqli_fetch_array($query);
        if($data){
            if($data['username'] == $_POST['loginusername']){
                if($data['password'] == $_POST['loginpassword']){
                    $_SESSION['username'] = $data['username'];
                   echo "berhasil login!";
                   header("location:home.php?id='".$data['username']."'");
               } else {
                    echo " <script>
                            alert ('Username atau password salah!');
                            window.location.replace('login.php');
                        </script>";
               }
            }
        }
        //if username not found
        echo " <script>
            alert ('Username belum terdaftar!');
            window.location.replace('login.php');
        </script>";
    }
?>