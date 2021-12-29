<?php
    require_once("dompdf/autoload.inc.php");
    
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'blog1');
    $id = $_GET['id'];
    $showpost = "SELECT * FROM post2 WHERE id='$id'";
    $result = $con->query($showpost);
    $post = mysqli_fetch_array($result);

    $tittle = $post['judul'];
    $category = $post['kategori'];
    $date = $post['tanggal'];
    $thumbnail = $post['thumbnail'];
    $content = $post['konten'];
    
    $html =
    '<html><body>'.
    '<center><b>'.$tittle.'</b>'.'<br>'.'<br>'.
    '<span>Kategori : <b>'.$category.'</b></span>'.'<br>'.'<br>'.
    '<span>Dipublish Tanggal : <b>'.$date.'</b></span>'.'<br>'.'<br>'.
    '<span>'.$thumbnail.'</span>'.'<br>'.'<br>'.
    '<p>'.$content.'</p>'.
    '</center></body></html>';
    
    use Dompdf\Adapter\CPDF;
    use Dompdf\Dompdf;
    use Dompdf\Exception;
    use Dompdf\Options;

    $options = new Options();
    $options->set('isRemoteEnabled',true);      
    $dompdf = new Dompdf( $options );
    $dompdf->loadHTML($html);
    $dompdf->setPaper('A4');
    $dompdf->render();
    $dompdf->stream("Berita 7", array("Attachment" => 0));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Berita 7 | Berita Terupdate</title>

    <!-- icon tab -->
    <link rel="icon" href="/sign-in-up/images/7.png">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="main-page/style.css">

</head>
<body>
    <?php
        while($post = mysqli_fetch_array($result)):
    ?>
    <div class="heading">
        <h1 style="width: 90%; margin-left:5%;"><?php echo $post['judul'];?></h1><br>
        <span style="color: blue; font-size: 15px;">Kategori : <?php echo $post['kategori'];?></span><span style="color:white;">0000</span><span style="color: blue; font-size: 15px;">Tanggal Publish : <?php echo $post['tanggal'];?>
    </div>
    <section class="about">
        <div class="content">
            <p><?php echo $post['konten'];?></p>
        </div>
    </section>
    <?php
        endwhile;
    ?>
    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>
</html>