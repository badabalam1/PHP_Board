<?php
    include './conn.php';

    session_start();
    
    $idx = $_GET['idx'];
    $sql = "SELECT * FROM board WHERE id=$idx";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();

    if(!$_SESSION['id'] && $_SESSION['id'] !== $row['1']) {
        echo "<script>alert('권한이 없습니다.');location.href='./main.php';</script>";
    }
    if($_SESSION['id'])
    if(!($_GET['idx'])) {
        echo "<script>alert('게시물을 선택해주세요.');location.href='./main.php';</script>";
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $name = $_SESSION['id'];
    $time = date("Y/m/d H:i:s");
    $ip =  $_SERVER['SERVER_ADDR'];

    $uploads_dir = "/var/www/";
    $error = $_FILES['img']['error'];
    $file_name = $_FILES['img']['name'];
    $target_file = $uploads_dir . basename($_FILES['img']['name']);

    if( $error != UPLOAD_ERR_OK ) {
        switch( $error) {
            case UPLOAD_ERR_INT_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo '<script>alert("파일이 너무 큽니다.");location.href="./update.php?idx=$idx";</script>';
                break;
            case UPLOAD_ERR_NO_FILE:
                $sql = 'UPDATE board SET title="'.$title.'", content="'.$content.'" WHERE id='.$idx;
                if($mysqli->query($sql)) {
                    echo "<script>alert('수정되었습니다.');location.href='./read.php?idx=$idx';</script>";
                } else {
                    echo "<script>alert('실패했습니다.');location.href='./update.php?idx=$idx';</script>";
                }
                break;
            default:
                echo '<script>alert("파일이 업로드되지 않았습니다.");location.href="./update.php?idx=$idx";</script>';
        }
        exit;
    }

    move_uploaded_file($_FILES['img']['tmp_name'], $file_name);


    mysqli_set_charset($mysqli, "utf8");

    $sql = "UPDATE board set title='$title', content = '$content', file = '$file_name' where id=$idx";
    if($mysqli->query($sql)) {
        echo "<script>alert('수정되었습니다.');location.replace('./read.php?idx=$idx');</script>";
    } else {
        "<script>alert('실패했습니다.');location.replace('./update.php?idx=$idxp');</script>";
    }
?>