<?php
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'blog1');
    $category = $_GET['kategori'];
    $showpost = "SELECT * FROM post2 WHERE kategori='$category'";
    $result = $con->query($showpost);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Berita 7 | Website Berita Indonesia</title>

    <!-- icon tab -->
    <link rel="icon" href="dashboard/images/7.png">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- style css  -->
    <link rel="stylesheet" href="main-page/style.css">

</head>
<body>
    <header class="header">
        <a href="mainpage.php" class="logo">Berita <span>7</span></a>
        <nav class="navbar">
            <a href="mainpage.php">Beranda</a>
            <a href="#about">Artikel</a>
            <a href="#pengguna">Penulis</a>
            <button class="login" style="width: 15rem !important;"><a href="validation.php">Dashboard</a></button>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </header>
    <section class="home">
        <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
        <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>
    </section>
    <!-- search bar -->
    <div class="search-container">
        <form action="/action_page.php">
          <input type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <section class="category">
        <h1 class="title">Kategori</h1>
        <p>Berbagai kategori berita yang ada</p>
        <div class="box-container">
            <a href="#" class="box">
                <img src="main-page/images/olahraga.png" alt="">
                <h3>Olahraga</h3>
            </a>
            <a href="#" class="box">
                <img src="main-page/images/makanan.png" alt="">
                <h3>Makanan</h3>
            </a>
            <a href="#" class="box">
                <img src="main-page/images/travelling.png" alt="">
                <h3>Travelling</h3>
            </a>
            <a href="#" class="box">
                <img src="main-page/images/teknologi.png" alt="">
                <h3>Teknologi</h3>
            </a>
            <a href="#" class="box">
                <img src="main-page/images/pendidikan.png" alt="">
                <h3>Pendidikan</h3>
            </a>
        </div>
    </section>
    <!-- article -->
    <div class="heading" id="about">
        <h1>Artikel</h1>
        <p>Kumpulan artikel Berita 7</p>
    </div>
    <?php
        while($post = mysqli_fetch_array($result)):
    ?>
    <section class="about">
        <div class="image">
            <img src="<?php echo $post['thumbnail'];?>" alt="">
        </div>
        <div class="content">
            <h3><?php echo $post['judul'];?></h3><br>
            <span>Kategori : <?php echo $post['kategori'];?></span><span style="color:white;">000</span><span>Dipublish Tanggal : <?php echo $post['tanggal'];?></span>
            <p><?php echo $post['konten'];?></p>
            <a href="article.php?id=<?php echo $post['id'];?>" class="btn">Telusuri</a>
        </div>
    </section>
    <?php
        endwhile;
    ?>
    <!-- user -->
    <div class="heading" id="pengguna">
        <h1>Penulis</h1>
        <p>Seseorang di balik Web Berita 7</p>
    </div>
    <section class="review">
        <div class="box">
            <div class="user">
                <img src="images/Foto_Ayu Widya Agata-min.jpg" alt="">
                <div class="info">
                    <h3>Ayu Widya Agata</h3>
                    <span>Mahasiswa Informatika</span>
                </div>
            </div>
            <p><i class="fas fa-user"></i>    19081010005</p>
        </div>
        <div class="box">
            <div class="user">
                <img src="images/foto farra.jpeg" alt="">
                <div class="info">
                    <h3>Farra Wardah G</h3>
                    <span>Mahasiswa Informatika</span>
                </div>
            </div>
            <p><i class="fas fa-user"></i>    19081010171</p>
        </div>
        <div class="box">
            <div class="user">
                <img src="images/foto agung.png" alt="">
                <div class="info">
                    <h3>Agung Rahmawan G</h3>
                    <span>Mahasiswa Informatika</span>
                </div>
            </div>
            <p><i class="fas fa-user"></i>    19081010161</p>
        </div>
    </section>
    <!-- footer -->
    <footer>
        <div class="content">
          <div class="left box">
            <div class="upper">
              <div class="topic">Tentang Kami</div>
              <p>Berita 7 adalah website yang menampilkan berita,<br>
                  terupdate dan juga terpecaya</p>
            </div>
            <div class="lower">
              <div class="topic">Hubungi Kami</div>
              <div class="email">
                <a href="mailto:ayuwagata@gmail.com"><i class="fas fa-envelope"></i>ayuwagata@gmail.com</a><br>
                <a href="mailto:farrawardahgracillaria17@gmail.com"><i class="fas fa-envelope"></i>farrawardahgracillaria17@gmail.com</a><br>
                <a href="mailto:ergeagung120501@gmail.com"><i class="fas fa-envelope"></i>ergeagung120501@gmail.com</a><br>
              </div>
            </div>
          </div>
          <div class="middle box">
            <div class="topic">Berita 7</div>
            <div><a href="#">Beranda</a></div>
            <div><a href="#">Artikel</a></div>
            <div><a href="#">Pengguna</a></div>
          </div>
          <div class="right box">
            <div class="topic">Berlangganan</div>
            <form action="#">
              <input type="text" placeholder="Masukkan email">
              <input type="submit" name="" value="Kirim">
            </form>
          </div>
        </div>
        <div class="bottom">
          <p>Copyright © 2021 <a href="#">Berita 7</a> All rights reserved</p>
        </div>
    </footer>

    <!-- javaSript  -->
    <script src="main-page/main.js"></script>
    <script src="main-page/database.js" type="module"></script>
</body>
</html>