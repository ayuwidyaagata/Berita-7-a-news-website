<?php
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'blog1');
    $id = $_GET['id'];
    $showpost = "SELECT * FROM post2 WHERE id='$id'";
    $result = $con->query($showpost);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Artikel Berita</title>

    <!-- icon tab -->
    <link rel="icon" href="dashboard/images/7.png">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="main-page/style.css">

</head>
<body>
  <header class="header">
    <a href="mainpage.php" class="logo">Berita <span>7</span></a>
    <nav class="navbar">
        <a href="home.html">Beranda</a>
        <a href="shop.html">Artikel</a>
        <a href="about.html">Pengguna</a>
        <a href="validation.php">Dasboard</a>
    </nav>
    </header><br><br>
    <!-- article -->
    <?php
      while($post = mysqli_fetch_array($result)):
    ?>
    <div class="heading">
      <h1 style="width: 90%; margin-left:5%;"><?php echo $post['judul'];?></h1><br>
      <span style="color: blue; font-size: 15px;">Kategori : <?php echo $post['kategori'];?></span><span style="color:white;">0000</span><span style="color: blue; font-size: 15px;">Tanggal Publish : <?php echo $post['tanggal'];?><br><br><br>
      <img src="<?php echo $post['thumbnail'];?>" alt="" style="width:25%;"> 
    </div>
    <section class="about">
      <div class="content">
        <p><?php echo $post['konten'];?></p>
        <a href="validation.php" class="btn">Edit</a>
        <a href="validation.php" class="btn" style="background-color: red !important;">Hapus</a>
        <a href="pdf.php?id=<?php echo $post['id'];?>" class="btn" style="background-color: orange !important;">PDF</a>
        <a href="json.php?id=<?php echo $post['id'];?>" class="btn" style="background-color: green !important;">JSON</a>
        </div>
    </section>
    <?php
        endwhile;
    ?>
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
                <a href="#"><i class="fas fa-envelope"></i>berita7@gmail.com</a><br>
                <a href="#"><i class="fas fa-envelope"></i>berita7@gmail.com</a>
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

    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>
</html>