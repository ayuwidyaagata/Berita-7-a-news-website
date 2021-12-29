<?php
    $con = mysqli_connect('localhost', 'root');
    mysqli_select_db($con, 'blog1');
    $id = $_GET['id'];
    $showpost = "SELECT * FROM post2 WHERE id='$id'";
    $result = $con->query($showpost);

    $json_array = array();

    while($row = mysqli_fetch_assoc($result)){

        $json_array[] = $row;
    }

    // json format
    // echo json_encode($json_array);
    
    // array format
    echo '<pre>';
    print_r($json_array);
    echo '</pre>';
?>