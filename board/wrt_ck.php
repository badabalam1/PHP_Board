<?php
    include './conn.php';

    if($_SESSION['id']) {
        echo "<script>alert('로그인 후 이용해주세요');location.href='./main.php';</script>";
    }
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();

    $file = "./uploads/";
    
    $error = $_FILES['img']['error'];
    $file_name = $_FILES['img']['name'];    
    $uploadsfile = $file . basename($_FILES['img']['name']);
    

    // if( $error != UPLOAD_ERR_OK ) {
    //     switch( $error) {
    //         case UPLOAD_ERR_INT_SIZE:
    //         case UPLOAD_ERR_FORM_SIZE:
    //             echo '<script>alert("파일이 너무 큽니다.");location.href="./write.php";</script>';
    //             break;
    //         case UPLOAD_ERR_NO_FILE:
    //             echo '<script>alert("파일이 첨부되지 않았습니다.");location.href="./write.php";</script>';
    //             break;
    //         default:
    //             echo '<script>alert("파일이 업로드되지 않았습니다.");location.href="./write.php";</script>';
    //     }
    //     exit;
    // }

    move_uploaded_file($_FILES['img']['tmp_name'], $file_name);

    $title = $_POST['title'];
    $content = $_POST['content'];
    $name = $_SESSION['id'];
    $time = date("Y/m/d H:i:s");
    $ip =  $_SERVER['SERVER_ADDR'];

    mysqli_set_charset($mysqli, "utf8");


    $sql = "INSERT INTO board (`name`, `title`, `content`, `wdate`, `ip`, `file`) VALUES ('$name', '$title', '$content', '$time', '$ip', '$file_name')";

    if($mysqli->query($sql)) {
        echo "<script>alert('글을 작성하셨습니다.');location.replace('./main.php');</script>";
    } else {
        echo "<script>alert('글을 작성에 실패했습니다.');location.replace('./write.php');</script>";
    }
?>