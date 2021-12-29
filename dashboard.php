<?php
    error_reporting(E_ERROR | E_PARSE);
    session_start();

    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'blog1');

    $username = $_GET['name'];
    $pass = $_GET['password'];
    $tittle = $_GET['judul'];
    $content = $_GET['konten'];
    
    $id = $_GET['id'];
    $category = $_GET['kategori'];

    $getdata = "SELECT * FROM user WHERE username = '$username' && password = '$pass'";
    $getpost = "SELECT * FROM post2";
    
    $result = mysqli_query($con, $getdata);
    $num = mysqli_num_rows($result);

    // post
    $showpost = $con->query($getpost);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Berita 7</title>
  <!-- icon tab -->
  <link rel="icon" href="dashboard/images/7.png">

  <!-- style css -->
  <link rel="stylesheet" href="dashboard/dashboard.css">

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
        <a class="navbar-brand" href="#">Dasboard Berita 7</a><a href="mainpage.php" class="lihat">Lihat Situs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="mx-auto">
                <form class="d-flex">
                    <input class="form-control mr-2" id="search" type="search" placeholder="Cari..." aria-label="Search" style="    min-width: 270%; background-color: #efefef;">
                </form>
            </div>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i title="Keluar" class="fal fa-sign-out-alt" id="signout"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="">
                        <img src="dashboard/images/Foto_Ayu Widya Agata-min.jpg" alt="" style="width: 25px;margin-top: 9px;
                        border-radius: 50px;
                        margin-left: 8px;">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    <!--  -->
    <div class="container jsjhr" id="profile">
        <div class="box2 row skfjh">
            <div class="col-md-2 sfjhe">
                <div class=" sjfsj">
                    <img src="" alt="" id="profile-post-pic">
                    <h5 class="text-center pt-3" id="author">
                        Selamat Datang!
                        <?php echo $_SESSION['username'];?>
                    </h5>
                    <hr>
                    <div class="d-flex">
                        <div>
                            <p>
                                <i class="fal fa-map-marker-alt"></i>   Surabaya, Indonesia
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <a href="editor.php" class="font-weight-bold text-decoration-none text-center">
                            <i class="fas fa-pen-alt"></i>    
                            Tulis Artikel
                        </a>
                    </div>
                </div>
            </div> 

            <div class="col-md-6" id="card">
                <?php
                    while($post = mysqli_fetch_array($showpost)):
                ?>
                <div class="jfheuf">
                    <form action="">
                        <p>Kategori : <b><?php echo $post['kategori'];?></b></p>
                        <p>Dipublish Tanggal : <b><?php echo $post['tanggal'];?></b></p>
                        <p>Judul : <b><?php echo $post['judul'];?></b></p>
                        <textarea name="" id="" cols="3" rows="3" class="form-control" placeholder="<?php echo $post['konten'];?>"></textarea><br>
                    </form>
                    <div class="d-flex justify-content-around">
                        <div class="option">
                            <a href="article.php?id=<?php echo $post['id'];?>">
                                <i class="fas fa-eye"></i>
                                Lihat
                            </a>
                        </div>
                        <div class="option">
                            <a href="update.php?id=<?php echo $post['id'];?>">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                        </div>
                        <div class="option">
                            <a href="delete.php?id=<?php echo $post['id'];?>">
                                <i class="fas fa-eraser"></i>
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                ?>
            </div>
                    
            <br>
            <div class="col-md-4">
                <div class="left_box">
                    <span>
                        <i class="fal fa-users"></i>    Pengguna
                    </span>
                    <hr>
                    <div class="d-flex dfkj">
                        <div class="lkt40">
                            <img src="dashboard/images/Foto_Ayu Widya Agata-min.jpg" alt="">
                        </div>
                        <div>
                            Ayu Widya Agata
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex dfkj">
                        <div class="lkt40">
                            <img src="dashboard/images/foto agung.png" alt="">
                        </div>
                    <div>
                        Agung Rahmawan Gading
                    </div>
                </div>
                <hr>
                <div class="d-flex dfkj">
                    <div class="lkt40">
                        <img src="dashboard/images/foto farra.jpeg" alt="">
                    </div>
                    <div>
                        Farra Wardah G
                    </div>
                </div>
                <hr>
            </div>
            <div class="left_box mt-3">
                <span>
                    <i class="far fa-tags"></i> Kategori
                </span>
                <div class="kategori">
                    <br>
                    <button><a href="kategori.php?kategori=olahraga" style="text-decoration: none; color: black;">Olahraga</a></button>
                    <button><a href="kategori.php?kategori=budaya" style="text-decoration: none; color: black;">Budaya</a></button>
                    <button><a href="kategori.php?kategori=pendidikan" style="text-decoration: none; color: black;">Pendidikan</a></button>
                    <button><a href="kategori.php?kategori=makanan" style="text-decoration: none; color: black;">Makanan</a></button>
                    <button><a href="kategori.php?kategori=trabel" style="text-decoration: none; color: black;">Travel</a></button>
                    <button><a href="kategori.php?kategori=politik" style="text-decoration: none; color: black;">Politik</a></button>
                    <button><a href="kategori.php?kategori=teknologi" style="text-decoration: none; color: black;">Teknologi</a></button>
                    <button><a href="kategori.php?kategori=kesehatan" style="text-decoration: none; color: black;">Kesehatan</a></button>
                </div>
                <hr>
            </div>
            <div class="left_box mt-3">
                <span class="font-weight-medium">
                    Statistik Blog
                </span>
                <br><br>
                <img src="images/stas.jpg" alt="" style="width: 90%;">
                <br><br><br>
                <p>Jumlah Artikel = <b>3</b></p>
                <p>Jumlah Pengunjung = <b>25</b></p>
                <hr>
                <p>
                </p>
            </div> 
        </div>
    </div>

    <!-- jquery ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="search.js"></script>
</body>
</html>
