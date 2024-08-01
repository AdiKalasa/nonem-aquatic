<?php
    session_start();
    $msg;
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        include_once "./config/dbconnect.php";
        $qry=mysqli_query($conn, "SELECT * from tbl_admin WHERE username='$username'");
        $numberOfRow=mysqli_num_rows($qry);
        if ($numberOfRow>0){
            $pass = mysqli_fetch_array($qry)['password'];
            if(md5($password,false)==$pass){
                $_SESSION['isAdmin'] = true;
            }else{
                $msg = "Password salah!";
            }
        }else{
            $msg = "Username atau Password salah!";
        }
    }
    if(isset($_SESSION['isAdmin'])){
?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Admin Dashboard</title>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/CDN/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/CDN/font-awesome.min.css"></link>
        <link rel="stylesheet" href="./assets/css/style.css"></link>
    </head>
    </head>
    <body >
        <div class="pum"></div>
            <?php
                include "./adminHeader.php";
                include "./sidebar.php";
            
                include_once "./config/dbconnect.php";
            ?>
        
        <div id="main-content" class="container allContent-section py-4">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card birukan">
                        <i class="fa fa-users  mb-2 putihkan" style="font-size: 70px;"></i>
                        <h4 style="color:white;">Admin</h4>
                        <h5 style="color:white;">
                        <?php
                            $sql="SELECT * from tbl_admin";
                            $result=$conn-> query($sql);
                            $count=0;
                            if ($result-> num_rows > 0){
                                while ($row=$result-> fetch_assoc()) {
                        
                                    $count=$count+1;
                                }
                            }
                            echo $count;
                        ?></h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card birukan">
                        <i class="fa fa-th-large mb-2 putihkan" style="font-size: 70px;"></i>
                        <h4 style="color:white;">Total Ikan</h4>
                        <h5 style="color:white;">
                        <?php
                        
                        $sql="SELECT * from tbl_katikan";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>
                    </h5>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card birukan">
                        <i class="fa fa-th mb-2 putihkan" style="font-size: 70px;"></i>
                        <h4 style="color:white;">Informasi Perawatan</h4>
                        <h5 style="color:white;">
                        <?php
                        
                        $sql="SELECT * from tbl_perawatan";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                        ?>
                    </h5>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="./assets/js/script.js"></script>
        <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
        <script type="text/javascript" src="./assets/CDN/jquery-3.1.1.min.js"></script>
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script> -->
        <script type="text/javascript" src="./assets/CDN/bootstrap.min.js"></script>
        <script type="text/javascript" src="./assets/CDN/popper.min.js"></script>
    </body>
    </html>     
<?php
    }else{
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Nonem Aquatic</title>
        <style>
            body{
                background-color: hsl(0, 0%, 94%);
                font-family: Arial, Helvetica, sans-serif;
                padding: 3vh 5vw;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
            img{
                width: 50vw;
                margin-left: 20vw;
            }
            .judul{
                font-size: 1.2rem;
            }
            form{
                box-shadow: 0px 2px 10px hsl(0, 0%, 80%);
                border-radius: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                background-color: white;
                padding: 0 0 5vh 0vw;
                width: 417px;
            }
            input[type=text], input[type=password]{
                font-size: 1rem;
                width: 90%;
                padding: 15px 10px;
                border: 1px solid hsl(0, 0%, 85%);
                border-radius: 5px;
            }
            h1{
                color: hsl(214, 89%, 47%);
            }
            .masuk, .baru{
                font-weight: bold;
                background-color: #1977f2;
                color: white;
                border: none;
                font-size: 1.2rem;
                width: 95%;
                padding: 12px 10px;
                border-radius: 5px;
            }
            .masuk:hover,.masuk:active{
                background-color: hsl(214, 89%, 48%);
            }
            .lupa{
                color: #1977f2;
                font-size: 0.9rem;
                text-decoration: none;
            }
            .lupa:hover{
                text-decoration: underline;
            }
            .garis{
                border: 0.1px solid hsl(0, 0%, 80%);
                width: 100%;
            }
            .atau{
                margin: 3vh 0;
                justify-content: center;
                align-items: center;
                flex-direction: row;
                display: flex;
                width: 95%;
                color: grey;
            }
            .atau p{
                font-size: 0.8rem;
                margin: 0 3vw;
            }
            .baru{
                font-size: 1.1rem;
                background-color: #42b72a;
                width: auto;
            }
            .baru:hover, .baru:active{
                background-color: hsl(110, 63%, 40%);
            }
        </style>
    </head>
    <body>
        <h1>NONEM AQUATIC</h1>
        <form action="" method="POST">
            <p class="judul">Login Admin</p>
            <br><input placeholder="Username" type="text" name="username" required>
            <br><input placeholder="Password" type="password" name="password" required>
            <br><input type="submit" class="masuk" name="login">
            <br><a href="https://www.instagram.com/angka1sampe8?igsh=cnI4eWc2cnVxNjFx" target="_blank" class="lupa">Lupa akun?</a>
            <div class="atau">
                <div class="garis"></div>
                <p>atau</p>
                <div class="garis"></div>
            </div>
            <a href="https://www.instagram.com/angka1sampe8?igsh=cnI4eWc2cnVxNjFx" target="_blank">
                <input type="button" value="Buat akun baru" class="baru">
            </a>
        </form>
        <?php
            if(isset($_POST['login'])){
                echo "<p style='color:red;'>".$msg."</p>";
            }
        ?>
    </body>
    </html>
<?php
    }
?>
