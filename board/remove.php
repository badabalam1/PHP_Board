<?php
    include './conn.php';
    session_start();
    
    $idx = $_GET['idx'];
    $sql = "SELECT * FROM board WHERE id=$idx";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();

    if($_SESSION['id'] && $_SESSION['id'] === $row['1']) {
        $sql = "DELETE FROM board where id=$idx";
        if($mysqli->query($sql)) {
            echo "<script>alert('삭제되었습니다.');location.href='./main.php';</script>";
        } else {
            echo "<script>alert('실패했습니다.');location.href='./main.php';</script>";
        }
    } else {
        echo "<script>alert('권한이 없습니다.');location.href='./main.php';</script>";
    }
    if($_SESSION['id'])
    if(!($_GET['idx'])) {
        echo "<script>alert('게시물을 선택해주세요.');location.href='./main.php';</script>";
    }
?>