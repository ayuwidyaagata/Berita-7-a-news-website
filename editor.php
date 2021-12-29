<?php session_start();?>
<?php
    error_reporting(E_ERROR | E_PARSE);

    $link=new mysqli('localhost', 'root', '', 'blog1') or die('error');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $tittle = $_POST['judul'];
        $category = $_POST['kategori'];
        $content = $_POST['konten'];
        $thumbnail = $_POST['gambar'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Berita 7</title>
  <!-- icon tab -->
  <link rel="icon" href="/sign-in-up/images/7.png">

  <!-- style css -->
  <link rel="stylesheet" href="dashboard/editor.css">

  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">Dasboard Berita 7</a><a href="mainpage.php" class="lihat">Lihat Situs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="mx-auto">
                <form class="d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Cari..." aria-label="Search" style="    min-width: 270%; background-color: #efefef;">
                </form>
            </div>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i title="Keluar" class="fal fa-sign-out-alt" id="signout"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="user.php">
                        <img src="dashboard/images/Foto_Ayu Widya Agata-min.jpg" alt="" style="width: 25px;margin-top: 9px;
                        border-radius: 50px;
                        margin-left: 8px;">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    <div class="container jsjhr" id="profile">
        <div class="box2 row skfjh">
            <div class="col-md-6" id="card-container" style="width: 100% !important;">
                <div class="jfheuf">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <textarea name="judul" id="judul" class="form-control" placeholder="Masukkan Judul"><?php if (isset($tittle)) echo $tittle; ?></textarea><br>
                        <textarea name="kategori" id="kategori" class="form-control" placeholder="Masukkan Kategori"><?php if (isset($category)) echo $category; ?></textarea><br>
                        <input name="gambar" type="file"><br><br>
                        <textarea name="konten" id="text_editor" class="form-control"><?php if (isset($content)) echo $content; ?></textarea>
                        <br><button type="submit" name="submit_post" id="posting" style="width: 100% !important;">Posting</button>
                    </form>
                </div>
                <?php
                    if(isset($_POST['submit_post'])){
                        $tittle=$_POST['judul'];
                        $category=$_POST['kategori'];
                        $content=$_POST['konten'];
                        $thumbnail=$_POST['gambar'];

                        if((!empty($tittle)) || (!empty($category)) || (!empty($content)) || (!empty($thumbnail))){

                            $sql = "INSERT INTO post2(judul,kategori,konten,thumbnail) VALUES('$tittle', '$category', '$content','$thumbnail');";
                            $excute = mysqli_query($link, $sql);
                
                            if(!$excute){
                                echo '<script>alert("Gagal Publish!")
                                window.location.href="editor.php";
                                </script>';
                            }else{
                                echo '<script>alert("Sukses Publish!")
                                window.location.href="dashboard.php";
                                </script>';
                            }
                        }else{
                            header('location: editor.php?emptyFields');
                            exit();
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
    <script>
        var editor = CKEDITOR.replace('text_editor');
        CKEDITOR.config.extraPlugins='colorbutton';
        CKFinder.setupCKEditor(editor);
    </script>
</body>
</html>
